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
              Alquila alojamientos de anfitriones en diferentes paÃ­ses.
              Disfruta como si estÃ©s en tu propia casa, vayas donde vayas.
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
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script type="text/javascript" src="scripts/javascript/CheckProfile.js"></script>
    <script type="text/javascript" src="scripts/javascript/AutoComplete.js"></script>
    <script type="text/javascript" src="scripts/javascript/FillValueProfile.js"></script>
    <script>
        $(document).ready(function () {

            completeProfile("<?php echo $_SESSION['login_user'] ?>");

            $("form").submit(function () {

                return validateProfile("<?php echo $_SESSION['login_user'] ?>");

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
            <div class="title">Edit your profile</div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="profile">
                <form class="user_profile" name="form_profile" method="post"
                    >
                    <div>
                        <label>Name:</label>
                        <input name="name" type='text' value="">

                        <div id="name_err"></div>
                    </div>

                    <div>
                        <label>First surname:</label>
                        <input name="firstsurname" type='text' value="">

                        <div id="fsurname_err"></div>
                    </div>

                    <div>
                        <label>Second surname:</label>
                        <input name="secondsurname" type='text' value="">

                        <div id="ssurname_err"></div>
                    </div>

                    <div>
                        <input name="gender_f" type="radio" value="female">

                        <p>Female</p>
                        <input name="gender_m" type="radio" value="male">

                        <p>Male</p>

                        <div id="gender_err"></div>
                    </div>

                    <div>
                        <label>Country:</label>
                        <input name="country" type="text" value=""
                               onkeyup="showHint(this.value)">

                        <div id="txtHint_country"></div>
                    </div>

                    <div>
                        <label>City:</label>
                        <input name="city" type="text" value=""
                               onkeyup="showHint(this.value)">

                        <div id="txtHint_city"></div>
                    </div>

                    <div>
                        <label>Email:</label>
                        <input name="email" type='text' value="">

                        <div id="email_err"></div>
                    </div>

                    <div>
                        <input name='submit' type='submit' value='Save it'>

                        <div id="log_submit"></div>
                    </div>

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