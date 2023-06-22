<?php

namespace App\Admin\Controllers;

use App\Models\Category;
use App\Models\Food;
use App\Models\FoodIngredient;
use App\Models\Ingredient;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Facades\Admin;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Layout\Content;
use Encore\Admin\Show;
use Str;

class FoodController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Food';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Food());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('slug', __('Slug'));
        $grid->column('description', __('Description'));
        $grid->column('price', __('Price'));
        $grid->column('calories', __('Calories'));
        $grid->column('proteins', __('Proteins'));
        $grid->column('fats', __('Fats'));
        $grid->column('carbohydrates', __('Carbohydrates'));
        $grid->column('image', __('Image'))->image();
        $grid->column('type', __('Type'));
        $grid->column('Category.title', __('Category'));
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
        $show = new Show(Food::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('slug', __('Slug'));
        $show->field('description', __('Description'));
        $show->field('price', __('Price'));
        $show->field('nbrOrder', __('NbrOrder'));
        $show->field('calories', __('Calories'));
        $show->field('proteins', __('Proteins'));
        $show->field('fats', __('Fats'));
        $show->field('carbohydrates', __('Carbohydrates'));
        $show->field('image_name', __('Image name'));
        $show->field('image', __('Image'));
        $show->field('type', __('Type'));
        $show->field('category_id', __('Category id'));
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
        $form = new Form(new Food());

        $form->text('title', __('Title'));
        $form->saved(function ($form) {

            $slug = Str::slug($form->model()->title);
            $id = $form->model()->id;

            $allSlugs = Food::select('slug')->where('slug', $slug)
                ->where('id', '<>', $form->model()->id)
                ->get();

            if (! $allSlugs->contains('slug', $slug)) $form->model()->slug = Str::slug($form->title);
            else $form->model()->slug = Str::slug($form->title).'-'.$id;

            $form->model()->save();
        });
        $form->textarea('description', __('Description'));
        $form->decimal('price', __('Price'));
        $form->text('calories', __('Calories'));
        $form->text('proteins', __('Proteins'));
        $form->text('fats', __('Fats'));
        $form->text('carbohydrates', __('Carbohydrates'));
        $form->text('image_name', __('Image name'));
        $form->image('image', __('Image'));
        $form->select('type', __('Type'))->options(['F' => 'Food', 'P' => 'Pack']);;
        $form->select('category_id', __('Category id'))->options(Category::all()->pluck('title','id'));

        return $form;
    }

    public function edit($id, Content $content)
    {
        return $content
            ->title('Meal')
            ->description('description')
            ->row($this->form()->edit($id))
            //the hiker table
            //booking extras table
            ->row(Admin::grid(FoodIngredient::class, function (Grid $grid) use ($id) {
                $grid->setName('Ingredient')
                    ->setTitle('Ingredient')
                    ->setRelation(Food::find($id)->FoodIngredient())
                    ->resource('/admin/food-ingredients');
                $grid->id('Id');
                $grid->column('Ingredient.title', __('Ingredient'));
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
            }));
    }
}
