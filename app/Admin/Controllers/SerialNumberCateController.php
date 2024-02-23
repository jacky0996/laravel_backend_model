<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\SerialNumberCate;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SerialNumberCateController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new SerialNumberCate(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('type');
            $grid->column('count');
            $grid->column('remainder');
            $grid->column('all_for_one');
            $grid->column('start_date');
            $grid->column('end_date');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
        
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
        
            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, new SerialNumberCate(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('type');
            $show->field('count');
            $show->field('remainder');
            $show->field('all_for_one');
            $show->field('start_date');
            $show->field('end_date');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new SerialNumberCate(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('type');
            $form->text('count');
            $form->text('remainder');
            $form->text('all_for_one');
            $form->text('start_date');
            $form->text('end_date');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
