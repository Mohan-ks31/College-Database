<?php
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "collage_bus";
    // create connection
    $connection = new mysqli($servername, $username, $password, $database);
    //check connection
    if ($connection->connect_error) {
      die("Connection failed: " . $connection->connect_error);
    }
    //read all rows from database table 
    $result7 = mysqli_query($connection, "call total_s('')");
    $result8 = mysqli_query($connection, "call total_f('')");

    if (!$connection) {
      echo "Connection failed!";
    }
    while ($row = mysqli_fetch_array($result7)) {
        $a= $row[0];
       while ($row = mysqli_fetch_array($result8)) {
       $b=$row[0];
       $add=$a+$b;
       echo "$add";
    ?>