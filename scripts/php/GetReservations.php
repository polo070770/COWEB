<?php

include("Connection.php");

// database connect
$link = connect();

// username and password sent from form
$email = isset($_GET ['email']) ? $_GET ['email'] : 'nomail';
$table_name = isset($_GET['table_id']) ? $_GET['table_id'] : 'no_tableid';

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$email = mysql_real_escape_string($email);

// SQL query
if ($table_name == "PROPERTIES") {

    $sql = "select t1.ubicacion, t1.anfitrion, t2.fecha_ini, t2.fecha_fin
          FROM propiedad as t1 INNER JOIN reserva_propiedad as t2
            ON t2.fk_email = '$email' AND t2.fk_propiedad = t1.id_propiedad;";
} else if ($table_name == "ROOMS") {

    $sql = "select t1.ubicacion, t1.anfitrion, t2.fecha_ini, t2.fecha_fin
          FROM habitacion as t1 INNER JOIN reserva_habitacion as t2
            ON t2.fk_email = '$email' AND t2.fk_habitacion = t1.id_habitacion;";
}

$result = mysql_query($sql, $link);

$i = 0;
$jsondata = array();

while ($row = mysql_fetch_assoc($result)) {
    $json_row = array();
    $json_row['ubicacion'] = $row['ubicacion'];
    $json_row['anfitrion'] = $row['anfitrion'];
    $json_row['fecha_ini'] = $row['fecha_ini'];
    $json_row['fecha_fin'] = $row['fecha_fin'];
    $jsondata[$i] = $json_row;
    $i++;
}

$jsondata['size'] = $i;

mysql_close($link); // Closing Connection

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_FORCE_OBJECT);

exit();
?>