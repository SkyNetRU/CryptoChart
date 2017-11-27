import React, {Component, PropTypes} from 'react';
import AmCharts from '@amcharts/amcharts3-react';

class Chart extends Component {
  constructor(props) {
    super(props);

    this.state = {
      dataProvider: [],
    };
  }

  componentDidMount() {
    $.ajax({
      url: this.props.url,
      dataType: 'json',
      cache: false,
      success: function(data) {
        var chartData = [];
        $(data).each(function() {
          chartData.push({
            'date': new Date((this.time * 1000)),
            'value': this.price.toFixed(2)
          });
        });

        this.setState({dataProvider: chartData});
      }.bind(this),
      error: function(xhr, status, err) {

      }.bind(this),
    });
  }

  componentWillUnmount() {

  }

  render() {
    const config = {
      'type': 'stock',
      'theme': 'light',
      'categoryAxesSettings': {
        'minPeriod': 'mm',
      },

      'dataSets': [
        {
          'color': '#b0de09',
          'fieldMappings': [
            {
              'fromField': 'value',
              'toField': 'value',
            }],

          'dataProvider': this.state.dataProvider,
          'categoryField': 'date',
        }],

      'panels': [
        {
          'showCategoryAxis': true,
          'title': 'Value',
          'percentHeight': 100,

          'stockGraphs': [
            {
              'id': 'g1',
              'valueField': 'value',
              'type': 'smoothedLine',
              'lineThickness': 2,
              'bullet': 'round',
            }],

          'stockLegend': {
            'valueTextRegular': ' ',
            'markerType': 'none',
          },
        }],

      'chartScrollbarSettings': {
        'graph': 'g1',
        'usePeriod': '10mm',
        'position': 'top',
      },

      'chartCursorSettings': {
        'valueBalloonsEnabled': true,
      },

      'periodSelector': {
        'position': 'top',
        'dateFormat': 'YYYY-MM-DD JJ:NN',
        'inputFieldWidth': 150,
        'periods': [
          {
            'period': 'hh',
            'count': 1,
            'label': '1 Hour',
          }, {
            'period': 'DD',
            'count': 1,
            'label': '1 Day',
          }, {
            'period': 'DD',
            'count': 7,
            'selected': true,
            'label': '1 Week',
          }, {
            'period': 'MM',
            'count': 1,
            'label': '1 Month',
          },
          {
            'period': 'YYYY',
            'count': 1,
            'label': '1 Year',
          },
          {
            'period': 'MAX',
            'label': 'All',
          }],
      },

      'panelsSettings': {
        'usePrefixes': false,
      },
    };

    return (
        <div className="App">
          <AmCharts.React style={{width: '100%', height: '500px'}}  options={config}/>
        </div>
    );
  }
}

export default Chart;