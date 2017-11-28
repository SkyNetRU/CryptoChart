<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateXRPPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('xrp_prices', function (Blueprint $table) {
            $table->float('price', 8, 4);
            $table->char('fiat', 3);
            $table->integer('time');
            $table->unique('time');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('xrp_prices', function (Blueprint $table) {
            $table->dropColumn(['price', 'fiat', 'time']);
        });
    }
}
