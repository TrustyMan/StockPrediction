var listID = 0;
var chartData = [];
var chartData2 = [];
var chartData3 = [];
var chartData4 = [];

var chart;
var start_index = 0;
var lastdate = "";

var flag = 0;

$(document).ready(function(){
	$(".add-stock").click(function(){
		console.log("Came");
		$("#add-one").remove();

		var str = $("#selectList").val();
		listID ++;
		var html = '<div id="myList' + listID + '" class="panel-heading"><span class="stock-name">' + str + '</span><button class="btn-delete ' + str + '" style="float: right;">Delete</button></div>';
		$("#myList").append(html);

		$('.btn-delete').click(function(){
			$(this).parent().remove();
				if(!$("#myList span").length){
				$("#myList").html('<span id="add-one">Add new One</span>');
				}
		});
	});

	$(".gloser").click(function(){
		$(".gloser").removeClass("active");
		$(this).addClass("active");
	});
	$("#ALGN").addClass("active-row");
	// generateChartData();
	get_Chart_data();
	setInterval(get_real_time_data, 60000);

	$(".identify-row").click(function(){
		
		$(".identify-row").removeClass("active-row");
		$(this).addClass("active-row");
		start_index = $(this).data('id');

		get_Chart_data();
		setInterval(get_real_time_data, 60000);
	});
});



function get_Chart_data(){
	$.post("DataController/getChartData", {}, function(response){
		chartData = [];
		var result = JSON.parse(response);
		//console.log(result);
		for(var i = start_index;i < result.length;i += 5){
			chartData.push( {
		        "date": new Date(result[i].Date),
		        "value": parseFloat((result[i].ChangePercent).substring(0,(result[i].ChangePercent).length - 1)),
		        "volume": parseFloat(result[i].Volume)
		    });
		}
		draw_chart();
		lastdate = result[result.length-1].Date;

		setInterval( function() {
		    // if mouse is down, stop all updates
		    if ( chart.mouseDown )
		      return;

		    $.post("DataController/getRealChartData", {}, function(response){
			var result = JSON.parse(response);
			realtime = result.realtime;
			console.log(realtime[start_index].Date);
			if(lastdate != realtime[start_index].Date){
				chart.dataSets[0].dataProvider.push( {
			      date: new Date(realtime[start_index].Date),
			      value: parseFloat((realtime[start_index].ChangePercent).substring(0, (realtime[start_index].ChangePercent).length-1)),
			      volume: parseFloat(realtime[start_index].Volume)
			    } );
			    chart.validateData();
			    lastdate = realtime[start_index].Date;
			}
			});
		  }, 60000 );
	});
}

// function get_real_chartdata(){
// 	$.post("DataController/getRealChartData", {}, function(response){
// 		var result = JSON.parse(response);
// 		realtime = result.realtime;
// 		console.log(realtime[start_index].Date);
// 		// if(lastdate != realtime[start_index].Date){
// 			chart.dataSets[0].dataProvider.push( {
// 		      date: new Date(realtime[start_index].Date),
// 		      value: parseFloat((realtime[start_index].ChangePercent).substring(0, (realtime[start_index].ChangePercent).length-1)),
// 		      volume: parseFloat(realtime[start_index].Volume)
// 		    // } );

// 		    chart.validateData();
// 		// }
		
// 		// console.log(chartData);
// 		// draw_chart();
// 		// lastdate = result[result.length].Date;
// 		// setInterval(get_real_chartdata, 60000);
// 	});
// }

function get_real_time_data(){
	$.post("DataController/getRealTimeData", {}, function(response){
		var result = JSON.parse(response);
		
		// console.log(result);		
		// console.log("HEy");

		realtime = result.realtime;
		$(".ALIGN").children().children(".left").html((result.realtime)[0].ChangeValue + "(" + (result.realtime)[0].ChangePercent + ")");
		$(".ALIGN").children().children(".right").html((result.realtime)[0].Stockname);
		$(".ALIGN").children(".center").html("<h1>" + (result.realtime)[0].Price + "</h1>");

		$(".AAL").children().children(".left").html((result.realtime)[2].ChangeValue + "(" + (result.realtime)[2].ChangePercent + ")");
		$(".AAL").children().children(".right").html((result.realtime)[2].Stockname);
		$(".AAL").children(".center").html("<h1>" + (result.realtime)[2].Price + "</h1>");

		$(".RRS").children().children(".left").html((result.realtime)[4].ChangeValue + "(" + (result.realtime)[4].ChangePercent + ")");
		$(".RRS").children().children(".right").html((result.realtime)[4].Stockname);
		$(".RRS").children(".center").html("<h1>" + (result.realtime)[4].Price + "</h1>");

		top_gl = result.top_gl;
		$("#gainer_first_symbol").text(top_gl[0].Tickername);
		$("#gainer_first_value").text(top_gl[0].ChangePercent);

		$("#gainer_second_symbol").text(top_gl[1].Tickername);
		$("#gainer_second_value").text(top_gl[1].ChangePercent);

		$("#gainer_third_symbol").text(top_gl[2].Tickername);
		$("#gainer_third_value").text(top_gl[2].ChangePercent);

		$("#gainer_fourth_symbol").text(top_gl[3].Tickername);
		$("#gainer_fourth_value").text(top_gl[3].ChangePercent);

		$("#loser_first_symbol").text(top_gl[4].Tickername);
		$("#loser_first_value").text(top_gl[4].ChangePercent);

		$("#loser_second_symbol").text(top_gl[5].Tickername);
		$("#loser_second_value").text(top_gl[5].ChangePercent);

		$("#loser_third_symbol").text(top_gl[6].Tickername);
		$("#loser_third_value").text(top_gl[6].ChangePercent);

		$("#loser_fourth_symbol").text(top_gl[7].Tickername);
		$("#loser_fourth_value").text(top_gl[7].ChangePercent);

		$("#ALGN th:nth-child(1)").html(realtime[0].Stockname);
		$("#ALGN th:nth-child(2)").html(realtime[0].Price);
		if(realtime[0].ChangeValue < 0){
			console.log("came");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-down">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[0].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[0].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#ALGN th:nth-child(3)").html(str);
		}
		else{
			console.log("here");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-up">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[0].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[0].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#ALGN th:nth-child(3)").html(str);
		}

		$("#IBM th:nth-child(1)").html(realtime[1].Stockname);
		$("#IBM th:nth-child(2)").html(realtime[1].Price);
		if(realtime[1].ChangeValue < 0){
			console.log("came");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-down">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[1].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[1].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#IBM th:nth-child(3)").html(str);
		}
		else{
			console.log("here");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-up">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[1].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[1].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#IBM th:nth-child(3)").html(str);
		}

		$("#AAL th:nth-child(1)").html(realtime[2].Stockname);
		$("#AAL th:nth-child(2)").html(realtime[2].Price);
		if(realtime[2].ChangeValue < 0){
			console.log("came");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-down">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[2].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[2].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#AAL th:nth-child(3)").html(str);
		}
		else{
			console.log("here");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-up">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[2].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[2].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#AAL th:nth-child(3)").html(str);
		}

		$("#POLY th:nth-child(1)").html(realtime[3].Stockname);
		$("#POLY th:nth-child(2)").html(realtime[3].Price);
		if(realtime[3].ChangeValue < 0){
			console.log("came");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-down">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[3].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[3].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#POLY th:nth-child(3)").html(str);
		}
		else{
			console.log("here");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-up">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[3].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[3].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#POLY th:nth-child(3)").html(str);
		}

		$("#RRS th:nth-child(1)").html(realtime[4].Stockname);
		$("#RRS th:nth-child(2)").html(realtime[4].Price);
		if(realtime[4].ChangeValue < 0){
			console.log("came");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-down">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[4].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[4].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#RRS th:nth-child(3)").html(str);
		}
		else{
			console.log("here");
			var str = "";
			str += '<div class="col-md-2">';
			str += '<div class="arrow-up">'
			str += '</div>';			
			str += '</div>';
			str += '<div>';
			str += '<p style="font-size:12px;">' + realtime[4].ChangePercent;
			str += '</p>';
			str += '<p>' + realtime[4].ChangeValue;
			str += '</p>';
			str += '</div>';
			$("#RRS th:nth-child(3)").html(str);
		}


		str = "";
		str += "<tr><th>Stock</th><th>Change(%)</th><th>State</th><th>Volume</th><th>Range</th><th>Mkt</th><th>PE</th><th>EPS</th><th>DivYield</th></tr>";
		for(var i = 0;i < 5; i ++){
			str += "<tr>";
			str += "<td>";
			str += realtime[i].Stockname;
			str += "</td>";
			str += "<td>";
			str += realtime[i].ChangeValue+"("+realtime[i].ChangePercent+")";
			str += "</td>";
			str += "<td>";
			str += realtime[i].Status;
			str += "</td>";
			str += "<td>";
			str += realtime[i].Volume;
			str += "</td>";
			str += "<td>";
			str += realtime[i].Low+"~"+realtime[i].High;
			str += "</td>";
			str += "<td>";
			str += realtime[i].MarketCapitalization;
			str += "</td>";
			str += "<td>";
			str += realtime[i].PE;
			str += "</td>";
			str += "<td>";
			str += realtime[i].EPS;
			str += "</td>";
			str += "<td>";
			str += realtime[i].DivYield;
			str += "</td>";
			str += "</tr>"
		}

		$(".w3-table-all").html(str);

		$(".ppp").removeClass("op1");
		$(".ppp").addClass("op");
		$(".qqq").removeClass("op");
		$(".qqq").addClass("op1");
	});
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