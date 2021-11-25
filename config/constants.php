<?php

    session_start();

    define('SITEURL', 'http://localhost/apple/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'techone');
    

    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysql_error());
    $db_connect = mysqli_select_db($conn, DB_NAME) or die(mysql_error());
?>
