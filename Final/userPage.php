<?php
    if(!isset($_SESSION)) { // if session hasn't started yet, then start the session
        session_start();
    }
?>
<!DOCTYPE html>
<html>

<head>
	<title>USERS PAGE</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
	<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
	<link rel="stylesheet" href="css/catchaflight1.css" /> </head>

<body>
	<header>
		<h1 class="title">CATCHAFLIGHT</h1> </header>
	<ul>
		<li><a href="booking.php">BOOK A FLIGHT<img src="images/plane.png" height=30 width=30/></a> </li>
	</ul>
	<ul>
		<li><a href="flightSchedule.php">VIEW SCHEDULE<img src="images/schedule.png" height=30 width=30/></a> </li>
	</ul>
	<ul>
		<li><a href="result.php">VIEW DETAILS<img src="images/details.png" height=30 width=30/></a> </li>
	</ul>
	<ul>
		<li>
            <!-- If the user is logged in, then add a "Log out" link to the navbar menu -->
            <?php
            if (isset($_SESSION['username'])) {
                $_SESSION['logout'] = "<div><a href='logout.php'>Log Out</a></div>";
                echo $_SESSION['logout']; // add to DOM
            }
            ?>
        </li>
	</ul>
	<h2>VIEW YOUR DETAILS</h2>
	<table class="center">
		<thead>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<br>
			<tr>
			<tr>
				<th class="column1">USERNAME</th>
				<th class="column1">FIRST NAME</th>
				<th class="column1">SURNAME</th>
				<th class="column1">EMAIL</th>
				<th class="column1">PHONE NUMBER</th>
				<th class="column1">PASSPORT NUMBER</th>
			</tr>
		</thead>
		<tbody>
			<?php 
			session_start();
			require_once("connectdb.php");
			
					$servername = "smcse-stuproj00.city.ac.uk";
					$username = "adbt154";
					$password = "200021901";
					$database = "adbt154";
					
					// Create a connection
					$connection = new mysqli($servername, $username, $password, $database);
					
					//Check connection
					if ($connection->connect_error){
						die("Connection failed: " . $connection->connect_error);
					}
					
					$sql = "SELECT * FROM cloudusers2 WHERE username = '$username' ";
					$result = $connection->query($sql);
					
					if(!$result) {
						die("Invalid query: " . $connection->error);
					}
					
					//read data of each row
					while($row = $result->fetch_assoc()){
					
					
					echo "<tr> 
					<td>" . $row["username"] . "</td>
					<td>" . $row["first_name"] . "</td>
					<td>" . $row["last_name"] . "</td>
					<td>" . $row["email"] . "</td>
					<td>" . $row["phone_number"] . "</td>
					<td>" . $row["passport_number"] . "</td>
					</tr>";
					}
					
					?>
		</tbody>
	</table>
</body>

</html>
