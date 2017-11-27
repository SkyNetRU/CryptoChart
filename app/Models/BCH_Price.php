<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class BCH_Price extends Model
{
    use \jdavidbakr\ReplaceableModel\ReplaceableModel;
    protected $table = 'bch_prices';
    protected $fillable = ['price, fiat', 'time'];
}
