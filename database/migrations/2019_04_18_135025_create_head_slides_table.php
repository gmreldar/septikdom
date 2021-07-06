<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateHeadSlidesTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('head_slides', function (Blueprint $table) {
            $table->increments('id');
            $table->string('text1')->nullable();
            $table->string('text2')->nullable();
            $table->string('image')->nullable();
            $table->integer('ord')->nullable();
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
        Schema::drop('head_slides');
    }
}
