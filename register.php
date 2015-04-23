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
</head>

<body>
<div class="container">
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="register.php">Register</a></li>
            <li><a href="login.php">Log in</a></li>
            <li><a href="help.php">Help</a></li>
        </ul>
    </nav>

    <div class="row">
        <div class="col-12">
            <div class="title">Register in</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="application-form">
                <form action="" method="post">
                    <div class="radio_buttons">
                        <input name="form_gender" type="radio" value="female">
                        <label>Female</label>
                        <input name="form_gender" type="radio" value="male">
                        <label>Male</label>
                    </div>

                    <div class="inputs">
                        <input name="form_email" type="email" placeholder="Email">
                        <input name="form_pass" type="password" placeholder="Password">
                    </div>

                    <div class="button">
                        <input name="form_submit" type="submit" value="Create Account">
                    </div>
                    <?php
                    include 'scripts/php/CheckRegister.php';
                    echo '<p style="color:red">';
                    echo $error_register;
                    echo '</p>';
                    ?>
                </form>
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