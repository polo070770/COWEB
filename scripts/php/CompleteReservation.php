<?php


include("Connection.php");

// get variables
$email = isset($_GET['email']) ? $_GET ['email'] : "nomail";
$type = isset($_GET ['type']) ? $_GET ['type'] : 'notype';
$location = isset($_GET['location']) ? $_GET['location'] : 'nolocation';
$guest = isset($_GET['guest']) ? $_GET['guest'] : 'noguest';
$data_ini = isset($_GET['date_ini']) ? $_GET['date_ini'] : "nodataini";
$data_end = isset($_GET['date_end']) ? $_GET['date_end'] : "nodataend";

// database connect
$link = connect();

$sql = "";
if ($type == "Room") {

    $sql = "INSERT INTO reserva_habitacion (fk_email, fk_habitacion, fecha_ini, fecha_fin)
VALUES (
        '$email',
        (select id_habitacion from habitacion where ubicacion='$location' and anfitrion='$guest'),
        '$data_ini',
        '$data_end'
        )";

} else if ($type == "Property") {

    $sql = "INSERT INTO reserva_propiedad (fk_email, fk_propiedad, fecha_ini, fecha_fin)
VALUES (
        '$email',
        (select id_propiedad from propiedad where ubicacion='$location' and anfitrion='$guest'),
        '$data_ini',
        '$data_end'
        )";
}

$result = mysql_query($sql, $link);

if ($result) {
    echo 1;
} else {
    echo 0;
}

mysql_close($link); // Closing Connection