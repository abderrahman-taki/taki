<?php

namespace App\Admin\Controllers;

use App\Models\Breakfast;
use App\Models\Day;
use App\Models\Dinner;
use App\Models\Lunch;
use App\Models\Pack;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Str;

class PackController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Pack';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Pack());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        $grid->column('price', __('Price'));
        $grid->column('image', __('Image'))->image();
        $grid->column('description', __('Description'));
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
        $show = new Show(Pack::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('price', __('Price'));
        $show->field('image', __('Image'));
        $show->field('description', __('Description'));
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
        $form = new Form(new Pack());

        $form->text('title', __('Title'));
        
        $form->saved(function ($form) {

            $slug = Str::slug($form->model()->title);
            $id = $form->model()->id;

            $allSlugs = Pack::select('slug')->where('slug', $slug)
                ->where('id', '<>', $form->model()->id)
                ->get();

            if (! $allSlugs->contains('slug', $slug)) $form->model()->slug = Str::slug($form->title);
            else $form->model()->slug = Str::slug($form->title).'-'.$id;

            $form->model()->save();
        });

        $form->decimal('price', __('Price'));
        $form->image('image', __('Image'));
        $form->textarea('description', __('Description'));

        return $form;
    }

    public function edit($id, Content $content)
    {
        return $content
            ->title('Pack')
            ->description('description')
            ->row($this->form()->edit($id))
            //the hiker table
            //booking extras table
            ->row(Admin::grid(Day::class, function (Grid $grid) use ($id) {
                $grid->setName('Day')
                    ->setTitle('Day')
                    ->setRelation(Pack::find($id)->Day())
                    ->resource('/admin/days');
                $grid->id('Id');
                $grid->column('title',__('Day'));
                $grid->column('breakfast_id', __('Breakfast'))->display(function ($breakfast_id) {
                    $breakfast = Breakfast::find($breakfast_id);
                    $breakfastFood = $breakfast->food;
                    return "<span>$breakfastFood->title</span>";
                });
                $grid->column('lunch_id', __('Lunch'))->display(function ($lunch_id) {
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
                $grid->disableCreateButton();
                    $grid->tools(function ($tools) use ($id) {
                        $tools->append("<a href='/admin/days/create?id=$id' class='btn btn-success'>Create</a>");
                    });
            }));
    }
}
