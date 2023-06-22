<?php

namespace App\Admin\Controllers;

use App\Models\Cart;
use App\Models\Client;
use App\Models\Food;
use App\Models\Order;
use App\Models\OrdersCart;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class OrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Meals Order';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Order());

        $grid->column('id', __('Id'));
        $grid->column('total_price', __('Total price'));
        $grid->column('payed', __('Payed'))->display(function ($payed) {
            if($payed == 'N'){
                return "<span>No</span>";
            }else{
                return "<span>Yes</span>";
            }
            
        });
        $grid->column('payment_type', __('Payment type'))->display(function ($payment_type) {
            if($payment_type == '1'){
                return "<span>Online</span>";
            }else{
                return "<span>Delivery</span>";
            }
            
        });
        $grid->column('Client.email', __('Client email'));
        $grid->column('Client.phone', __('Client phone'));
        $grid->column('Client.address', __('Client Address'));
        $grid->column('created_at', 'Created at')->display(function ($active_time) {
            return Carbon::parse($active_time)->format('Y-m-d');
        });
        $grid->column('updated_at', 'Updated at')->display(function ($active_time) {
            return Carbon::parse($active_time)->format('Y-m-d');
        });

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Order::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('total_price', __('Total price'));
        $show->field('payed', __('Payed'));
        $show->field('payment_type', __('Payment type'));
        $show->field('client_id', __('Client id'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Order());

        $form->decimal('total_price', __('Total price'));
        $form->select('payed', __('Payed'))->options(['N' => 'No', 'Y' => 'Yes']);
        $form->select('payment_type', __('Payment type'))->options(['1' => 'Online', '2' => 'Delivery']);
        $form->select('client_id', __('Client name'))->options(Client::all()->pluck('last_name','id'));

        $form->saved(function (Form $form) {
            //get booking id
            $order_id = $form->model()->id;
            $order = Order::where('id',$order_id)->first();

            if(($form->payed == "Y")){
                $order->payed = 'Y';
                $order->save();
                $listCarts = OrdersCart::where('order_id',$order_id)->get();
                foreach($listCarts as $listCart){
                    $cart = Cart::where('id',$listCart->id)->first();
                    $cart->payed = 'Y';
                    $cart->save();
                }
                
                $client = Client::where('id',$cart->client_id)->first();

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.deliveryOrderPaymentAdmin', [
                              'client' => $client,
                              'order_id' => $order_id,
            ], function($message) use ($client) {
                $message->from($client->email,$client->last_name)
                        ->to('genifresh.morocco@gmail.com','GeniFresh')
                        ->subject('Payment at Delivery Done');
                });
            }
            //return to the booking list
            return redirect('/admin/orders');
        });
        return $form;
    }

    public function edit($id, Content $content)
    {
        return $content
            ->title('Meal Order')
            ->description('description')
            ->row($this->form()->edit($id))
            //the hiker table
            //booking extras table
            ->row(Admin::grid(OrdersCart::class, function (Grid $grid) use ($id) {
                $grid->setName('Cart')
                    ->setTitle('Cart')
                    ->setRelation(Order::find($id)->OrdersCart())
                    ->resource('/admin/orders-carts');
                $grid->id('Id');
                $grid->column('Cart.food_id', __('Meal'))->display(function ($food_id) {
                    $food = Food::find($food_id);
                    return "<span>$food->title</span>";
                });
                $grid->column('Cart.prod_qty', __('Quantity Ordered'));
                $grid->column('created_at', 'Created at')->display(function ($active_time) {
                    return Carbon::parse($active_time)->format('Y-m-d');
                });
                $grid->column('updated_at', 'Updated at')->display(function ($active_time) {
                    return Carbon::parse($active_time)->format('Y-m-d');
                });
                $grid->disableCreateButton();
                    $grid->tools(function ($tools) use ($id) {
                        $tools->append("<a href='/admin/clients/create?id=$id' class='btn btn-success'>Create</a>");
                    });

                //if agent
            }));
    }
}
