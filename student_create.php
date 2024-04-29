<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "collage_bus";

$connection = new mysqli($servername, $username, $password, $database);

$student_id = "";
$name = "";
$email = "";
$address = "";
$branch = "";
$semester = "";
$bus_id = "";
$fees = "";


$errorMessage = "";
$successMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $student_id = $_POST["student_id"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $branch = $_POST["branch"];
    $semester = $_POST["semester"];
    $bus_id = $_POST["bus_id"];
    $fees = $_POST["fees"];
    

    do {
          //to check the empty field
        if ( empty($student_id) || empty($name) || empty($email) || empty($address) ||  empty($branch) || empty($semester) || empty($bus_id) ) {
            $errorMessage = "All the field are required";
            break;
        }
         //add new bus to the database
         $sql = "INSERT INTO student (student_id, name, email, address, branch, semester, bus_id, fees)" .
         "VALUES ('$student_id', '$name', '$email', '$address', '$branch', '$semester', '$bus_id', '$fees')";
     $result = $connection->query($sql);
     if (!$result) {
         $errorMessage = "Invalid query: " . $connection->error;
         break;
     }
     
     $student_id = "";
     $name = "";
     $email = "";
     $address = "";
     $branch = "";
     $semester = "";
     $bus_id = "";
     $fees = "";
     

     $successMessage = "bus added correctly";

     header("location: /collage_bus/student_index.php");
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
    <title>student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>ADD STUDENT</h2>
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
                <label class="col-sm-3 col-form-label">student_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="student_id" values="<?php echo $student_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">name</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" values="<?php echo $name; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">email</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="email" values="<?php echo $email; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">address</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="address" values="<?php echo $address; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">branch</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="branch" values="<?php echo $branch; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">semester</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="semester" values="<?php echo $semester; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">bus_id</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="bus_id" values="<?php echo $bus_id; ?>">
                </div>
            </div>
            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">fees</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="fees" values="<?php echo $fees; ?>">
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
                    <a class="btn btn-outline-primary" href="/collage_bus/student_index.php" role="button">Cancel</a>
                </div>
            </div>
        </form>
    </div>
</body>

</html>
