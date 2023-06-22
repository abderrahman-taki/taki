<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Client;
use App\Models\Customize;
use App\Models\Food;
use App\Models\FoodIngredient;
use App\Models\Ingredient;
use App\Models\Order;
use App\Models\OrdersCart;
use App\Models\PackOrder;
use App\Models\TypeSortie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FoodController extends Controller
{
    public function MealPage($lang,$slug)
    {
        app()->setLocale($lang);

        $food = Food::where('slug',$slug)->first();

        $tops = Food::limit(3)->get();

        $category = Category::where('id',$food->category_id)->first();

        $ingredients = Ingredient::all();

        $food_ingredients = FoodIngredient::all();

        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }
        
        
        return view('food.food')->with('food',$food)
                                ->with('category',$category)
                                ->with('ingredients',$ingredients)
                                ->with('food_ingredients',$food_ingredients)
                                ->with('category',$category)
                                ->with('tops',$tops)
                                ->with('countCart',$countCart);
    }

    public function addToCartMeal(Request $request,$lang)
    {
        app()->setLocale($lang);
       
        if(!Session::has('client_id')){
            $client = new Client();
            $client->ip = $request->ip();
            $client->save();
            $client_id=$client->id;
        }else{
            $client_id=Session::get('client_id');
        }
       
       
       
       $cart = new Cart();
       $cart->food_id = $request->input('id');
       $cart->client_id = $client_id;
       $cart->prod_qty = $request->input('quantity');
       $cart->payed = "N";
       $cart->save();


       session(['client_id' => $client_id]);
       $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();

       return back()->with('success', 'Meal added to cart successfully')->with('countCart',$countCart);
    }

    public function CustomizePage($lang){
        app()->setLocale($lang);

        $tops = Food::limit(3)->get();

        $ingredients = Ingredient::all();

        $food_ingredients = FoodIngredient::all();

        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }
        
        
        return view('food.cutomize')->with('ingredients',$ingredients)
                                    ->with('food_ingredients',$food_ingredients)
                                    ->with('tops',$tops)
                                    ->with('countCart',$countCart);
    }

    public function CustomSTORE(Request $request,$lang)
    {
        app()->setLocale($lang);
        $this->validate($request,[
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'EMAIL'=>'required|email',
            'phone'=>'required|max:20',
            'title'=>'required',
            'Message'=>'required',
       ]);
       $client_exist = Client::where('ip', $request->ip())->first();
       if($client_exist == null){
            $client = new Client();
            $client->ip = $request->ip();
            $client->last_name = $request->input('last_name');
            $client->first_name = $request->input('first_name');
            $client->phone = $request->input('phone');
            $client->email = $request->input('EMAIL');
            $client->save();
            $client_id=$client->id;
       }else {
            $client_exist_email = Client::where('ip', $request->ip())->where('email',$request->input('EMAIL'))->first();
            if($client_exist_email == null){
                $client = new Client();
                $client->ip = $request->ip();
                $client->last_name = $request->input('last_name');
                $client->first_name = $request->input('first_name');
                $client->phone = $request->input('phone');
                $client->email = $request->input('EMAIL');
                $client->save();
                $client_id=$client->id;
            }else{
                $client_id = $client_exist_email->id;
            }
            
            
       }

       $customize =new Customize();
       $customize->message = $request->input('Message');
       $customize->client_id = $client_id;
       $customize->title = $request->input('title');
       $customize->save();


       $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
       $beautymail->send('email.customize_request',
                                            [   'first_name' => $request->input('first_name'),
                                                'last_name' => $request->input('last_name'),
                                                'phone' => $request->input('phone'),
                                                'title' => $request->input('title'),
                                                'Message' => $request->input('Message'),
                                                'id'=>$customize->id,
                                             ], function($message) use ($client_id,$lang) {
            app()->setlocale($lang);
           $client = Client::where('id',$client_id)->first();
           $message->from($client->email, $client->prenom)
                   ->to('genifresh.morocco@gmail.com','GeniFresh')
                   ->subject('Customize meal request');
       });

       $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
       $beautymail->send('email.customize_request_client',
                                            [   'first_name' => $request->input('first_name'),
                                                'last_name' => $request->input('last_name'),
                                                'phone' => $request->input('phone'),
                                                'title' => $request->input('title'),
                                                'Message' => $request->input('Message'),
                                                'id'=>$customize->id,
                                             ], function($message) use ($client_id,$lang) {
            app()->setlocale($lang);
           $client = Client::where('id',$client_id)->first();
           $message->from('genifresh.morocco@gmail.com','GeniFresh')
                   ->to($client->email, $client->prenom)
                   ->subject('Customize meal request');
       });

       if(Session::has('client_id')){
        $client_id = Session::get('client_id');
        $countCart = Cart::where('client_id',$client_id)
                        ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }

       return redirect(route('home',app()->getlocale()))->with('error',__('success'))->with('countCart',$countCart);
    }

    public function myListCart(Request $request,$lang){
        app()->setLocale($lang);
        $total_price = 0;
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
            $listCarts = Cart::where('client_id',$client_id)
            ->where('payed','N')->get();
            
            foreach($listCarts as $listCart){
                $total_price = $total_price + ($listCart->food->price * $listCart->prod_qty);
            }
        }
        else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                                ->where('payed','N')->count();
                $listCarts = Cart::where('client_id',$client_exist->id)
                ->where('payed','N')->get();
                foreach($listCarts as $listCart){
                    $total_price = $total_price + ($listCart->food->price * $listCart->prod_qty);
                }
                $countCart = Cart::where('client_id',$client_exist->id)
                            ->where('payed','N')->count();
            }else{
                $countCart = 0;
                $listCarts = [];
            }
            
        }

        return view('cart.cart')->with('listCarts',$listCarts)
                                    ->with('countCart',$countCart)
                                    ->with('total_price',$total_price);
    }

    public function myListCartStore(Request $request, $lang){
        app()->setLocale($lang);
        $this->validate($request,[
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'EMAIL'=>'required|email',
            'phone'=>'required|max:20',
            'payment'=>'required',
            'Adress'=>'required',
       ]);

       if($request->input('payment') == 0){
            $total_price = 0;
            if(Session::has('client_id')){
                $client_id = Session::get('client_id');
                $countCart = Cart::where('client_id',$client_id)
                                ->where('payed','N')->count();
                $listCarts = Cart::join('food','carts.food_id', '=', 'food.id')
                ->select('carts.*','food.*')
                ->where('carts.client_id',$client_id)
                ->where('carts.payed','N')->get();
                foreach($listCarts as $listCart){
                    $total_price = $total_price + ($listCart->price * $listCart->prod_qty);
                }
            }
            else{
                $client_exist = Client::where('ip', $request->ip())->first();
                if($client_exist != null){
                    $countCart = Cart::where('client_id',$client_exist->id)
                                    ->where('payed','N')->count();
                    $listCarts = Cart::join('food','carts.food_id', '=', 'food.id')
                    ->select('carts.*','food.*')
                    ->where('carts.client_id',$client_exist->id)
                    ->where('carts.payed','N')->get();
                    foreach($listCarts as $listCart){
                        $total_price = $total_price + ($listCart->price * $listCart->prod_qty);
                    }
                    $countCart = Cart::where('client_id',$client_exist->id)
                                ->where('payed','N')->count();
                }else{
                    $countCart = 0;
                    $listCarts = null;
                }
            }
            return redirect()->back()->with('error','Select an option')->with('listCarts',$listCarts)
                                        ->with('countCart',$countCart)
                                        ->with('total_price',$total_price);
        
       }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist == null){
                $client = new Client();
                $client->ip = $request->ip();
                $client->last_name = $request->input('last_name');
                $client->first_name = $request->input('first_name');
                $client->phone = $request->input('phone');
                $client->email = $request->input('EMAIL');
                $client->address = $request->input('Adress');
                $client->save();
                $client_id=$client->id;
           }else {
                $client_exist_email = Client::where('ip', $request->ip())->where('email',$request->input('EMAIL'))->first();
                if($client_exist_email == null){
                    $client = new Client();
                    $client->ip = $request->ip();
                    $client->last_name = $request->input('last_name');
                    $client->first_name = $request->input('first_name');
                    $client->phone = $request->input('phone');
                    $client->email = $request->input('EMAIL');
                    $client->address = $request->input('Adress');
                    $client->save();
                    $client_id=$client->id;
                }else{
                    $client_id = $client_exist_email->id;
                } 
            }

            session(['client_id' => $client_id]);
            $order = new Order();
            $order->total_price = $request->input('total_price');
            $order->payed = 'N';
            $order->payment_type = $request->input('payment');
            $order->client_id = $client_id;
            $order->save();
            $listCarts = Cart::where('client_id',$client_id)
                ->where('payed','N')->get();
            foreach($listCarts as $listCart){
                $orderCart = new OrdersCart();
                $orderCart->cart_id = $listCart->id;
                $orderCart->order_id = $order->id;
                $orderCart->save();
            }
            if($request->input('payment') == 1){
                if(Session::has('client_id')){
                    $client_id = Session::get('client_id');
                    $countCart = Cart::where('client_id',$client_id)
                                    ->where('payed','N')->count();
                }else{
                    $countCart = 0;
                }
                return redirect()->route('onlinePayment',[app()->getlocale(),'orderId'=>$order->id]);
            }
            else if($request->input('payment') == 2){
                $listCarts = Cart::where('client_id',$client_id)
                                    ->where('payed','N')->get();
                foreach($listCarts as $listCart){
                    $listCart->payed = 'D';
                    $listCart->save();
                }
                if(Session::has('client_id')){
                    $client_id = Session::get('client_id');
                    $countCart = Cart::where('client_id',$client_id)
                                    ->where('payed','N')->count();
                }else{
                    $countCart = 0;
                }

                $order_lists = OrdersCart::where('order_id',$order->id)->get();

                $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
                $beautymail->send('email.deliveryOrderAdmin',
                                            [   'first_name' => $request->input('first_name'),
                                                'last_name' => $request->input('last_name'),
                                                'phone' => $request->input('phone'),
                                                'Message' => $request->input('Adress'),
                                                'listCarts'=>$listCarts,
                                                'order'=>$order,
                                             ], function($message) use ($client_id,$lang) {
                                                    app()->setlocale($lang);
                                                    $client = Client::where('id',$client_id)->first();
                                                    $message->from($client->email, $client->firstname)
                                                            ->to('genifresh.morocco@gmail.com','GeniFresh')
                                                            ->subject('Order / Delivery payment');
                });

                $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
                $beautymail->send('email.deliveryOrderClient',
                                            [   'first_name' => $request->input('first_name'),
                                                'last_name' => $request->input('last_name'),
                                                'phone' => $request->input('phone'),
                                                'Message' => $request->input('Adress'),
                                                'listCarts'=>$listCarts,
                                                'order'=>$order,
                                                'order_lists'=>$order_lists,
                                             ], function($message) use ($client_id,$lang) {
                                                    app()->setlocale($lang);
                                                    $client = Client::where('id',$client_id)->first();
                                                    $message->from('genifresh.morocco@gmail.com','GeniFresh')
                                                            ->to($client->email, $client->firstname)
                                                            ->subject('Payment at Delivery Notice');
                });
                return redirect(route('home',app()->getlocale()))->with('error',__('success'))->with('countCart',$countCart);
            }
       }
    }

    public function onlinePaymentPage($lang,$orderId){
        app()->setLocale($lang);
        $order = Order::where('id',$orderId)->first();
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }
        
        return view('cart.onlinePayment')->with('countCart',$countCart)
                                        ->with('order',$order);
    }

    public function paymentSuccessCustom($lang,$id){
        app()->setLocale($lang);

        $customize = Customize::where('id',$id)->first();
        $customize->statut_payment = true;
        $customize->validation_finale = true;
        $customize->save();
        
        $client = Client::where('id',$customize->client_id)->first();

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.payment_success_custom_admin', ['customize' => $customize,'client'=> $client], function($message)  use ($client,$lang){
            app()->setlocale($lang);
            $message->from($client->email,$client->first_name)
                    ->to('genifresh.morocco@gmail.com', 'GeniFresh')
                    ->subject('Payment with success Customize');
        });

        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }

        return redirect(route('home',app()->getlocale()))->with('error',__('success'))->with('countCart',$countCart);
    }

    public function PaiementSuccess($lang,$orderId){
        app()->setLocale($lang);

        $orderCarts = OrdersCart::where('order_id',$orderId)->get();
        foreach($orderCarts as $orderCart){
            $cart = Cart::where('id',$orderCart->cart_id)->first();
            $cart->payed = 'Y';
            $cart->save();
        }

        $payed_order = Order::where('id',$orderId)->first();
        $payed_order->payed = 'Y';
        $payed_order->save();

        $orders = OrdersCart::where('order_id',$orderId)->get();
        
        $client = Order::where('id',$orderId)->first();

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.payment_success_admin', ['orders' => $orders,'client'=> $client], function($message)  use ($client,$lang){
            app()->setlocale($lang);
            $message->from($client->client->email,$client->client->first_name)
                    ->to('genifresh.morocco@gmail.com', 'GeniFresh')
                    ->subject('Payment with success');
        });

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.payment_success_client', ['orders' => $orders,'client'=> $client], function($message)  use ($client,$lang){
            app()->setlocale($lang);
            $message->from('genifresh.morocco@gmail.com', 'GeniFresh')
                    ->to($client->client->email,$client->client->first_name)
                    ->subject('Order Details');
        });

        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }

        return redirect(route('home',app()->getlocale()))->with('error',__('success'))->with('countCart',$countCart);
    }

    public function storePack(Request $request,$lang){
        app()->setLocale($lang);
        $this->validate($request,[
            'first_name'=>'required|min:3',
            'last_name'=>'required|min:3',
            'EMAIL'=>'required|email',
            'phone'=>'required|max:20',
            'Address'=>'required',
        ]);
        $client_exist = Client::where('ip', $request->ip())->first();
        if($client_exist == null){
            $client = new Client();
            $client->ip = $request->ip();
            $client->last_name = $request->input('last_name');
            $client->first_name = $request->input('first_name');
            $client->phone = $request->input('phone');
            $client->email = $request->input('EMAIL');
            $client->address = $request->input('Adress');
            $client->save();
            $client_id=$client->id;
        }else {
            $client_exist_email = Client::where('ip', $request->ip())->where('email',$request->input('EMAIL'))->first();
            if($client_exist_email == null){
                $client = new Client();
                $client->ip = $request->ip();
                $client->last_name = $request->input('last_name');
                $client->first_name = $request->input('first_name');
                $client->phone = $request->input('phone');
                $client->email = $request->input('EMAIL');
                $client->address = $request->input('Adress');
                $client->save();
                $client_id=$client->id;
            }else{
                $client_id = $client_exist_email->id;
            } 
        }
      

       $order_pack =new PackOrder();
       $order_pack->payed = 'N';
       $order_pack->pack_id = $request->input('id');
       $order_pack->client_id = $client_id;
       $order_pack->save();

       return redirect()->route('onlinePaymentPack',[app()->getlocale(),'orderPackId'=>$order_pack->id]);
    }

    public function onlinePaymentPackPage($lang,$orderPackId){
        app()->setLocale($lang);
        $order = PackOrder::where('id',$orderPackId)->first();
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }
        
        return view('cart.onlinePaymentPack')->with('countCart',$countCart)
                                            ->with('order',$order);
    }

    public function PaymentSuccessPack($lang,$orderId){
        app()->setLocale($lang);

        $order = PackOrder::where('id',$orderId)->first();
        $order->payed = 'Y';
        $order->save();

        $client = Client::where('id',$order->client_id)->first();
        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.payment_success_admin_pack', ['order' => $order,'client'=> $client], function($message)  use ($client,$lang){
            app()->setlocale($lang);
            $message->from($client->email,$client->first_name)
                    ->to('genifresh.morocco@gmail.com','GeniFresh')
                    ->subject('Payment of Pack with success');
        });

        $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
        $beautymail->send('email.payment_success_client_pack', ['order' => $order,'client'=> $client], function($message)  use ($client,$lang){
            app()->setlocale($lang);
            $message->from('genifresh.morocco@gmail.com','GeniFresh')
                    ->to($client->email,$client->first_name)
                    ->subject('Pack Details');
        });

        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }

        return redirect(route('home',app()->getlocale()))->with('error',__('success'))->with('countCart',$countCart);
    }

    public function RemoveItem($lang,$id){
        app()->setLocale($lang);
        Cart::destroy($id);
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }

        return back()->with('success', 'Meal removed from cart successfully')->with('countCart',$countCart);
    }

    public function CustomizePayment($lang,$hash){
        app()->setLocale($lang);
        $customize = Customize::where('hash',$hash)->first();
        $client = Client::where('id',$customize->client_id)->first();
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }
        return view('food.payment_customize')->with('countCart',$countCart)
                                    ->with('client',$client)
                                    ->with('customize',$customize);
    }
}
