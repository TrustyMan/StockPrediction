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
    var str = $("#selectList").val();
    var html = '<div class="panel-heading"><span>' + str + '</span><button class="btn-delete ' + str + '" style="float: right;">Delete</button></div>';
    $("#myList").append(html);

    $('.btn-delete').click(function(){
      $(this).parent().remove();
      if(!$("#myList span").length){
        //console.log("ss");
        $("#myList").html('<span id="add-one">Add new One</span>');
      }
    });
    
  });
});

// function delete1(str){
  
//   //console.log($("#myList").html());
//   if(!$("#myList span").length){
//     console.log("ss");
//     $("#myList").html('<span id="add-one">Add new One</span>');
//   }
// }
