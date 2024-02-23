<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Page;
use App\Models\Category;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Http\Controllers\AdminController;
use Dcat\Admin\Show;

class PageController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Page(), function (Grid $grid) {
            // $grid->column('id')->sortable();
            $grid->column('title', '標題');
            $grid->column('cate_id', '分類');
            $grid->column('open', '開啟狀態');
            $grid->column('top', 'Top標籤');
            $grid->column('new', 'NEW標籤');
            $grid->column('sort', '排序')->sortable();
            // $grid->column('content', '內容');
            // $grid->column('type', '標題');
            // $grid->column('overall_sort','標題');

            // $grid->column('created_at','標題');
            // $grid->column('updated_at')->sortable();

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
        return Show::make($id, new Page(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('cate_id');
            $show->field('content');
            $show->field('open');
            $show->field('type');
            $show->field('sort');
            $show->field('overall_sort');
            $show->field('top');
            $show->field('new');
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

        return Form::make(new Page(), function (Form $form) {
            $cate = Category::select('id', 'cate_title')->orderBy('status', 'desc')->orderBy('sort', 'desc')->pluck('cate_title', 'id');
            $form->display('id');
            $form->text('title', '標題')->required();
            $form->select('cate_id', '分類')->options($cate)->required();
            $form->ckeditor('content')->required();
            $form->select('open', '狀態')->options(['N' => '關閉', 'Y' => '開啟'])->default('N');
            $form->number('sort', '排序')->default(0);
            $form->radio('top', 'Top標籤')->options(['y' => '是', 'n' => '否'])->default('n')->help("點選'是',並儲存,會將先前的TOP文章取消TOP,並將TOP設定為目前的文章喔!");
            $form->radio('new', 'New標籤')->options(['y' => '是', 'n' => '否'])->default('n');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
