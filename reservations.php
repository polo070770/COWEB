<?php
include 'scripts/php/Session.php';

if (!isset($_SESSION ['login_user'])) {
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Bed & Breakfast</title>

    <meta name="description"
          content="
              Alquila alojamientos de anfitriones en diferentes países.
              Disfruta como si estés en tu propia casa, vayas donde vayas.
              ">

    <meta name="keywords"
          content="
              Alquiler, Apartamentos, Vacaciones, Casas, Habitaciones
              ">

    <meta name="viewport"
          content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"/>

    <meta charset="utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">

    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script type="text/javascript" src="scripts/javascript/FillReservations.js"></script>
    <script type="text/javascript" src="scripts/javascript/FillNewReservations.js"></script>
    <script type="text/javascript" src="scripts/javascript/Booking.js"></script>
    <script>
        $(function () {
            preparateBookingDialog();
        });

        $(document).ready(function () {

            completeTable("<?php echo $_SESSION['login_user'] ?>", "PROPERTIES");

            $('#properties').on("click", function () {
                completeTable("<?php echo $_SESSION['login_user'] ?>", "PROPERTIES");
            });

            $('#rooms').on("click", function () {
                completeTable("<?php echo $_SESSION['login_user'] ?>", "ROOMS");
            });

            $("#reservations").on("click", function () {
                fillNewReservations();
            });

            $("tbody").on("click", "tr.clickable-row", function () {
                var row_elmnts = [];
                $(this).find("td").each(function () {
                    row_elmnts.push($(this).text());
                });

                showDescReserveration(row_elmnts);
            });

        });
    </script>
</head>

<body>
<div id="booking-form" title="booking">
    <p class="validateTips">All form fields are required.</p>

    <form>
        <fieldset>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="Jane Smith" class="text ui-widget-content ui-corner-all">
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="jane@smith.com"
                   class="text ui-widget-content ui-corner-all">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" value="xxxxxxx"
                   class="text ui-widget-content ui-corner-all">

            <!-- Allow form submission with keyboard without duplicating the dialog button -->
            <input type="submit" tabindex="-1" style="position:absolute; top:-1000px">
        </fieldset>
    </form>
</div>

<div class="container">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="reservations.php">Reservations</a></li>
            <li><a href="help.php">Help</a></li>
            <li><a href="logout.php">Log out</a></li>
        </ul>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="title">Your reservation's</div>
        </div>
    </div>

    <div class="row">
        <div class="reservations">
            <div class="col-2">
                <ul>
                    <li>
                        <div id="properties">Booked properties</div>
                    </li>

                    <li>
                        <div id="rooms">Booked rooms</div>
                    </li>

                    <li>
                        <div id="reservations">Search for new reservations</div>
                    </li>
                </ul>
            </div>

            <div class="col-10">
                <table class="reservations-table">
                    <thead>
                    <tr id="reservations_header_1"></tr>

                    <tr id="reservations_header_2"></tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="push"></div>
</div>

<div class="footer">
    <p>© University of Barcelona.</p>
</div>
</body>
</html>