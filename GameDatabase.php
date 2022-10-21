<?php
//This code is to connect to the MYSQL database
    // Input host name, database username, password, and database name accordingly
    $con = mysqli_connect("localhost","root","Mobi1045@123","gamelogin");
    // Check connection to database
    if (mysqli_connect_errno()){
        echo "MySQL Connection Failed: " . mysqli_connect_error();
    }
?>
