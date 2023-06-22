<?php

namespace App\Admin\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrdersCart;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;

class OrdersCartController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'OrdersCart';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new OrdersCart());

        $grid->column('id', __('Id'));
        $grid->column('cart_id', __('Cart id'));
        $grid->column('order_id', __('Order id'));
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
        $show = new Show(OrdersCart::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('cart_id', __('Cart id'));
        $show->field('order_id', __('Order id'));
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
        $form = new Form(new OrdersCart());

        $form->select('cart_id', __('Cart id'))->options(Cart::all()->pluck('id','id'));;
        $form->select('order_id', __('Order id'))->options(Order::all()->pluck('id','id'));;

        return $form;
    }

    public function edit($id, Content $content)
    {
        return $content
            ->title('Cart Order')
            ->description('description')
            ->row($this->form()->edit($id))
            //the hiker table
            //booking extras table
            ->row(Admin::grid(Cart::class, function (Grid $grid) use ($id) {
                $grid->setName('Cart')
                    ->setTitle('Cart')
                    ->setRelation(OrdersCart::find($id)->Cart())
                    ->resource('/admin/carts');
                $grid->id('Id');
                $grid->column('food_id', __('Meal'));
                $grid->column('prod_qty', __('Quantity Ordered'));
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
