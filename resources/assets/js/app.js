require('./bootstrap');
import React , {Component, PropTypes} from 'react';
import { render } from 'react-dom';

import Chart from './components/Chart';


if (typeof coin == "undefined") {
  ReactDOM.render(
      <Chart url="/get_price_data/bch" />,
      document.getElementById('bch')
  );

  ReactDOM.render(
      <Chart url="/get_price_data/btc" />,
      document.getElementById('btc')
  );

  ReactDOM.render(
      <Chart url="/get_price_data/eth" />,
      document.getElementById('eth')
  );

  ReactDOM.render(
      <Chart url="/get_price_data/ltc" />,
      document.getElementById('ltc')
  );

  ReactDOM.render(
      <Chart url="/get_price_data/xrp" />,
      document.getElementById('xrp')
  );
} else {
  ReactDOM.render(
      <Chart url={"/get_price_data/"+coin} />,
      document.getElementById(coin)
  );
}

