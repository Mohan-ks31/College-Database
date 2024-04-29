<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "collage_bus";

$connection = new mysqli($servername, $username, $password, $database);

$bus_id = "";
$driver_id = "";
$driver_name = "";
$address = "";
$phone = "";

$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $bus_id = $_POST["bus_id"];
    $driver_id = $_POST["driver_id"];
    $driver_name = $_POST["driver_name"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];

    do {
          //to check the empty field
        if ( empty($driver_id) || empty($driver_name)  || empty($address)  || empty($phone) ) {
            $errorMessage = "All the field are required";
            break;
        }
         //add new bus to the database
         $sql = "INSERT INTO driver (bus_id, driver_id, driver_name, address, phone)" .
         "VALUES ('$bus_id','$driver_id', '$driver_name', '$address', '$phone')";
     $result = $connection->query($sql);
     if (!$result) {
         $errorMessage = "Invalid query: " . $connection->error;
         break;
     }

     $bus_id = "";
     $driver_id = "";
     $driver_name = "";
     $address = "";
     $phone = "";

     $successMessage = "bus added correctly";

     header("location: /collage_bus/driver_index.php");
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
    <title>BUS</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>ADD DRIVER</h2>
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
                <label class="col-sm-3 col-form-label">bus_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="bus_id" values="<?php echo $bus_id; ?>">
                </div>
            </div>
     <div class="row mb-3">
                <label class="col-sm-3 col-form-label">driver_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="driver_id" values="<?php echo $driver_id; ?>">
                </div>
            </div>
            
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">driver_name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="driver_name" values="<?php echo $driver_name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" values="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">phone</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="phone" values="<?php echo $phone; ?>">
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
                    <a class="btn btn-outline-primary" href="/collage_bus/driver_index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
