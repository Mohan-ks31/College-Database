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
        <h2>LIST OF ROUTE'S</h2>
        <a class="btn btn-primary" href="/collage_bus/route_create.php" role="button">New route </a>
        <a class="btn btn-primary" href="/collage_bus/d_index.php" role="button">Dashboard </a>

        <br>
        <table class="table">
            <thead>
        <br>
        <table class="table">
            <thead>
                <tr>
                    <th>route</th>
                    <th>bus_id</th>
                    <th>route_id</th>
                    <th>pick_up</th>
                    <th>drop_time</th>
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
                $sql = "SELECT * FROM route";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " .$connection->error);
                }

                // read data of each row
                while($row = $result->fetch_assoc()) {
                    echo "
                        <tr>
                            <td>$row[route]</td>
                            <td>$row[bus_id]</td>
                            <td>$row[route_id]</td>
                            <td>$row[pick_up]</td>
                            <td>$row[drop_time]</td>
                            
                            <td>
                                <a class='btn btn-primary btn-sm' href='/collage_bus/route_edit.php?bus_id=$row[bus_id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='/collage_bus/route_delete.php?bus_id=$row[bus_id]'>Delete</a>
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