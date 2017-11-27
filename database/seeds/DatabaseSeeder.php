<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(BTC_pricesSeeder::class);
        $this->call(BCH_pricesSeeder::class);
        $this->call(ETH_pricesSeeder::class);
        $this->call(LTC_pricesSeeder::class);
        $this->call(XRP_pricesSeeder::class);
    }
}
