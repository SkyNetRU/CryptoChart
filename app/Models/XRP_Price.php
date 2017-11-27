<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class XRP_Price extends Model
{
    use \jdavidbakr\ReplaceableModel\ReplaceableModel;
    protected $table = 'xrp_prices';
    protected $fillable = ['price, fiat'];
}
