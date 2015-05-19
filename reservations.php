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
    <script type="text/javascript" src="scripts/javascript/FillDescReservations.js"></script>
    <script>
        $(function () {
            datePicker_widget();
            dialog_widget();
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

                showDescReservation(row_elmnts, "<?php echo $_SESSION['login_user'] ?>");
            });

        });
    </script>
</head>

<body>
<div id="booking-desc" title="Booking">
    <div class="row">
        <div class="col-6">
            <div id="reservation-details">

            </div>
        </div>

        <div class="col-6">
            <div id="date">
                <label for="from">From</label>
                <input type="text" id="from" name="from">
                <br>
                <label for="to">to</label>
                <input type="text" id="to" name="to">
            </div>
        </div>
    </div>
</div>

<div id="dialog-message" title="Booking complete">
    <p>Your reservation was successfully booked.</p>
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
        <div class="col-10">
            <div class="title">Your reservation's</div>
        </div>

        <div class="col-2">
            <div class="user-name">Hello <?php echo $_SESSION ['login_user']; ?></div>
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