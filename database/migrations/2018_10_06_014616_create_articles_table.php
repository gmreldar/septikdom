<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateArticlesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('link')->nullable();
            $table->integer('article_category_id')->nullable()->unsigned();
            $table->integer('ord')->nullable();
            $table->string('image')->nullable();
            $table->string('alt')->nullable();
            $table->text('annotation')->nullable();
            $table->text('text')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->text('keywords')->nullable();
            $table->text('seo_image')->nullable();
            $table->boolean('is_active')->nullable()->default(1);
            $table->integer('likes')->nullable()->default(0);
            $table->integer('views')->nullable()->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('articles');
    }
}
