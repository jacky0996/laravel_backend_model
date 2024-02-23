<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePageTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title')->default('')->comment('文章標題');
            $table->integer('cate_id')->default('0')->comment('分類id');
            $table->text('content')->comment('內容');
            $table->string('open')->default('')->comment('是否開啟');
            $table->string('type')->default('')->comment('文章類型');
            $table->integer('sort')->comment('排序');
            $table->string('overall_sort')->default('0')->comment('首頁整體排序');
            $table->string('top')->nullable()->comment('top標籤');
            $table->string('new')->nullable()->comment('new標籤');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('page');
    }
}
