<?php

include("Connection.php");

// database connect
$link = connect();

// username and password sent from form
$email = isset($_GET ['email']) ? $_GET ['email'] : 'nomail';

$table_name = isset($_GET['table_id']) ? $_GET['table_id'] : 'no_tableid';

if ($table_name == "PROPERTIES") {
    // table name
    $tbl_name = "reserva_propiedad";
} else if ($table_name == "ROOMS") {
    // table name
    $tbl_name = "reserva_habitacion";
}

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$email = mysql_real_escape_string($email);

// SQL query
$sql = "SELECT * FROM $tbl_name WHERE fk_email='$email'";
$result = mysql_query($sql, $link);

$i = 0;
$jsondata = array();

while ($row = mysql_fetch_assoc($result)) {
    $json_row = array();
    $json_row['ubicacion'] = $row['ubicacion'];
    $json_row['anfitrion'] = $row['anfitrion'];
    $json_row['fecha_ini'] = $row['fecha_ini'];
    $json_row['fecha_fin'] = $row['fecha_fin'];
    $json_row['descripcion'] = $row['fk_propiedad'];
    $jsondata[$i] = $json_row;
    $i++;
}

$jsondata['size'] = $i;

mysql_close($link); // Closing Connection

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_FORCE_OBJECT);

exit();
?>