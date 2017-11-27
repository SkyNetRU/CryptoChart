<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ETH_Price extends Model
{
    use \jdavidbakr\ReplaceableModel\ReplaceableModel;
    protected $table = 'eth_prices';
    protected $fillable = ['price, fiat'];
}
