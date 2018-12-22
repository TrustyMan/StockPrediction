var chartData = [];
var chart;
var model = location.search.split("model=")[1];
var load_status = 0;
if ( !model ) {
  model = "ALGN";
}
var index = 1;
var total;
var stock_type = ['ALGN', 'IBM', 'AAL', 'POLY.L', 'RRS.L'];
var table_data;
// console.log(model);
function setGrouping(groupTo, button) {
  // set chart grouping
  chart.categoryAxesSettings.groupToPeriods = [groupTo];
  chart.validateData();

  // set selected style on the button
  var buttons = button.parentNode.getElementsByTagName("input");
  for (var i = 0; i < buttons.length; i++) {
    buttons[i].className = "";
  }
  button.className = "selected";
}

function reloadChart() {

  $.post("DataController/getData",{"model": model, "types": stock_type.toString()},function(res){
    // $(".loader").css("display","none");
    // $(".chartdiv").css("display","inline-block");
    var response = JSON.parse(res);
   //console.log(response);
    chartData = response.historyData;
    if(load_status != 1){
      load_status ++;
    }
    else{
      $(".loader").css("display","none");
      $(".main").css("display","block");
      load_status = 0;
    }
    console.log(chartData);
    chart = AmCharts.makeChart("chartdiv", {
          "type": "stock",
          "color": "#fff",
          "dataSets": [{
          "title": model,
            "fieldMappings": [{
              "fromField": "open",
              "toField": "open"
            }, {
              "fromField": "high",
              "toField": "high"
            }, {
              "fromField": "low",
              "toField": "low"
            }, {
              "fromField": "close",
              "toField": "close"
            }, {
              "fromField": "volume",
              "toField": "volume"
            }],
            "compared": false,
            "categoryField": "date",
      
            /**
             * data loader for data set data
             */
          //   "dataLoader": {
          //     "url": "./include/dataLoader.php",
          //     "format": "json",
          //     "type": "post",
          //     "data": { "model": model },
          //     "showErrors": true,
          //     "postProcess": function(data) {
          //       // console.log(data.historyData);
          //       var stock_type = data.stock_type;
          //       var c_st_data = data.current_stock_data;
          //       var i_html = getCurrentStockBodyHtml(stock_type, c_st_data);
          //       $('.cur-history-stock').html(i_html);
          //       $(".stock-row").click(function(){
          //         var new_model = $(this).data('model');
          //         if (model != new_model) {
          //           console.log('haha');
          //           model = new_model;
          //           // location.href = "./?model=" + new_model;
          //           reloadChart();
          //         }
          //       })
          //       // console.log(i_html);
          //       return data.historyData;
          //     }
          //  },
          "dataProvider": chartData,
          }],
          
          "panels": [{
              "title": "Value",
              "percentHeight": 70,
      
              "stockGraphs": [{
                "type": "candlestick",
                "id": "g1",
                "openField": "open",
                "closeField": "close",
                "highField": "high",
                "lowField": "low",
                "valueField": "price",
                "lineColor": "#fff",
                "fillColors": "#fff",
                "negativeLineColor": "#db4c3c",
                "negativeFillColors": "#db4c3c",
                "fillAlphas": 1,
                "balloonText": "open:<b>[[open]]</b><br>close:<b>[[close]]</b><br>low:<b>[[low]]</b><br>high:<b>[[high]]</b>",
                "comparedGraphLineThickness": 2,
                "columnWidth": 0.7,
                "useDataSetColors": false,
                "comparable": true,
                "compareField": "close",
                // "showBalloon": false,
                "proCandlesticks": true,
              }],
      
              "stockLegend": {
                "markerType": "none",
                // "markerSize": 0,
                // "valueWidth": 250,
                "valueTextRegular": ' ',
                // "periodValueTextComparing": "[[percents.value.close]]%"
              }
      
            },
      
            {
              "title": "Volume",
              "percentHeight": 30,
              "marginTop": 1,
              "columnWidth": 0.6,
              "showCategoryAxis": false,
      
              "stockGraphs": [{
                "valueField": "volume",
                "openField": "open",
                "type": "column",
                "showBalloon": false,
                "fillAlphas": 1,
                "lineColor": "#fff",
                "fillColors": "#fff",
                "negativeLineColor": "#db4c3c",
                "negativeFillColors": "#db4c3c",
                "useDataSetColors": false
              }],
      
              "stockLegend": {
                "markerType": "none",
                "markerSize": 0,
                "labelText": "",
                "periodValueTextRegular": "[[value.close]]"
              },
      
              "valueAxes": [{
                "usePrefixes": true
              }]
            }
          ],
      
          "panelsSettings": {
            "panEventEnabled": true,
            "color": "#fff",
            "plotAreaFillColors": "#333",
            "plotAreaFillAlphas": 1,
            "marginLeft": 60,
            "marginTop": 5,
            "marginBottom": 5
          },
      
          "chartScrollbarSettings": {
            "graph": "g1",
            "graphType": "line",
            "usePeriod": "mm",
            "backgroundColor": "#333",
            "graphFillColor": "#666",
            "graphFillAlpha": 0.5,
            "gridColor": "#555",
            "gridAlpha": 1,
            "selectedBackgroundColor": "#444",
            "selectedGraphFillAlpha": 1
          },
      
          "categoryAxesSettings": {
            "groupToPeriods": ["mm"],
            "minorGridEnabled": true, 
            // "equalSpacing": true,
            // "gridColor": "#555",
            // "gridAlpha": 1,
            "minPeriod": "mm",
            // "parseDates": true,
            // "maxSeries": 150,
          },
      
          "valueAxesSettings": {
            "gridColor": "#555",
            "gridAlpha": 1,
            "inside": false,
            "showLastLabel": true
          },
      
          "chartCursorSettings": {
            "valueBallonEnabled": true,
            "fullWidth": true,
            "cursorAlpha": 0.1,
            "pan": true,
            "valueLineEnabled": true,
            "zoomable": true,
            "valueLineBalloonEnabled": true
          },
      
          "legendSettings": {
            "color": "#fff"
          },
      
          "stockEventsSettings": {
            "showAt": "high",
            "type": "pin"
          },
      
          "balloon": {
            "textAlign": "left",
            "offsetY": 10
          },
      
          "periodSelector": {
            "position": "bottom",
            "periods": [{
              "period": "DD",
              "count": 1,
              "label": "1D"
            }, {
              "period": "hh",
              "count": 1,
              "label": "1Hour"
            }, {
              "period": "mm",
              "count": 30,
              "label": "30Min",
              "selected": true
            }, {
              "period": "MAX",
              "label": "MAX"
            }]
          }
        });

        var stock_type = response.stock_type;
        var c_st_data = response.current_stock_data;
        var i_html = getCurrentStockBodyHtml(stock_type, c_st_data);
        $('.cur-history-stock').html(i_html);
        $(".stock-row").click(function(){
          var new_model = $(this).data('model');
          if (model != new_model) {
            model = new_model;
            location.href = "./?model=" + new_model;
            // reloadChart();
          }
          
        });

   });
}
$(document).ready(function() {
  $(".model-name").html(model);
  //setInterval(reloadChart, 5000);
  reloadChart();
  getTableData();
});
    

   