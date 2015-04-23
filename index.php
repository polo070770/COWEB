<?php
include 'scripts/php/Session.php';
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
          content="width=device-width, initial-scale=1, maximum-scale=1,ç¡
              user-scalable=no">

    <meta charset="utf-8"/>

    <link rel="stylesheet" type="text/css" href="css/index.css">
</head>

<body>
<div class="container">
    <?php
    if (isset($_SESSION ['login_user'])) {
        echo "<nav>";
        echo "<ul>";
        echo "<li><a href='index.php'>Home</a></li>";
        echo "<li><a href='profile.php'>Profile</a></li>";
        echo "<li><a href='reservations.php'>Reservations</a></li>";
        echo "<li><a href='help.php'>Help</a></li>";
        echo "<li><a href='logout.php'>Log out</a></li>";
        echo "</ul>";
        echo "</nav>";
    } else {
        echo "<nav>";
        echo "<ul>";
        echo "<li><a href='index.php'>Home</a></li>";
        echo "<li><a href='register.php'>Register</a></li>";
        echo "<li><a href='login.php'>Log in</a></li>";
        echo "<li><a href='help.php'>Help</a></li>";
        echo "</ul>";
        echo "</nav>";
    }
    ?>

    <div class="row">
        <div class="col-12">
            <div class="title">BED AND BREAKFAST</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="subtitle">Enjoy like if you were in your own house,
                wherever you are!
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="search">
                <form method="get" action="http://www.google.com/search">
                    <input type="text" name="q" placeholder="Search it in Google..."/>
                    <input type="submit" value="Buscar"/>
                </form>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="col-4">
                    <img class="img-responsive" src="images/room1.jpg">
                </div>

                <div class="col-4">
                    <img class="img-responsive" src="images/room2.jpg">
                </div>

                <div class="col-4">
                    <img class="img-responsive" src="images/room3.jpg">
                </div>
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