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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

    <style>
        #div1 {
            width: 350px;
            height: 70px;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }

        #div2 {
            width: 350px;
            height: 70px;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }

        #div3 {
            width: 350px;
            height: 70px;
            padding: 10px;
            border: 1px solid #aaaaaa;
        }
    </style>

    <script>
        //Geolocation
        function getLocation() {
            navigator.geolocation.getCurrentPosition(showPosition, showError);
        }

        function showPosition(position) {
            var latlon = position.coords.latitude + "," + position.coords.longitude;

            var img_url = "http://maps.googleapis.com/maps/api/staticmap?center="
                + latlon + "&zoom=14&size=400x300&sensor=false";
            document.getElementById("mapholder").innerHTML = "<img src='" + img_url + "'>";
        }

        function showError(error) {
            switch (error.code) {
                case error.PERMISSION_DENIED:
                    x.innerHTML = "User denied the request for Geolocation."
                    break;
                case error.POSITION_UNAVAILABLE:
                    x.innerHTML = "Location information is unavailable."
                    break;
                case error.TIMEOUT:
                    x.innerHTML = "The request to get user location timed out."
                    break;
                case error.UNKNOWN_ERROR:
                    x.innerHTML = "An unknown error occurred."
                    break;
            }
        }
    </script>

    <script>

        // DRAG AND DROP
        function allowDrop(ev) {
            ev.preventDefault();
        }

        function drag(ev) {
            ev.dataTransfer.setData("text", ev.target.id);
        }

        function drop(ev) {
            ev.preventDefault();
            var data = ev.dataTransfer.getData("text");
            ev.target.appendChild(document.getElementById(data));
        }

        // CANVAS
        $(document).ready(function () {
            $("#button1").on("click", function () {

                var canvas = document.getElementById('canvas1');
                var context = canvas.getContext('2d');
                var imageObj = new Image();

                imageObj.onload = function () {
                    context.drawImage(imageObj, 0, 0);
                };
                imageObj.src = 'images/room1.jpg';

            });

            $("#button2").on("click", function () {
                var canvas = document.getElementById('canvas2');
                var context = canvas.getContext('2d');
                var imageObj = new Image();

                imageObj.onload = function () {
                    context.drawImage(imageObj, 0, 0);
                };
                imageObj.src = 'images/room2.jpg';
            });

            $("#button3").on("click", function () {
                var canvas = document.getElementById('canvas3');
                var context = canvas.getContext('2d');
                var imageObj = new Image();

                imageObj.onload = function () {
                    context.drawImage(imageObj, 0, 0);
                };
                imageObj.src = 'images/room3.jpg';
            });
        });

    </script>
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

        echo '<div class="row">';
        echo '<div class="col-10">';
        echo '<div class="title">BED AND BREAKFAST</div>';
        echo '</div>';

        echo '<div class="col-2">';
        echo '<div class="user-name">Hello ';
        echo $_SESSION ['login_user'];
        echo '</div>';
        echo '</div>';
        echo '</div>';

    } else {
        echo "<nav>";
        echo "<ul>";
        echo "<li><a href='index.php'>Home</a></li>";
        echo "<li><a href='register.php'>Register</a></li>";
        echo "<li><a href='login.php'>Log in</a></li>";
        echo "<li><a href='help.php'>Help</a></li>";
        echo "</ul>";
        echo "</nav>";

        echo '<div class="row">';
        echo '<div class="col-12">';
        echo '<div class="title-logout">BED AND BREAKFAST</div>';
        echo '</div>';
        echo '</div>';
    }
    ?>



    <div class="row">
        <div class="col-12">
            <div class="subtitle">Enjoy like if you were in your own house,
                wherever you are!
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">
            <div class="application-form">
                <form method="get" action="http://www.google.com/search">
                    <input type="text" name="q" placeholder="Search it in Google..."/>
                    <input type="submit" value="Buscar"/>
                </form>
            </div>
        </div>

        <div class="col-6">
            <button onclick="getLocation()">Try It</button>
            <div id="mapholder">

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="col-3">
                    <!--<img class="img-responsive" src="images/room1.jpg">-->
                    <canvas id="canvas1" class="img-responsive"
                            style="border:1px solid #d3d3d3;" draggable="true" ondragstart="drag(event)">
                </div>

                <div class="col-3">
                    <!--<img class="img-responsive" src="images/room2.jpg">-->
                    <canvas id="canvas2" class="img-responsive"
                            style="border:1px solid #d3d3d3;" draggable="true" ondragstart="drag(event)">
                </div>

                <div class="col-3">
                    <!--<img class="img-responsive" src="images/room3.jpg">-->
                    <canvas id="canvas3" class="img-responsive"
                            style="border:1px solid #d3d3d3;" draggable="true" ondragstart="drag(event)">
                </div>

                <div class="col-3">
                    <button id="button1">Load img 1</button>
                    </br>
                    <button id="button2">Load img 2</button>
                    </br>
                    <button id="button3">Load img 3</button>
                    </br>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="box">
                <div class="col-3">
                    <div id="div1" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                </div>

                <div class="col-3">
                    <div id="div2" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                </div>

                <div class="col-3">
                    <div id="div3" ondrop="drop(event)" ondragover="allowDrop(event)"></div>
                </div>

                <div class="col-3">
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-6">

            <video width="400" controls>
                <source src="http://mirrorblender.top-ix.org/peach/bigbuckbunny_movies/big_buck_bunny_1080p_stereo.ogg"
                        type="video/ogg">
                Your browser does not support HTML5 video.
            </video>

            <p>
                Video courtesy of
                <a href="http://www.bigbuckbunny.org/" target="_blank">Big Buck Bunny</a>.
            </p>

        </div>

        <div class="col-6">

            <audio controls>
                <source src="http://www.mathville.com/demoRc1/data/effects/neigh.mp3" type="audio/mpeg">
                Your browser does not support the audio element.
            </audio>

        </div>
    </div>

    <div class="push"></div>
</div>

<div class="footer">
    <p>© University of Barcelona.</p>
</div>
</body>
</html>