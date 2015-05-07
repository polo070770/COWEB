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
    <script type="text/javascript" src="scripts/javascript/CheckRegister.js"></script>

    <script>
        $(document).ready(function () {

            $("#email").focus();
            $("#submit").click(function () {
                return validateRegister($("#email"), $("#password"));
            });
        });
    </script>
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
            <form class="application-form">
                <div class="radio_buttons">
                    <input name="gender" id="gender_f" type="radio" value="female">
                    <label>Female</label>
                    <input name="gender" id="gender_m" type="radio" value="male">
                    <label>Male</label>
                </div>

                <div class="inputs">
                    <input id="email" type="email" placeholder="Email">
                    <input id="password" type="password" placeholder="Password">
                </div>

                <div class="button">
                    <input id="submit" type="submit" value="Create Account">
                </div>
            </form>
            <div id="form-result"></div>
        </div>
    </div>

    <div class="push"></div>
</div>

<div class="footer">
    <p>© University of Barcelona.</p>
</div>
</body>
</html>