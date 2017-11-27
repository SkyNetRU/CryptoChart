<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Chart extends Controller
{
    public function show($coin = null) {
        $data = array ('coin' => $coin);
        return view('chart', $data);
    }
}
