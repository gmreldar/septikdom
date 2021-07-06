<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('phone')->nullable();
            $table->string('in')->nullable();
            $table->string('fb')->nullable();
            $table->string('vk')->nullable();
            $table->string('email')->nullable();
            $table->string('schedule')->nullable();
            $table->string('address')->nullable();
            $table->string('map')->nullable();
            $table->string('image')->nullable();
            $table->string('emails')->nullable();
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
        Schema::drop('contacts');
    }
}
