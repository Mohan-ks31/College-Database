<!Doctype HTML>
<html>

<head>
	<title></title>
	<link rel="stylesheet" href="style.css" type="text/css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<style>
		body {
			background-image: url('citbus.jpg');
			background-repeat: no-repeat;
			background-attachment: fixed;
			background-size: 100% 100%;



		}
	</style>
</head>


<body>


	<div id="mySidenav" class="sidenav">
		<p class="logo">College Bus Management</p>
		<a href="#" class="icon-a"><i class="fa fa-dashboard icons"></i> Dashboard</a>
		<a href="/collage_bus/index.php" class="icon-a"><i class="fa fa-bus icons"></i> BUS</a>
		<a href="/collage_bus/transport_index.php" class="icon-a"><i class="fa fa-bus icons"></i> TRANSPORT</a>
		<a href="/collage_bus/driver_index.php" class="icon-a"><i class="fa fa-user icons"></i> DRIVER</a>
		<a href="/collage_bus/route_index.php" class="icon-a"><i class="fa fa-road icons"></i> ROUTE</a>
		<a href="/collage_bus/student_index.php" class="icon-a"><i class="fa fa-user icons"></i> STUDENT</a>
		<a href="/collage_bus/faculty_index.php" class="icon-a"><i class="fa fa-user icons"></i> FACULTY</a>
		<a href="/collage_bus/login.html" class="icon-a"><i class="fa fa-sign-out"></i> LOG OUT</a>


	</div>
	<div id="main">

		<div class="head">
			<div class="col-div-6">
				<span style="font-size:30px;cursor:pointer; color: black;" class="nav"> Dashboard</span>
				<span style="font-size:30px;cursor:pointer; color: black;" class="nav2"> Dashboard</span>
			</div>

			<div class="col-div-6">
				<div class="profile">

					<img src="https://3.imimg.com/data3/ET/RI/GLADMIN-14418069/untitled-500x500.png" class="pro-img" />
					<font color="white">
						Mohan k S and Pooja T D
					</font>


				</div>
			</div>
			<div class="clearfix"></div>
		</div>

		<div class="clearfix"></div>
		<br />
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
		$result1 = mysqli_query($connection, "call total_b('')");
		if (!$connection) {
			echo "Connection failed!";
		}
		?>

		<div class="col-div-3">
			<div class="box">
				<p><?php
					while ($row = mysqli_fetch_array($result1)) {
						echo $row[0];
					}
					?><br /><span>Bus</span></p>
				<i class="fa fa-bus box-icon"></i>
			</div>
		</div>
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
		$result2 = mysqli_query($connection, "call total_t('')");
		if (!$connection) {
			echo "Connection failed!";
		}
		?>
		<div class="col-div-3">
			<div class="box">
				<p><?php
					while ($row = mysqli_fetch_array($result2)) {
						echo $row[0];
					}
					?><br /><span>Transport</span></p>
				<i class="fa fa-bus box-icon"></i>
			</div>
		</div>
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
		$result3 = mysqli_query($connection, "call total_d('')");
		if (!$connection) {
			echo "Connection failed!";
		}
		?>

		<div class="col-div-3">
			<div class="box">
				<p><?php
					while ($row = mysqli_fetch_array($result3)) {
						echo $row[0];
					}
					?><br /><span>Driver</span></p>
				<i class="fa fa-users box-icon"></i>

			</div>
		</div>
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
		$result4 = mysqli_query($connection, "call total_r('')");
		if (!$connection) {
			echo "Connection failed!";
		}
		?>

		<div class="col-div-3">
			<div class="box">
				<p><?php
					while ($row = mysqli_fetch_array($result4)) {
						echo $row[0];
					}
					?><br /><span>route</span></p>
				<i class="fa fa-road box-icon"></i>
			</div>
		</div>
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
		$result5 = mysqli_query($connection, "call total_s('')");
		if (!$connection) {
			echo "Connection failed!";
		}
		?>
		<div class="col-div-3">
			<div class="box">
				<p><?php
					while ($row = mysqli_fetch_array($result5)) {
						echo $row[0];
					}
					?><br /><span>Student</span></p>
				<i class="fa fa-user box-icon"></i>
			</div>
		</div>
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
		$result6 = mysqli_query($connection, "call total_f('')");
		if (!$connection) {
			echo "Connection failed!";
		}
		?>
		<div class="col-div-3">
			<div class="box">
				<p><?php
					while ($row = mysqli_fetch_array($result6)) {
						echo $row[0];
					}
					?><br /><span>Faculty</span></p>
				<i class="fa fa-user box-icon"></i>
			</div>
		</div>

	</div>
	</div>
	</div>
	</div>
	</div>


	<div class="clearfix"></div>
	</div>


	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(".nav").click(function() {
			$("#mySidenav").css('width', '70px');
			$("#main").css('margin-left', '70px');
			$(".logo").css('visibility', 'hidden');
			$(".logo span").css('visibility', 'visible');
			$(".logo span").css('margin-left', '-10px');
			$(".icon-a").css('visibility', 'hidden');
			$(".icons").css('visibility', 'visible');
			$(".icons").css('margin-left', '-8px');
			$(".nav").css('display', 'none');
			$(".nav2").css('display', 'block');
		});

		$(".nav2").click(function() {
			$("#mySidenav").css('width', '300px');
			$("#main").css('margin-left', '300px');
			$(".logo").css('visibility', 'visible');
			$(".icon-a").css('visibility', 'visible');
			$(".icons").css('visibility', 'visible');
			$(".nav").css('display', 'block');
			$(".nav2").css('display', 'none');
		});
	</script>

</body>


</html>