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
              content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="css/index.css">
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
                    <div id="title">Edit your reservation's</div>
                </div>
            </div>


            <div class="row">
                <div class="col-12">
                    <?php
                    // tomamos los datos del archivo conexion.php
                    $link = connect();
                    // se envia la consulta
                    $email = $_SESSION ['login_user'];
                    $query = "SELECT DISTINCT
                                p.id_propiedad, p.capacidad, p.dormitorios, p.banyos, p.precio 
                            FROM propiedad as p, reserva_propiedad as r, user as u 
                            WHERE '$email' = r.fk_email AND r.fk_propiedad = p.id_propiedad;";
                    $result = mysql_query($query, $link);
                    // se despliega el resultado
                    echo "<table class='query'>";
                    echo "<tr>";
                    echo "<th>id_propiedad</th>";
                    echo "<th>capacidad</th>";
                    echo "<th>Dormitorios</th>";
                    echo "<th>Banyos</th>";
                    echo "<th>Precio</th>";
                    echo "</tr>";
                    while ($row = mysql_fetch_row($result)) {
                        echo "<tr>";
                        echo "<td>$row[0]</td>";
                        echo "<td>$row[1]</td>";
                        echo "<td>$row[2]</td>";
                        echo "<td>$row[3]</td>";
                        echo "<td>$row[4]</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    ?> 
                </div>
            </div>

            <div class="push"></div>
        </div>

        <div class="footer">
            <p>© University of Barcelona.</p>
        </div>
    </body>
</html>