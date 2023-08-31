<?php
include_once ("DB_Connection.php");
    $connection = new DB_Connection();
    $conn = $connection->make_connection();
    session_start();
    if (!empty($_SESSION['form_information'])) {
        unset($_SESSION['errors']);
        $return_data = $_SESSION['form_information'];
        $date = date("Y-m-d H:i:s");
        if (empty($return_data['return_date']) || $return_data['trip_type'] == "ONE WAY") {
            $return_data['return_date'] = null;
        }
        if ($stmt  = $conn->prepare(
            "insert into order (origin, destination, cabin_class, departure_date, return_date, tickets_count, trip_type, phone_number, passport_number, password, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)"
        )) {
            $stmt->bind_param("sssssisssss",$return_data['origin'],$return_data['destination'],$return_data['cabin_class'],$return_data['departure_date'],$return_data['return_date'],$return_data['tickets_count'],$return_data['trip_type'],$return_data['phone_number'],$return_data['passport_number'],md5($return_data['password']),$date);
            if ($stmt->execute()) {
                $inserted_id  = $stmt->insert_id;
                $_SESSION['my_booking'] = $inserted_id;
                $return_data['success'] = "Flight booking record inserted successfully";
            } else {
                $_SESSION['errors'] = "Something went wrong please try again";
            }
        } else {
            $_SESSION['errors'] = "Something went wrong please try again";
        }
        if (!empty($_SESSION['errors'])) {
            header("location:booking.php");
            exit;
        } else {
            unset($_SESSION['form_information']);
        }
    }
    $user_records = get_my_record($conn);

    function get_my_record($conn) {
        $id = $_SESSION['my_booking'];
        $query = $conn->prepare("select * from order where id = ? limit 1");
        $query->bind_param("i",$id);
        $query->execute();
        $result = $query->get_result();
        return $result->fetch_assoc();
    }
?>
<!DOCTYPE html>
<html>

<head>
    <title>USERS PAGE</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="css/catchaflight.css" /> </head>

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
<h2>VIEW YOUR DETAILS</h2>
<br>
<?php
    if (!empty($user_records)){
        ?>
        <table class="table">
            <thead>
            <tr>
                <th>Origin</th>
                <th>Destination</th>
                <th>Cabin Class</th>
                <th>Departure Date</th>
                <?php
                if (!empty($user_records['return_date'])) { echo "<th>Return Date</th>";}
                ?>
                <th>Tickets Count</th>
                <th>Trip Type</th>
                <th>Phone Number</th>
                <th>Passport Number</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?=$user_records['origin']?></td>
                <td><?=$user_records['destination']?></td>
                <td><?=$user_records['cabin_class']?></td>
                <td><?=$user_records['departure_date']?></td>
                <?php
                if (!empty($user_records['return_date'])) { echo "<td>".$user_records['return_date']."</td>";}
                ?>
                <td><?=$user_records['tickets_count']?></td>
                <td><?=$user_records['trip_type']?></td>
                <td><?=$user_records['phone_number']?></td>
                <td><?=$user_records['passport_number']?></td>
            </tr>
            </tbody>
        </table>
<?php
    }
?>
</body>

</html>
