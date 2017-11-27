<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateETHPricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('eth_prices', function (Blueprint $table) {
            $table->float('price', 8, 2);
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
        Schema::table('eth_prices', function (Blueprint $table) {
            $table->dropColumn(['price', 'fiat', 'time']);
        });
    }
}
