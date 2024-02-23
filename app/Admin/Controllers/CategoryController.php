<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Category;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Layout\Content;
use Dcat\Admin\Show;

class CategoryController extends AdminController
{
    public function index(Content $content)
    {
        return $content
            ->header('分類創建')
            ->description('清單')
            ->body($this->grid($this));
    }
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Category(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('cate_title', '分類名稱');
            $grid->column('status', '開啟狀態');
            $grid->column('type', '分類類型');
            $grid->column('sort', '排序');
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
        return Show::make($id, new Category(), function (Show $show) {
            $show->field('id');
            $show->field('cate_title');
            $show->field('status');
            $show->field('type');
            $show->field('sort');
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
        return Form::make(new Category(), function (Form $form) {
            $form->display('id');
            $form->text('cate_title')->required();
            $form->number('sort')->default(0)->required();
            $form->select('status')->options(['n' => '關閉', 'y' => '開啟'])->default('n')->required();
            $form->select('type')->options(['announcement' => '公告', 'wiki' => '百科'])->required();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
