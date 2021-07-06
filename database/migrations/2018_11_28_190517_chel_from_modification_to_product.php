<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChelFromModificationToProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $products = \App\Models\Product::all();
        foreach($products as $product) {
            $mod = \App\Models\Modification::where('product_id', $product->id)->select('chel')->first();
            if ($mod) {
                $product->chel = $mod->chel;
                $product->save();
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

    }
}
