<?php
if ( isset($_GET["bus_id"]) ){
    $id = $_GET["bus_id"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "collage_bus";

    //Create connection
    $connection = new mysqli($servername, $username, $password,$database);

    $sql = "DELETE FROM faculty WHERE bus_id=$id";
    $connection->query($sql);

}

header("location: /collage_bus/faculty_index.php");
exit;
?>