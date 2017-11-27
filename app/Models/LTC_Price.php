<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LTC_Price extends Model
{
    use \jdavidbakr\ReplaceableModel\ReplaceableModel;
    protected $table = 'ltc_prices';
    protected $fillable = ['price, fiat'];
}
