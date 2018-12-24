var listID = 0;
function myFunction() {
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }       
  }
}
function openPage(pageName,elmnt,color) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].style.backgroundColor = "";
  }
  document.getElementById(pageName).style.display = "block";
  elmnt.style.backgroundColor = color;
}

// Get the element with id="defaultOpen" and click on it


$(document).ready(function(){
  $(".add-stock").click(function(){
    $("#add-one").remove();

    $(".nothing").remove();

    var str = $("#selectList").val();
    listID ++;
    var html = '<div id="myList' + listID + '" class="panel-heading"><span>' + str + '</span><button class="btn-delete ' + str + '" onclick="deleteStock(' + "'myList" + listID + "'" + ')" style="float: right;">Delete</button></div>';
    $("#myList").append(html);

    html = '<div id="myList' + listID + '" class="col-md-2 bM"><div class="top" style="background-color: pink;"><p class="pp">'+str+'</p><br><p class="center">'+"Display Data"+'</p><br><p class="center">' + "Footer" + '</p></div></div>';
    $(".myStock").append(html);
    $('.btn-delete').click(function(){
      $(this).parent().remove();
      if(!$("#myList span").length){
        //console.log("ss");
        // <div class="col-md-2">
        //     <div class="top" style="background-color: pink;">
        //         <p>PPPP</p>
        //         <br>
        //         <p>PPPP</p>
        //         <br>
        //         <p>PPPP</p>
        //     </div>
        // </div>

        $("#myList").html('<span id="add-one">Add new One</span>');
      }
    });
  });

  $("#logout_btn").click(function() {
    console.log('dddd');
    $.ajax({
        url: 'SessionControl/destroy',
        type: 'post',
        data: {
            
        },
        success: function(res) {
            console.log(res);
            //location.reload();
        }
    });
});
});

function deleteStock(str){
  listID --;
  $("#"+str).remove();
  //console.log($("#myList").html());
  if(!$("#myList span").length){
    console.log("ss");
    $("#myList").html('<span id="add-one">Add new One</span>');
  }
  if(!$(".myStock div").length){
    var html = '<div class="col-md-2 nothing"><div class="top" style="background-color: pink;"><br><br><p class="center">No Stock</p><br><br></div></div>';
    $(".myStock").append(html);
  }
}


