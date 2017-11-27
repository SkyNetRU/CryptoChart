<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request as GuzzleRequest;

class StoreData extends Controller
{

    public function getData()
    {
        $crypts = array('btc', 'eth', 'bch', 'xrp', 'ltc');
        $client = new Client(); //GuzzleHttp\Client

        $uri = 'https://min-api.cryptocompare.com/data/pricemulti?fsyms=' . strtoupper(implode(",", $crypts)) . '&tsyms=USD';
        $result = $client->get($uri);
        $prices = json_decode($result->getBody()->getContents());

        foreach ($prices as $key1 => $price) {
            $model = 'App\\' . strtoupper($key1) . '_Price';
            $new_price = new $model;
            foreach ($price as $key2 => $value) {
                $new_price->price = $value;
                $new_price->fiat = $key2;
            }
            $new_price->save();
        }

    }

}
