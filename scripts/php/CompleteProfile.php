<?php

include ("Connection.php");

// database connect
$link = connect();

// table name
$tbl_name = "user";

// username and password sent from form
$email = isset($_GET ['email']) ? $_GET ['email'] : 'nomail';

// To protect MySQL injection (more detail about MySQL injection)
$email = stripslashes($email);
$email = mysql_real_escape_string($email);

// SQL query
$sql = "SELECT * FROM $tbl_name WHERE email='$email'";
$result = mysql_query($sql, $link);

$jsondata = array();

while ($fila = mysql_fetch_assoc($result)) {
    $jsondata['email'] = $fila['email'];
    $jsondata['name'] = $fila['nombre'];
    $jsondata['first_surname'] = $fila['apellido_1'];
    $jsondata['second_surname'] = $fila['apellido_2'];
    $jsondata['gender'] = $fila['genero'];
    $jsondata['country'] = $fila['pais'];
    $jsondata['city'] = $fila['ciudad'];
}

mysql_close($link); // Closing Connection

header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata, JSON_FORCE_OBJECT);

exit();
?>

