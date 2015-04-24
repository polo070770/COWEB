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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/javascript/FillReservations.js"></script>
    <script>
        $(document).ready(function () {

            completeTable("<?php echo $_SESSION['login_user'] ?>", "PROPERTIES");

            $('#properties').on("click", function () {
                completeTable("<?php echo $_SESSION['login_user'] ?>", "PROPERTIES");
            });

            $('#rooms').on("click", function () {
                completeTable("<?php echo $_SESSION['login_user'] ?>", "ROOMS");
            });
        });
    </script>
</head>

<body>
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
                </ul>
            </div>

            <div class="col-10">

                <table class="reservations-table">


                    <thead>
                    <tr>
                        <th colspan="4">
                            <div id="reservations_header_name">PROPERTIES</div>
                        </th>
                    </tr>

                    <tr>
                        <th>Location</th>
                        <th>Guest</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
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