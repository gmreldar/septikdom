<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddReferences extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('modifications', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('product_category_id')->references('id')->on('product_categories')->onDelete('set null');
        });
        Schema::table('articles', function (Blueprint $table) {
            $table->foreign('article_category_id')->references('id')->on('article_categories')->onDelete('set null');
        });
        Schema::table('comments', function (Blueprint $table) {
            $table->foreign('product_id')->references('id')->on('products')->onDelete('set null');
        });
        Schema::table('texts', function (Blueprint $table) {
            $table->foreign('page_id')->references('id')->on('pages')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
