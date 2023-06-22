<?php

namespace App\Admin\Controllers;

use App\Models\Cart;
use App\Models\Client;
use App\Models\Food;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CartController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Cart';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Cart());

        $grid->column('id', __('Id'));
        $grid->column('prod_qty', __('Prod qty'));
        $grid->column('payed', __('Payed'))->display(function ($payed) {
            if($payed == 'N'){
                return "<span>No</span>";
            }else if($payed == 'Y'){
                return "<span>Yes</span>";
            }else{
                return "<span>Delivery</span>";
            }
            
        });
        $grid->column('Food.title', __('Food id'));
        $grid->column('Client.email', __('Client email'));
        $grid->column('Client.phone', __('Client phone'));
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
        $show = new Show(Cart::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('prod_qty', __('Prod qty'));
        $show->field('payed', __('Payed'));
        $show->field('food_id', __('Food id'));
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
        $form = new Form(new Cart());

        $form->number('prod_qty', __('Prod qty'));
        $form->select('payed', __('Payed'))->options(['N' => 'No', 'Y' => 'Yes']);
        $form->select('food_id', __('Food Name'))->options(Food::all()->pluck('title','id'));
        $form->select('client_id', __('Client Name'))->options(Client::all()->pluck('last_name','id'));

        return $form;
    }
}
