<?php
    // define('HOST_NAME', '35.245.69.105');
    // define('USER_NAME', 'root');
    // define('USER_PASS', 'admin123456');
    // define('TABLE_NAME', 'yahoofinance');
    define('HOST_NAME', 'localhost');
    define('USER_NAME', 'root');
    define('USER_PASS', '');
    define('TABLE_NAME', 'yahoofinance');
    $con=mysqli_connect(HOST_NAME, USER_NAME, USER_PASS, TABLE_NAME);
    // Check connection
	if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
?>