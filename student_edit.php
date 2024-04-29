<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "collage_bus";

// create connection
$connection = new mysqli($servername, $username, $password, $database);
$student_id = "";
$name = "";
$email= "";
$address = "";
$branch = "";
$semester = "";
$bus_id = "";
$fees = "";

$errorMessage = "";
$successMessage = "";

if ( $_SERVER['REQUEST_METHOD'] == 'GET') {
       //GET method: show the data of the bus

       if ( !isset($_GET["bus_id"]) ) {
        header("location: /collage_bus/student_index.php");
        exit;
       }

       $bus_id =$_GET["bus_id"];

       //read the row of the selected bus from the database table
       $sql = "SELECT * FROM student WHERE bus_id=$bus_id";
       $result = $connection->query($sql);
       $row = $result->fetch_assoc();

       if (!$row) {
        header("location: /collage_bus/student_index.php");
        exit;
       }

       $student_id = $row["student_id"];
       $name = $row["name"];
       $email = $row["email"];
       $address = $row["address"];
       $branch = $row["branch"];
       $semester = $row["semester"];
       $bus_id = $row["bus_id"]; 
       $fees = $row["fees"];
}
else{
    //POST method: update the date of the client

    $student_id = $_POST["student_id"];
    @$name = $_POST["name"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $branch = $_POST["branch"];
    $semester = $_POST["semester"];
    $bus_id = $_POST["bus_id"];
    $fees = $_POST["fees"];
    

    do {
        if ( empty($student_id) || empty($name) || empty($email) || empty($address)  || empty($branch) || empty($semester) || empty($bus_id) || empty($fees) ) {
            $errorMessage = "All the fields are required";
            break;
        }

        $sql = "UPDATE student " .
               "SET bus_id='$bus_id', student_id='$student_id', name='$name', email='$email', address='$address', branch= '$branch', semester='$semester',bus_id='$bus_id', fees='$fees'  " .
               "WHERE bus_id = $bus_id";

               $result = $connection->query($sql);

               if (!$result) {
                $errorMessage = "Invalied query: " . $connection->error;
                break;
               }

               $successMessage = "bus update correctly";

               header("location: /collage_bus/student_index.php");
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
    <title>student</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h2>EDIT STUDENT</h2>
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
