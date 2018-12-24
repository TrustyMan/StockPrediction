function drawTable(){
	var html = "";
	total = Math.ceil(table_data.length/20);
	var monthNames = [
	    "January", "February", "March",
	    "April", "May", "June", "July",
	    "August", "September", "October",
	    "November", "December"
	];
	
	for(var i = (index-1) * 20; i < index * 20;i ++){
		//console.log(res[i]);

		if(table_data[i] != undefined){
			html += "<tr class='row'>";
			var date = new Date(table_data[i].date);
			html += "<td class='date'>" + monthNames[date.getMonth()] + " " +  date.getDate() + ", " + date.getFullYear() + "</td>";
			html += "<td>" + table_data[i].open + "</td>";
			html += "<td>" + table_data[i].high + "</td>";
			html += "<td>" + table_data[i].low + "</td>";  
			html += "<td>" + table_data[i].close + "</td>";
			html += "<td>" + table_data[i].volume + "</td>";
			html += "<td>" + table_data[i].volume + "</td>";
			html += "</tr>";
		}
	}
	$(".table-body").html('');
	$(".table-body").append(html);
	$("#number").val(index + "/" + total);
}

function getTableData(){
	$.post("DataController/getTableData", {"model":model}, function(res){
		table_data = JSON.parse(res);
		if(load_status != 1){
          load_status ++;
        }
        else{
          $(".loader").css("display","none");
          $(".main").css("opacity","1");
          load_status = 0;
        }
		drawTable();
	});
}

