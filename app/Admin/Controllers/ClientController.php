<?php

namespace App\Admin\Controllers;

use App\Models\Client;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ClientController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Client';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Client());

        $grid->column('id', __('Id'));
        $grid->column('last_name', __('Last name'));
        $grid->column('first_name', __('First name'));
        $grid->column('ip', __('Ip'));
        $grid->column('address', __('Address'));
        $grid->column('phone', __('Phone'));
        $grid->column('email', __('Email'));
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
        $show = new Show(Client::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('last_name', __('Last name'));
        $show->field('first_name', __('First name'));
        $show->field('ip', __('Ip'));
        $show->field('address', __('Address'));
        $show->field('phone', __('Phone'));
        $show->field('email', __('Email'));
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
        $form = new Form(new Client());

        $form->text('last_name', __('Last name'));
        $form->text('first_name', __('First name'));
        $form->ip('ip', __('Ip'));
        $form->text('address', __('Address'));
        $form->mobile('phone', __('Phone'));
        $form->email('email', __('Email'));

        return $form;
    }
}
