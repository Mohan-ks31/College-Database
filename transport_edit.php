<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "collage_bus";

// create connection
$connection = new mysqli($servername, $username, $password, $database);
$bus_id = "";
$driver_id = "";
$route_id = "";


$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
       //GET method: show the data of the bus

       if ( !isset($_GET["bus_id"]) ) {
        header("location: /collage_bus/transport_index.php");
        exit;
       }

       $bus_id =$_GET["bus_id"];

       //read the row of the selected bus from the database table
       $sql = "SELECT * FROM transport WHERE bus_id=$bus_id";
       $result = $connection->query($sql);
       $row = $result->fetch_assoc();

       if (!$row) {
        header("location: /collage_bus/transport_index.php");
        exit;
       }

       $driver_id = $row["driver_id"];
       $route_id = $row["route_id"];
       
}
else{
    //POST method: update the date of the client

    @$bus_id = $_POST["bus_id"];
    $driver_id = $_POST["driver_id"];
    $route_id = $_POST["route_id"];
    

    do {
        if ( empty($bus_id) || empty($driver_id) || empty($route_id)  ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE transport " .
               "SET bus_id='$bus_id', driver_id='$driver_id', route_id='$route_id' " .
               "WHERE bus_id = $bus_id";

               $result = $connection->query($sql);

               if (!$result) {
                $errorMessage = "Invalied query: " . $connection->error;
                break;
               }

               $successMessage = "bus update correctly";

               header("location: /collage_bus/transport_index.php");
               exit;

    }while (false);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="b.css"/>
    <title>transport</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>EDIT BUS</h2>
        <?php
        if (!empty($errorMessage)) {
            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                <strong>$errorMessage</strong>
                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
            </div>
            ";
        }
        ?>

<form method="post">
    <input type="hidden" name="bus_id" value="<?php echo $bus_id; ?>">
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">driver_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="driver_id" values="<?php echo $driver_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">route_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="route_id" values="<?php echo $route_id; ?>">
                </div>
            </div>
            


            <?php
            if (!empty($successMessage)) {
                echo "
                <div class='row mb-3'>
                    <div class='offset-sm-3 col-sm-6'>
                        <div class='alert alert-success alert-dismissible fade show' role='alert'>
                            <strong>$successMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='close'></button>
                        </div>
                    </div>    
                </div>   
                ";
            }
            ?>

<div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/collage_bus/transport_index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
