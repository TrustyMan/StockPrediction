<?php
    session_start();
    $type = $_POST['type'];
    $con=mysqli_connect("localhost","root","","mltr");
    // Check connection
    if (mysqli_connect_errno())
    {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if ($type == 'signin') {
        $username = $_POST['username'];
        $password = $_POST['password'];
        // Perform queries 
        $result = mysqli_query($con,"SELECT * FROM user_table where (username='".$username."' or email='".$username."') and password='".$password."'");
        if ( $result ) {
            $user = mysqli_fetch_assoc($result);
            if ( $user ) {
                $_SESSION['username'] = $user['username'];
                echo 'success';
            } else {
                echo 'invalid';
            }
            mysqli_free_result($result);
        }
        // echo "SELECT * FROM user_table where username='".$username."' and password='".$password."'";
    } else if ( $type == 'logout')  {
        $_SESSION['username'] = '';
    } else {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $sql = "INSERT INTO user_table(username, email, password) VALUES ('$username', '$email', '$password')";
        // echo $sql;
        if ( $result = mysqli_query($con, $sql) ) {
            $_SESSION['username'] = $username;
            echo 'success';
        } else { echo 'failure on register'; }

    }

    mysqli_close($con);
    
?>