<?php

namespace App\Admin\Controllers;

use App\Models\Client;
use App\Models\Customize;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CustomizeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Customize';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Customize());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('email_sent', __('Email sent'))->bool();
        $grid->column('validation_finale', __('Validation finale'))->bool();
        $grid->column('message', __('Message'));
        $grid->column('hash', __('Hash'));
        $grid->column('price', __('Price'));
        $grid->column('statut_payment', __('Statut payment'))->bool();
        $grid->column('Client.email', __('Client email'));
        $grid->column('Client.phone', __('Client phone'));
        $grid->column('Client.address', __('Client address'));
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
        $show = new Show(Customize::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('email_sent', __('Email sent'));
        $show->field('validation_finale', __('Validation finale'));
        $show->field('message', __('Message'));
        $show->field('hash', __('Hash'));
        $show->field('price', __('Price'));
        $show->field('statut_payment', __('Statut payment'));
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
        $form = new Form(new Customize());

        $form->text('title', __('Title'));
        $form->switch('email_sent', __('Email sent'));
        $form->switch('validation_finale', __('Validation finale'));
        $form->textarea('message', __('Message'));
        $form->decimal('price', __('Price'));
        $form->switch('statut_payment', __('Statut payment'));
        $form->select('client_id', __('Client id'))->options(Client::all()->pluck('last_name','id'));;

        $form->saved(function (Form $form) {
            $customize_id = $form->model()->id;
            $customize = Customize::where('id',$customize_id)->first();

            if(($form->email_sent == "on") AND ($form->validation_finale == "off") AND ($form->price != null)){
                $client = Client::where('id',$customize->client_id)->first();
                $generated = md5(uniqid(rand(), true));
                $customize->hash=$generated;
                $customize->email_sent = 1;
                $customize->save();

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.acceptationRequest', [
                              'client' => $client,
                              'customize' => $customize,
            ], function($message) use ($client) {
                $message->from('genifresh.morocco@gmail.com','GeniFresh')
                        ->to($client->email,$client->first_name)
                        ->subject('Acceptation of your request');
                });
            }
            if(($form->email_sent == "off") AND ($form->validation_finale == "off") AND ($form->price == null)){
                $client = Client::where('id',$customize->client_id)->first();

            $beautymail = app()->make(\Snowfire\Beautymail\Beautymail::class);
            $beautymail->send('email.refusionRequest', [
                              'client' => $client,
                              'customize' => $customize,
            ], function($message) use ($client) {
                $message->from('genifresh.morocco@gmail.com','GeniFresh')
                        ->to($client->email,$client->first_name)
                        ->subject('Refusion of your request');
                });
            }
            //return to the booking list
            return redirect('/admin/customizes');
        });


        return $form;
    }
}
