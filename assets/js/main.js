
var chartData = [];
var chartData2 = [];
var chartData3 = [];
var chartData4 = [];

var TickerUS = [];
var TickerEU = [];
var TickerAS = [];
var TickerFX = [];
var TickerCR = [];

var current_index = ["0", "0", "0", "0", "0"];

var id_list = ["usa", "eu", "asia", "fx", "crypto"];
var ticker_data;

$(document).ready(function(){
	$("#TopGainers").css("display", "block");

	$(".sub-nav").click(function(){
		console.log("hi");
		if($(this).children("span").attr('id') != "Home")
			location.href = $(this).children("span").html();
	});
	
	getTickerData();
	getTopStockData();
	getStockData();
	generateChartData();
	draw_chart();
});

function getStockData(){
	$.post("TickerData/GetStock", {}, function(response){
		var result = JSON.parse(response);

		console.log("Stock");
		var str = "";
		for(i = 0;i < 5; i ++){
			str += '<tr>';
			str += '<td><span>' + result[i][0].symbolName + '</span></td>';
			str += '<td><span>' + result[i][0].price + '</span></td>';
			str += '<td><span>' + result[i][0].changePercent + '</span></td>';
			str += '<td><span>' + result[i][0].week1 + '</span></td>';
			str += '<td><span>' + result[i][0].month3 + '</span></td>';
			str += '<td><span>' + result[i][0].year1 + '</span></td>';
			str += '<td><span>' + 'Buy' + '</span></td>';
			str += '<td><span>' + '100' + '</span></td>';
			str += '</tr>';
		}
		
		$("#stock_table_body").html("");
		$("#stock_table_body").html(str);
		getStockData();
	});
}

function getTopStockData(){
	$.post("TickerData/GetTopStock", {}, function(response){
		var result = JSON.parse(response);

		console.log("Hi");

		var str1 = "", str2 = "";
		for(i = 0;i < 4; i ++){
			str1 += '<div class="row center">';
			str1 += '<span class="col-md-6">' + result[i].StockName + '</span>';
			str1 += '<span class="col-md-6">' + result[i].ChangePercent + '%</span>';
			str1 += '</div>';
		}
		
		$("#TopGainers").html("");
		$("#TopGainers").html(str1);

		for(i = 4;i < 8; i ++){
			str2 += '<div class="row center">';
			str2 += '<span class="col-md-6">' + result[i].StockName + '</span>';
			str2 += '<span class="col-md-6">' + result[i].ChangePercent + '%</span>';
			str2 += '</div>';
		}

		$("#TopLosers").html("");
		$("#TopLosers").html(str2);

		getTopStockData();
	});
}

function getTickerData(){
	$.post("TickerData/GetData", {}, function(response){
		var result = JSON.parse(response);

		ticker_data = result;
		console.log("Hey");

		TickerUS = result[0];
		TickerEU = result[1];
		TickerAS = result[2];
		TickerFX = result[3];
		TickerCR = result[4];

		for(var i = 0;i < 5;i ++){
			// var str = "";
			// str += '<br>';
			// str += '<p><span class="left">' + result[i][current_index[i]].price + '</span><span class="right">' + result[i][current_index[i]].changevalue + "(" + result[i][current_index[i]].percent + ")" + '</span></p>';
			// str += '<p class="center">';
			// str += '<select class="select" id="select' + i + '"">';
			// str += '<option value="0">' + result[i][0].symbol + '</option>';
			// str += '<option value="1">' + result[i][1].symbol + '</option>';
			// str += '<option value="2">' + result[i][2].symbol + '</option>';
			// str += '<option value="3">' + result[i][3].symbol + '</option>';
			// str += '<option value="4">' + result[i][4].symbol + '</option>';
			// str += '<option value="5">' + result[i][5].symbol + '</option>';
			// str += '</select>';
			// str += '</p>';
			// str += '<br>';

			// $("#" + id_list[i]).html(str);

			$("#select"+i).parent().parent().children().children("span.left").html(result[i][current_index[i]].price);
			$("#select"+i).parent().parent().children().children("span.right").html(result[i][current_index[i]].changevalue);

			var element = document.getElementById("select"+i);
    		element.value = current_index[i];
    		
		}
		$("#select0").on('change', function(){
			current_index[0] = this.value;
			$(this).parent().parent().children().children("span.left").html(ticker_data[0][current_index[0]].price);
			$(this).parent().parent().children().children("span.right").html(ticker_data[0][current_index[0]].changevalue);
		});
    	$("#select1").on('change', function(){
			current_index[1] = this.value;
			$(this).parent().parent().children().children("span.left").html(ticker_data[1][current_index[1]].price);
			$(this).parent().parent().children().children("span.right").html(ticker_data[1][current_index[1]].changevalue);
		});
    	$("#select2").on('change', function(){
			current_index[2] = this.value;
			$(this).parent().parent().children().children("span.left").html(ticker_data[2][current_index[2]].price);
			$(this).parent().parent().children().children("span.right").html(ticker_data[2][current_index[2]].changevalue);
		});
    	$("#select3").on('change', function(){
			current_index[3] = this.value;
			$(this).parent().parent().children().children("span.left").html(ticker_data[3][current_index[3]].price);
			$(this).parent().parent().children().children("span.right").html(ticker_data[3][current_index[3]].changevalue);
		});
    	$("#select4").on('change', function(){
			current_index[4] = this.value;
			$(this).parent().parent().children().children("span.left").html(ticker_data[4][current_index[4]].price);
			$(this).parent().parent().children().children("span.right").html(ticker_data[4][current_index[4]].changevalue);
		});

    	getTickerData();
	});
}


function openCity(evt, cityName) {
	var i, tabcontent, tablinks;
	tabcontent = document.getElementsByClassName("tabcontent");
	for (i = 0; i < tabcontent.length; i++) {
		tabcontent[i].style.display = "none";
	}
	tablinks = document.getElementsByClassName("tablinks");
	for (i = 0; i < tablinks.length; i++) {
		tablinks[i].className = tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityName).style.display = "block";
	evt.currentTarget.className += " active";
}




function draw_chart(){
	chart = AmCharts.makeChart( "chartdiv", {
    "type": "stock",
    "theme": "light",

    "glueToTheEnd": true,

    // Defining data sets
    "dataSets": [ {
      "title": "PercentLine(%)",
      "fieldMappings": [ {
        "fromField": "value",
        "toField": "value"
      }],
      "dataProvider": chartData,
      "categoryField": "date"
    }],

    // Panels
    "panels": [ {
      "showCategoryAxis": false,
      "title": "Value",
      "percentHeight": 100,
      "stockGraphs": [ {
      	"graphType": "line",
        "id": "g1",
        "valueField": "value",
        "balloonText": "Percent:<b>[[value]]</b>"
      } ],      
      "stockLegend": {}
    }]
    ,
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
    // Scrollbar settings
    "chartScrollbarSettings": {
      "graph": "g1",
      "usePeriod": "mm"
    },

    // Period Selector
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
	      "period": "MM",
	      "count": 1,
	      "label": "1D",
	      "selected": true
	    }, {
	      "period": "MAX",
	      "label": "MAX"
	    }]
	  }
  } );
	
}


function generateChartData() {
  var firstDate = new Date();
    firstDate.setDate( firstDate.getDate() - 500 );
    firstDate.setHours( 0, 0, 0, 0 );

    for ( var i = 0; i < 500; i++ ) {
      var newDate = new Date( firstDate );
      newDate.setDate( newDate.getDate() + i );

      var a1 = Math.round( Math.random() * ( 40 + i ) ) + 100 + i;
      var b1 = Math.round( Math.random() * ( 1000 + i ) ) + 500 + i * 2;

      var a2 = Math.round( Math.random() * ( 100 + i ) ) + 200 + i;
      var b2 = Math.round( Math.random() * ( 1000 + i ) ) + 600 + i * 2;

      var a3 = Math.round( Math.random() * ( 100 + i ) ) + 200;
      var b3 = Math.round( Math.random() * ( 1000 + i ) ) + 600 + i * 2;

      var a4 = Math.round( Math.random() * ( 100 + i ) ) + 200 + i;
      var b4 = Math.round( Math.random() * ( 100 + i ) ) + 600 + i;

      chartData.push( {
        "date": newDate,
        "value": a1,
        "volume": b1
      } );
      chartData2.push( {
        "date": newDate,
        "value": a2,
        "volume": b2
      } );
      chartData3.push( {
        "date": newDate,
        "value": a3,
        "volume": b3
      } );
      chartData4.push( {
        "date": newDate,
        "value": a4,
        "volume": b4
      } );
    }
}
