<?php
$locations = locations();
$origin = $destination = $cabin_class = $departure_date = $return_date = $tickets_count = $trip_type = $phone_number = $passport_number = $password = "";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $save_user_information = store_user_information($_POST);
    session_start();
    $_SESSION['form_information'] = $save_user_information;
    if (!empty($save_user_information['error'])) {
        $_SESSION['errors'] = $save_user_information['error'];
        header("location:booking.php");
        exit();
    }
}

function store_user_information($data) {
    $return_data = [];
    foreach ($data as $key => $value) {
        $return_data[$key] = $value;
        if ($key == "origin" && trim(empty($value))) {
            $return_data['error'][] = "Origin is required";
        }
        if ($key == "destination" && trim(empty($value))) {
            $return_data['error'][] = "Destination is required";
        }
        if ($key == "cabin_class" && trim(empty($value))) {
            $return_data['error'][] = "Cabin class is required";
        }
        if ($key == "trip_type" && trim(empty($value))) {
            $return_data['error'][] = "Trip type is required";
        }
        if ($key == "departure_date" && trim(empty($value))) {
            $return_data['error'][] = "Departure date is required";
        }
        if (!empty($return_data['trip_type']) && $return_data['trip_type'] == "ROUND" && $key == "return_date" && trim(empty($value))) {
            $return_data['error'][] = "Return date is required";
        }
        if ($key == "tickets_count" && trim(empty($value))) {
            $return_data['error'][] = "Number of tickets is required";
        }
        if ($key == "phone_number" && trim(empty($value))) {
            $return_data['error'][] = "Phone number is required";
        }
        if ($key == "passport_number" && trim(empty($value))) {
            $return_data['error'][] = "Passport number is required";
        }
        if ($key == "password" && trim(empty($value))) {
            $return_data['error'][] = "Password is required";
        }
    }
    if (!empty($return_data['origin']) && $return_data['origin'] == $return_data['destination']) {
        $return_data['error'][] = "Origin and Destination should not be the same";
    }
    if (!empty($return_data['departure_date']) && $return_data['trip_type'] == "ROUND" && strtotime($return_data['departure_date']) > strtotime($return_data['return_date'])) {
        $return_data['error'][] = "Departure date should not be the less than return date";
    }
    if (!empty($return_data['error'])) {
        return $return_data;
    }
    $date = date("Y-m-d H:i:s");
    if (empty($return_data['return_date']) || $return_data['trip_type'] == "ONE WAY") {
        $return_data['return_date'] = null;
    }
    return $return_data;
}

function locations() {
    return ["Cambodia", "Hong Kong", "India", "Japan", "Korea", "Laos", "Myanmar", "Singapore", "Thailand", "Vietnam"];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>BOOK A FLIGHT</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSS only
https://getbootstrap.com/ -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/bookaflight.css" /> </head>

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
<h2>Booking Details</h2>
<br>
<br>
<br>
<br>
<br>
<p>This is your booking details</p>
<?php
if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div class='alert alert_danger'>$error</div>";
    }
}
?>
<div>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="list-heading">Origin</span>
            <span class="list-content"><?=$save_user_information['origin']?></span>
        </li>
        <li class="list-group-item">
            <span class="list-heading">Destination</span>
            <span class="list-content"><?=$save_user_information['destination']?></span>
        </li>
        <li class="list-group-item">
            <span class="list-heading">Cabin Class</span>
            <span class="list-content"><?=$save_user_information['cabin_class']?></span>
        </li>
        <li class="list-group-item">
            <span class="list-heading">Trip Type</span>
            <span class="list-content"><?=$save_user_information['trip_type']?></span>
        </li>
        <li class="list-group-item">
            <span class="list-heading">DEPARTURE DATE</span>
            <span class="list-content"><?=$save_user_information['departure_date']?></span>
        </li>
        <?php
        if ($save_user_information['trip_type'] != "ONE WAY")
        {
        ?>
            <li class="list-group-item">
                <span class="list-heading">RETURN DATE</span>
                <span class="list-content"><?=$save_user_information['return_date']?></span>
            </li>
        <?php
        }
        ?>
        <li class="list-group-item">
            <span class="list-heading">NUMBER OF TICKETS</span>
            <span class="list-content"><?=$save_user_information['tickets_count']?></span>
        </li>
        <li class="list-group-item">
            <span class="list-heading">PHONE NUMBER</span>
            <span class="list-content"><?=$save_user_information['phone_number']?></span>
        </li>
        <li class="list-group-item">
            <span class="list-heading">PASSPORT NUMBER</span>
            <span class="list-content"><?=$save_user_information['passport_number']?></span>
        </li>
        <li class="list-group-item">
            <span class="list-heading">PASSWORD</span>
            <span class="list-content"><?=$save_user_information['password']?></span>
        </li>
    </ul>
    <div style="text-align:center;margin-top: 20px">
        <a href="result.php" class="btn btn-dark" id="book-button" style="width: 200px"><p>Confirm Booking</p></a>
        <a href="booking.php" class="btn btn-dark" id="book-button" style="width: 200px"><p>Update Information</p></a>
    </div>
</div>
</body>

</html>
