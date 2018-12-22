function getCurrentStockBodyHtml(stock_types, stock_datas) {
    var i_html = '';
    console.log(stock_datas);
    for (var i=0; i<stock_types.length; i++ ) {
        i_html += '<tr class="stock-row" data-model="'+stock_datas[i][1]+'">';
        i_html += '<td>' + stock_datas[i][1] + '</td>';
        i_html += '<td>' + stock_datas[i][2] + '</td>';
        if (stock_datas[i][4].substring(0, 1) == '+') {
            i_html += '<td style="color: #22caac;">' + stock_datas[i][4] + '</td>';
        } else {
            i_html += '<td style="color: #fd3d73;">' + stock_datas[i][4] + '</td>';
        }
        i_html += '<td>' + stock_datas[i][5] + '</td>';
        i_html += '<td>' + stock_datas[i][6] + '</td>';
        i_html += '<td>' + stock_datas[i][7] + '</td>';
        i_html += '<td>' + stock_datas[i][8] + '</td>';
        i_html += '<td>' + stock_datas[i][9] + '</td>';
        i_html += '</tr>';
    }
    
    return i_html;
}
$(document).ready(function() {
    
    $(".p-right").click(function(){
        if ($(this).hasClass('active')) {
            $(".p-right").removeClass('active');
        } else {
            $(".p-right").removeClass('active');
            $(this).addClass('active');
        }
    });

    $(".stock-row").click( function(){
        $model = $(this).data('model');
        location.href = '/?model='+$model;
    });


    $(".btn_prev").click(function(){
        if(index == 1){
            return;
        }
        index --;
        console.log(index);
        drawTable(model, index);
    });
    $(".btn_next").click(function(){
        if(index == total){
            return;
        }
        index ++;
        console.log(index);
        drawTable(model, index);
    });
});
