<?php

use Illuminate\Database\Seeder;
use GuzzleHttp\Client;
use App\XRP_Price;

class XRP_pricesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->histoMinute();
        $this->histoHour();
        $this->histoDay();
        $this->cutBegin();

    }

    protected function histoMinute () {
        $seeds = array();
        $current = time();

        //Get last 7 days each minute
        for ($i=7;$i >= 0;$i--) {
            $toTs = $current - ($i * 86400);
            $uri = 'https://min-api.cryptocompare.com/data/histominute?fsym=XRP&tsym=USD&limit=1440&aggregate=1&toTs=' . $toTs;
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
        }

        //Insert data
        XRP_Price::insertIgnore($seeds);
    }

    protected function histoHour () {
        $seeds = array();
        $current = time();

        //Get last 6000 hours before 1 week
        for ($i=0;$i<3;$i++){
            $toTs = $current - (7 * 86400);
            $toTs = $toTs - ($i * 2000 * 3600);
            $uri = 'https://min-api.cryptocompare.com/data/histohour?fsym=XRP&tsym=USD&limit=2000&toTs=' . $toTs;
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
        }

        //Insert data
        XRP_Price::insertIgnore($seeds);
    }

    protected function histoDay () {
        $seeds = array();
        $current = time();

        //Get all history in days
        for ($i=0;$i<2;$i++){
            $toTs = $current - (7 * 86400);
            $toTs = $toTs - (3 * 2000 * 3600);
            $toTs = $toTs - ($i * 2000 * 86400);
            $uri = 'https://min-api.cryptocompare.com/data/histoday?fsym=XRP&tsym=USD&limit=2000&toTs=' . $toTs;
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
        }

        //Insert data
        XRP_Price::insertIgnore($seeds);
    }

    public function cutBegin () {
        XRP_Price::orderBy('time')->take(1)->delete();
        BCH_Price::orderBy('time', 'desc')->take(3)->delete();
    }
}
