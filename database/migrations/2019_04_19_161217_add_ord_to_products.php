<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddOrdToProducts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->integer('ord')->nullable()->after('id');
        });

        $categories = \App\Models\ProductCategory::get();

        foreach ($categories as $category) {
            $i = 1;
            $products = $category->adminProducts;
            foreach ($products as $product) {
                $product->update(['ord' => $i++]);
            }
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn("ord");
        });
    }
}
