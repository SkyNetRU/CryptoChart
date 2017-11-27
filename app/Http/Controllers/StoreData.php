<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class StoreData extends Controller
{

    public function getData()
    {
        $crypts = array('btc', 'eth', 'bch', 'xrp', 'ltc');
        foreach ($crypts as $coin) {
            $uri = 'https://min-api.cryptocompare.com/data/histominute?fsym='.strtoupper($coin).'&tsym=USD&limit=5';
            $client = new Client(); //GuzzleHttp\Client
            $result = $client->get($uri);
            $prices = json_decode($result->getBody()->getContents());

            foreach ($prices->Data as $data) {
                if ($data->close != 0){
                    $seeds[] = array(
                        'price' => $data->close,
                        'fiat' => "USD",
                        'time' => $data->time
                    );
                }
            }

            $model = 'App\\' . strtoupper($coin) . '_Price';

            //Insert data
            $model::insertIgnore($seeds);
        }
    }

}
