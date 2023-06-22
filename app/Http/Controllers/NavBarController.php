<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Client;
use App\Models\Day;
use App\Models\Food;
use App\Models\FoodIngredient;
use App\Models\Ingredient;
use App\Models\Pack;
use App\Models\Post;
use App\Models\SubsEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class NavBarController extends Controller
{
    public function Home(Request $request, $lang)
    {
        app()->setLocale($lang);
        $foods = Food::where('type','F')->limit(4)->get();
        $ingredients = Ingredient::all();
        $foodIngredients = FoodIngredient::all();
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                            ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }
        return view('NavBar.welcome')->with('foods',$foods)
                                    ->with('ingredients',$ingredients)
                                    ->with('foodIngredients',$foodIngredients)
                                    ->with('countCart',$countCart);
    }

    public function About(Request $request,$lang)
    {
        app()->setLocale($lang);
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                            ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }
        return view('NavBar.about')->with('countCart',$countCart);
    }


    public function Blog(Request $request,$lang)
    {
        $language = app()->setLocale($lang);
        $posts = Post::all();
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                                ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }
        return view('NavBar.blog')->with('posts',$posts)
                                ->with('countCart',$countCart);
    }

    public function Contact(Request $request,$lang)
    {
        app()->setLocale($lang);
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                                ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }
        return view('NavBar.contact')->with('countCart',$countCart);
    }


    public function NewsletterSTORE(Request $request,$lang)
    {
        app()->setLocale($lang);
        $this->validate($request,[
            'email'=>'required|email',
       ]);

        $newsletter = new SubsEmail();
        $newsletter->email = $request->input('email');
        $newsletter->save();
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                                ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }
        return redirect()->back()->with('countCart',$countCart);
    }


    public function searchIngredient(Request $request,$lang)
    {
        app()->setlocale($lang);

        $search=$request->get('ingredient');
        $ingredients = Ingredient::all();
        $foodIngredients = FoodIngredient::all();
        $ingredientFood= Ingredient::where('title',$search)->first();
        if($ingredientFood == null){
            $foods = [];
        }else{
            $foods = Food::join('food_ingredients','food.id', '=', 'food_ingredients.food_id')
                    ->select('food.*','food_ingredients.*')
                    ->where('food.type','F')
                    ->where('food_ingredients.ingredient_id',$ingredientFood->id)->paginate(5);
        }
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $countCart = 0;
        }
        
        return view('search',['search' => $search],['foods'=>$foods])->with('ingredients',$ingredients)
                                        ->with('countCart',$countCart);
    }

    public function moreFood(Request $request,$lang)
    {
        app()->setLocale($lang);

        $foods = Food::where('type','F')->get();
        $ingredients = Ingredient::all();
        $foodIngredients = FoodIngredient::all();
        $categories = Category::all();
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                                ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }

        return view("food.allFood")->with('foods',$foods)
                                    ->with('ingredients',$ingredients)
                                    ->with('foodIngredients',$foodIngredients)
                                    ->with('categories',$categories)
                                    ->with('countCart',$countCart);
    }

    public function moreFoodCategory(Request $request,$lang,$id)
    {
        app()->setLocale($lang);

        $foods = Food::where('type','F')->where('category_id',$id)->get();
        $ingredients = Ingredient::all();
        $foodIngredients = FoodIngredient::all();
        $categories = Category::all();
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                                ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }

        return view("food.allFood")->with('foods',$foods)
                                    ->with('ingredients',$ingredients)
                                    ->with('foodIngredients',$foodIngredients)
                                    ->with('categories',$categories)
                                    ->with('countCart',$countCart);
    }

    public function PacksPage(Request $request,$lang,$slug){
        app()->setLocale($lang);
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                            ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }

        $pack = Pack::where('slug',$slug)->first();
        $days = Day::where('pack_id',$pack->id)->orderBy("title", "asc")->get();

        return view('food.pack')->with('pack',$pack)
                                ->with('days',$days)
                                    ->with('countCart',$countCart);
    }

    public function AllPacksPage(Request $request,$lang){
        app()->setLocale($lang);
        if(Session::has('client_id')){
            $client_id = Session::get('client_id');
            $countCart = Cart::where('client_id',$client_id)
                            ->where('payed','N')->count();
        }else{
            $client_exist = Client::where('ip', $request->ip())->first();
            if($client_exist != null){
                $countCart = Cart::where('client_id',$client_exist->id)
                            ->where('payed','N')->count();
            }else{
                $countCart = 0;
            }
        }

        $packs = Pack::all();

        return view('food.allPacks')->with('packs',$packs)
                                    ->with('countCart',$countCart);
    }

}
