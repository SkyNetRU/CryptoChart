<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BTC_Price extends Model
{
    use \jdavidbakr\ReplaceableModel\ReplaceableModel;
    protected $table = 'btc_prices';
    protected $fillable = ['price, fiat'];

}
