<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BTC_Price;

class GetData extends Controller
{
    public function getData ($coin) {
        $model = 'App\\' . strtoupper($coin) . '_Price';
        $model = new $model;
        $data = $model::orderBy('time', 'asc')->get();
        echo json_encode($data);
    }
}
