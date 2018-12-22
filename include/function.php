<?php
    function getCurrentStockDataByCompany($company) {
        global $con;
        $sql = "select * from stockdata where company='".$company."' order by updatetime desc";
        $result = mysqli_query($con, $sql);
        if ($row = mysqli_fetch_row($result)) {
            return $row;
        } else 
            return null;
    }
?>