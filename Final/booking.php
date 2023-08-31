<?php
session_start();
$locations = locations();
$origin = $destination = $cabin_class = $departure_date = $return_date = $tickets_count = $trip_type = $phone_number = $passport_number = $password = "";
function locations()
{
    return ["Cambodia", "Hong Kong", "India", "Japan", "Korea", "Laos", "Myanmar", "Singapore", "Thailand", "Vietnam"];
}

if (!empty($_SESSION['form_information'])) {
    $origin             = $_SESSION['form_information']['origin'];
    $destination        = $_SESSION['form_information']['destination'];
    $cabin_class        = $_SESSION['form_information']['cabin_class'];
    $departure_date     = $_SESSION['form_information']['departure_date'];
    $return_date        = $_SESSION['form_information']['return_date'];
    $tickets_count      = $_SESSION['form_information']['tickets_count'];
    $phone_number       = $_SESSION['form_information']['phone_number'];
    $passport_number    = $_SESSION['form_information']['passport_number'];
    $password           = $_SESSION['form_information']['password'];
    $trip_type          = $_SESSION['form_information']['trip_type'];
}

if (!empty($_SESSION['errors'])) {
    $errors = $_SESSION['errors'];
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
    <link rel="stylesheet" href="css/bookaflight.css" />
</head>

<body>
    <header>
        <h1 class="title">CATCHAFLIGHT</h1>
    </header>
    <ul>
        <li><a href="booking.php">BOOK A FLIGHT<img src="images/plane.png" height=30 width=30 /></a> </li>
    </ul>
    <ul>
        <li><a href="flightSchedule.php">VIEW SCHEDULE<img src="images/schedule.png" height=30 width=30 /></a> </li>
    </ul>
    <ul>
        <li><a href="result.php">VIEW DETAILS<img src="images/details.png" height=30 width=30 /></a> </li>
    </ul>
    <h2>BOOK A FLIGHT</h2>
    <br>
    <br>
    <br>
    <br>
    <br>
    <?php
    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<div class='alert alert_danger'>$error</div>";
        }
        session_destroy();
    }
    ?>
    <form method="post" id="flight_booking" action="confirmation.php">
        <div class="form-item">
            <fieldset>
                <label class="nametype" for="origin">
                    <h3> FROM:</h3>
                </label>
                <select name='origin'>
                    <option value="">Select a location...</option>
                    <?php
                    foreach ($locations as $location) {
                        if ($location == $origin) $origin_selected = "selected";
                        else $origin_selected = "";
                        echo "<option value='" . $location . "' $origin_selected>$location</option>";
                    }
                    ?>
                </select>
                <!--<span style="color: red">(required, at least 3 characters)</span>-->
            </fieldset>
        </div>
        <div class="form-item">
            <fieldset>
                <label class="nametype" for="to">
                    <h3> TO:</h3>
                </label>
                <select name='destination'>
                    <option value="">Select a location...</option>
                    <?php
                    foreach ($locations as $location) {
                        if ($location == $destination) $destination_selected = "selected";
                        else $destination_selected = "";
                        echo "<option value='" . $location . "' $destination_selected>$location</option>";
                    }
                    ?>
                </select>
            </fieldset>
        </div>
        <div class="form-item">
            <fieldset>
                <label class="nametype" for="class">
                    <h3>CLASS: </h3>
                </label>
                <select name='cabin_class'>
                    <option value="">Select a cabin class</option>
                    <option value="PREMIUM ECONOMY" <?php if ($cabin_class == "PREMIUM ECONOMY") echo "selected"; ?>>Premium Economy</option>
                    <option value="BUSINESS CLASS" <?php if ($cabin_class == "BUSINESS CLASS") echo "selected"; ?>>Business Class</option>
                    <option value="FIRST CLASS" <?php if ($cabin_class == "FIRST CLASS") echo "selected"; ?>>First Class</option>
                </select>
            </fieldset>
        </div>
        <div class="radio-select">
            <fieldset>
                <label class="nametype" for="to">
                    <h3>Trip Type: </h3>
                </label>
                <label for="round">
                    <h4>Return </h4>
                </label>
                <input type="radio" name="trip_type" id="trip_type" value="ROUND" <?php if ($trip_type == "ROUND") echo "checked"; ?> checked>
                <label for="oneway">

                    <h4>One way</h4>
                </label>
                <input type="radio" name="trip_type" id="trip_type" value="ONE WAY" <?php if ($trip_type == "ONE WAY") echo "checked"; ?>>
            </fieldset>
        </div>
        <div class="form-item">
            <label class="date" for="departure">
                <h3> DEPARTURE DATE: </h3>
            </label>
            <input type="date" name="departure_date" id="date" placeholder="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" value="<?= $departure_date ?>">

            <br>
        </div>
        <div class="form-item" id="return_date" <?php if ($trip_type == "ONE WAY") { ?> style="display: none" <?php } ?>>
            <label class="date" for="return">
                <h3>RETURN DATE: </h3>
            </label>
            <input type="date" name="return_date" id="return" placeholder="<?= date('Y-m-d') ?>" min="<?= date('Y-m-d') ?>" value="<?= $return_date ?>">

            <br>
        </div>
        <div class="form-item">
            <fieldset>
                <label class="nametype" for="to">
                    <h3>NUMBER OF TICKETS: </h3>
                </label>
                <select name='tickets_count'>
                    <?php
                    foreach ([0, 1, 2, 3, 4, 5, 6, 7] as $i) {
                        $selected = ($i == $tickets_count) ? "selected" : "";
                        echo "<option value='" . $i . "' $selected>$i</option>";
                    }
                    ?>
                </select>
            </fieldset>
        </div>

        <div class="form-item">
            <label class="nametype" for="phone">
                <h3> PHONE NUMBER: </h3>
            </label>
            <input type="number" name="phone_number" id="phone" placeholder="07X-XXX-XXXXX" pattern="[0-9]{3}-[0-9]{3}-[0-9]{5}" value="<?= $phone_number ?>">
            <!--username input box -->
            <br>
        </div>
        <div class="form-item">
            <label class="nametype" for="passport">
                <h3> PASSPORT NUMBER: </h3>
            </label>
            <input type="number" name="passport_number" id="passport" placeholder="079842738" pattern="[0-9]{9}" minlength="9" , maxlength="9" value="<?= $passport_number ?>">

            <br>
        </div>
        <div class="form-item">
            <label class="nametype" for="pwd">
                <h3>PASSWORD: </h3>
            </label>
            <input type="password" name="password" id="pwd" placeholder="password" value="<?= $password ?>">

        </div>
        <div style="text-align:center">
            <button class="btn btn-dark" id="book-button" value="save_flight_information" type="submit">
                <p>BOOK</p>
            </button>
        </div>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script type="text/javascript">
        $("input[name$='trip_type']").click(function() {
            var trip_type = $(this).val();
            if (trip_type === "ONE WAY") {
                $("#return_date").hide();
            } else {
                $("#return_date").show();
            }
        });
    </script>
</body>

</html>
