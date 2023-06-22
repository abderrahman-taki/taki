<?php

namespace App\Admin\Controllers;

use App\Models\Food;
use App\Models\FoodIngredient;
use App\Models\Ingredient;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class FoodIngredientController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'FoodIngredient';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new FoodIngredient());

        $grid->column('id', __('Id'));
        $grid->column('Food.title', __('Food'));
        $grid->column('Ingredient.title', __('Ingredient'));
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
        $show = new Show(FoodIngredient::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('food_id', __('Food'));
        $show->field('ingredient_id', __('Ingredient'));
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
        $form = new Form(new FoodIngredient());

        $form->select('food_id', __('Food'))->options(Food::all()->pluck('title','id'));
        $form->select('ingredient_id', __('Ingredient'))->options(Ingredient::all()->pluck('title','id'));

        return $form;
    }
}
