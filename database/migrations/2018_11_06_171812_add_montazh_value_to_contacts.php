<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMontazhValueToContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function(Blueprint $table){
            $table->integer('well_150')->nullable()->default(0)->after('emails');
            $table->integer('well_200')->nullable()->default(0)->after('well_150');
            $table->integer('formwork')->nullable()->default(0)->after('well_200');
            $table->integer('cable')->nullable()->default(0)->after('formwork');
            $table->integer('hot_cable')->nullable()->default(0)->after('cable');
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
            $table->dropColumn("hot_cable");
            $table->dropColumn("cable");
            $table->dropColumn("formwork");
            $table->dropColumn("well_200");
            $table->dropColumn("well_150");
        });
    }
}
