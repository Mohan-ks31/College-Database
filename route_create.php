<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "collage_bus";

$connection = new mysqli($servername, $username, $password, $database);

$route = "";
$bus_id = "";
$route_id = "";
$pick_up = "";
$drop_time = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $route = $_POST["route"];
    $bus_id = $_POST["bus_id"];
    $route_id = $_POST["route_id"];
    $pick_up = $_POST["pick_up"];
    $drop_time = $_POST["drop_time"];
    

    do {
          //to check the empty field
        if ( empty($route) || empty($bus_id) || empty($route_id) || empty($pick_up) || empty($drop_time) ) {
            $errorMessage = "All the field are required";
            break;
        }
         //add new bus to the database
         $sql = "INSERT INTO route (route, bus_id, route_id, pick_up, drop_time)" .
         "VALUES ('$route', '$bus_id', '$route_id', '$pick_up', '$drop_time')";
     $result = $connection->query($sql);
     if (!$result) {
         $errorMessage = "Invalid query: " . $connection->error;
         break;
     }
     
     $route = "";
     $bus_id = "";
     $route_id = "";
     $pick_up = "";
     $drop_time = "";
     

     $successMessage = "bus added correctly";

     header("location: /collage_bus/route_index.php");
     exit;
 } while (false);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>route</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>ADD route</h2>
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
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">route</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="route" values="<?php echo $route; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">bus_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="bus_id" values="<?php echo $bus_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">route_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="route_id" values="<?php echo $route_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">pick_up</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="pick_up" values="<?php echo $pick_up; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">drop_time</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="drop_time" values="<?php echo $drop_time; ?>">
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
                    <a class="btn btn-outline-primary" href="/collage_bus/route_index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
