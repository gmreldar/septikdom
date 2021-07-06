<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddIsActiveToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function(Blueprint $table){
            $table->boolean('is_active')->nullable()->default(1)->after('chel');
        });
        Schema::table('product_categories', function(Blueprint $table){
            $table->boolean('is_active')->nullable()->default(1)->after('views');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropColumn("is_active");
        });
        Schema::table('product_categories', function (Blueprint $table) {
            $table->dropColumn("is_active");
        });
    }
}
