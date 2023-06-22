<?php

namespace App\Admin\Controllers;

use App\Models\Breakfast;
use App\Models\Day;
use App\Models\Dinner;
use App\Models\Food;
use App\Models\Lunch;
use App\Models\Pack;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class DayController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Day';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Day());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('Pack.title', __('Pack id'));
        $grid->column('breakfast_id', __('Breakfast'))->display(function ($breakfast_id) {
            $breakfast = Breakfast::find($breakfast_id);
            $breakfastFood = $breakfast->food;
            return "<span>$breakfastFood->title</span>";
        });
        $grid->column('Lunch.id', __('Lunch'))->display(function ($lunch_id) {
            $lunch = Lunch::find($lunch_id);
            $lunchFood = $lunch->food;
            return "<span>$lunchFood->title</span>";
        });
        $grid->column('dinner_id', __('Dinner'))->display(function ($dinner_id) {
            $dinner = Dinner::find($dinner_id);
            $dinnerFood = $dinner->food;
            return "<span>$dinnerFood->title</span>";
        });
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
        $show = new Show(Day::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('pack_id', __('Pack id'));
        $show->field('breakfast_id', __('Breakfast id'));
        $show->field('lunch_id', __('Lunch id'));
        $show->field('dinner_id', __('Dinner id'));
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
        $form = new Form(new Day());

        $form->text('title', __('Title'));
        $form->select('pack_id', __('Pack id'))->options(Pack::all()->pluck('title','id'));
        $form->select('breakfast_id', __('Breakfast id'))->options(Breakfast::all()->pluck('Food.title','id'));
        $form->select('lunch_id', __('Lunch id'))->options(Lunch::all()->pluck('Food.title','id'));
        $form->select('dinner_id', __('Dinner id'))->options(Dinner::all()->pluck('Food.title','id'));

        return $form;
    }
}
