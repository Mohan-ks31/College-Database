<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Collage_bus</title>
    <link rel="stylesheet" type="text/css" href="a.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
</head>
<body>
    <div class="container my-5">
        <h2>TRANSPORT</h2>
        <a class="btn btn-primary" href="/collage_bus/transport_create.php" role="button">New Bus </a>
        <a class="btn btn-primary" href="/collage_bus/d_index.php" role="button">Dashboard </a>

        <br>
        <table class="table">
            <thead>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>bus_id</th>
                    <th>driver_id</th>
                    <th>route_id</th>
                    <th>Action</th>

                 </tr>
            </thead>
            <tbody>
                <?php
                $servername="localhost";
                $username="root";
                $password="";
                $database="collage_bus";

                //create connection
                $connection = new mysqli($servername, $username, $password, $database);

                //check connection
                if($connection->connect_error){
                    die("Connection failed: " . $connection->connect_error);
                }
                  
                //read all row from database table
                $sql = "SELECT * FROM transport";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " .$connection->error);
                }

                // read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>$row[bus_id]</td>
                            <td>$row[driver_id]</td>
                            <td>$row[route_id]</td>
                            
                            <td>
                                <a class='btn btn-primary btn-sm' href='/collage_bus/transport_edit.php?bus_id=$row[bus_id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/collage_bus/transport_delete.php?bus_id=$row[bus_id]'>Delete</a>
                            </td>
                        </tr>
                    ";
                }

                ?>
               
            </tbody>
        </table>
    </div>
</body>
</html>