<!-- welcome.blade.php -->

<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Laravel</title>
    <link href="{{asset('css/app.css')}}" rel="stylesheet" type="text/css">
    <script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
    <script src="https://www.amcharts.com/lib/3/serial.js"></script>
    <script src="https://www.amcharts.com/lib/3/amstock.js"></script>
    <script src="https://www.amcharts.com/lib/3/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css" media="all" />
    <script src="https://www.amcharts.com/lib/3/themes/light.js"></script>


</head>
<body>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Заголовок -->
        <div class="navbar-header">

        </div>
        <div class="collapse navbar-collapse" id="navbar-main">

            <ul class="nav navbar-nav">
                <li class="active"><a href="/">Home</a></li>
                <li><a href="/chart/btc">Bitcoin</a></li>
                <li><a href="/chart/eth">Ethereum</a></li>
                <li><a href="/chart/bch">Bitcoin Cash</a></li>
                <li><a href="/chart/ltc">Litecoin</a></li>
                <li><a href="/chart/xrp">Ripple</a></li>
            </ul>

        </div>
    </div>
</nav>

<h2>Bitcoin</h2>
<div id="btc"></div>

<h2>Ethereum</h2>
<div id="eth"></div>

<h2>Bitcoin Cash</h2>
<div id="bch"></div>

<h2>Litecoin</h2>
<div id="ltc"></div>

<h2>Ripple</h2>
<div id="xrp"></div>

<script src="{{asset('js/app.js')}}" ></script>
</body>
</html>