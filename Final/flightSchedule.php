<?php
    if(!isset($_SESSION)) { // if session hasn't started yet, then start the session
        session_start();
    }
?>
<!DOCTYPE html>
<html>

<head>
	<title>FLIGHT SCHEDULE </title>
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
		
		<li>
            <!-- If the user is logged in, then add a "Log out" link to the navbar menu -->
            <?php
            if (isset($_SESSION['username'])) {
                $_SESSION['logout'] = "<div><a href='logout.php'>Log Out</a></div>";
                echo $_SESSION['logout']; // add to DOM
            }
            //After you log out, it would throw a javascript error. See if you can fix it
            ?>
        </li>
	</ul>
	
	
	<h2> VIEW FLIGHT SCHEDULE</h2>
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
				<th class="column1">FLIGHT DATE </th>
				<th class="column1">FLIGHT NUMBER </th>
				<th class="column1">START TIME</th>
				<th class="column1">&nbsp;&nbsp;FROM</th> &nbsp;&nbsp;
				<th class="column1">&nbsp;&nbsp;TO</th>
			</tr>
		</thead>
		<tbody>
			<?php 
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
					
					$sql = "SELECT * FROM cloudflights";
					$result = $connection->query($sql);
					
					if(!$result) {
						die("Invalid query: " . $connection->error);
					}
					
					//read data of each row
					while($row = $result->fetch_assoc()){
					
					
					echo "<tr> 
					<td>" . $row["flight_date"] . "</td>
					<td>" . $row["flight_number"] . "</td>
					<td>" . $row["start_time"] . "</td>
					<td>" . $row["from_airport"] . "</td>
					<td>" . $row["destination"] . "</td>
					 </td>
					</tr>";
					}
					
					?>
		</tbody>
	</table>
</body>

</html>
