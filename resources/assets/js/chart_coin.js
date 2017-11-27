require('./bootstrap');
import React , {Component, PropTypes} from 'react';
import { render } from 'react-dom';

import Chart from './components/Chart';

ReactDOM.render(
    <Chart url="/get_price_data/"{coin} />,
    document.getElementById(coin)
);
