<?php

namespace App\Admin\Controllers;

use App\Models\Dinner;
use App\Models\Food;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DinnerController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Dinner';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Dinner());

        $grid->column('id', __('Id'));
        $grid->column('Food.title', __('Food'));
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
        $show = new Show(Dinner::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('Food.title', __('Food id'));
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
        $form = new Form(new Dinner());

        $form->select('food_id', __('Food'))->options(Food::all()->where('type','P')->pluck('title','id'));

        return $form;
    }
}
