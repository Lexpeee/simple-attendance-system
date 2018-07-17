<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $databaseName = "db_attendancesystem";

    $conn = mysqli_connect($servername,$username,$password,$databaseName);

    if(!$conn){
        echo mysqli_connect_error($conn);
        echo "<br>";
        exit("You are not connected.. Sorry..");
    }

    date_default_timezone_set("Asia/Hong_Kong");

    $dateNow = date("Y-m-d");
    $timeNow = date("h:i:sa");


    
?>