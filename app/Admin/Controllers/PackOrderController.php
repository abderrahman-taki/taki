<?php

namespace App\Admin\Controllers;

use App\Models\Client;
use App\Models\Pack;
use App\Models\PackOrder;
use Carbon\Carbon;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PackOrderController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'PackOrder';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PackOrder());

        $grid->column('id', __('Id'));
        $grid->column('payed', __('Payed'))->display(function ($payed) {
            if($payed == 'N'){
                return "<span>No</span>";
            }else{
                return "<span>Yes</span>";
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
        $show = new Show(PackOrder::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('payed', __('Payed'));
        $show->field('pack_id', __('Pack id'));
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
        $form = new Form(new PackOrder());

        $form->select('payed', __('Payed'))->options(['N' => 'No', 'Y' => 'Yes']);
        $form->select('pack_id', __('Pack'))->options(Pack::all()->pluck('title','id'));;
        $form->select('client_id', __('Client'))->options(Client::all()->pluck('last_name','id'));;

        return $form;
    }
}
