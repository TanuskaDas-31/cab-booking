<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    // Create connection
    $conn =mysqli_connect($servername, $username, $password, $dbname);
    //$conn->set_charset("utf8");
    // Check connection
    if ($conn) {
    //   die("Connection failed: " . $conn->connect_error);
        //echo "connection ache";
    }
    else{
        echo "error";
    }
?>