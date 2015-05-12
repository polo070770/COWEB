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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <script type="text/javascript" src="scripts/javascript/CheckProfile.js"></script>
    <script type="text/javascript" src="scripts/javascript/AutoComplete.js"></script>
    <script type="text/javascript" src="scripts/javascript/FillValueProfile.js"></script>
    <script type="text/javascript" src="scripts/javascript/GetCountry.js"></script>
    <script>
        $(document).ready(function () {

            completeProfile("<?php echo $_SESSION['login_user'] ?>");

            $("#submit_form").click(function () {
                validateProfile("<?php echo $_SESSION['login_user']?>");
            })

            $("#country_list").keyup(function (e) {
                if (e.which >= 65 && e.which <= 90) {
                    return getCountry(this.value);
                }
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
                <form class="user_profile" name="form_profile">
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
                        <label for="country_list">Country:</label>
                        <input id="country_list" name="country" type="text" value=""">
                    </div>

                    <div>
                        <label>Email:</label>
                        <input name="email" type='text' value="">

                        <div id="email_err"></div>
                    </div>

                    <div>
                        <input id="submit_form" name='submit' type='button' value='Save it'>

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