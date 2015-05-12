<?php

include("Connection.php");

// database connect
$link = connect();

$email_id = isset($_POST ['email_id']) ? $_POST ['email_id'] : 'noemail_id';
$name = isset($_POST ['name']) ? $_POST ['name'] : 'noname';
$firstsurname = isset($_POST ['firstsurname']) ? $_POST ['firstsurname'] : 'nofirstsurname';
$secondsurname = isset($_POST ['secondsurname']) ? $_POST ['secondsurname'] : 'nosecondsurname';
$gender = isset($_POST ['gender']) ? $_POST ['gender'] : 'nogender';
$email = isset($_POST ['email']) ? $_POST ['email'] : 'noemail';
$country = isset($_POST ['country']) ? $_POST ['country'] : 'nocountry';

// To protect MySQL injection (more detail about MySQL injection)
$email_id = stripslashes($email_id);
$email_id = mysql_real_escape_string($email_id);
$name = stripslashes($name);
$name = mysql_real_escape_string($name);
$firstsurname = stripslashes($firstsurname);
$firstsurname = mysql_real_escape_string($firstsurname);
$secondsurname = stripslashes($secondsurname);
$secondsurname = mysql_real_escape_string($secondsurname);
$gender = stripslashes($gender);
$gender = mysql_real_escape_string($gender);
$email = stripslashes($email);
$email = mysql_real_escape_string($email);
$country = stripslashes($country);
$country = mysql_real_escape_string($country);

$sql = "UPDATE user SET email='turpis@euismod.ca', nombre='Shafira', apellido_1='Merritt', apellido_2='Rogers',
          genero='female', pais='Spain' WHERE email='turpis@euismod.ca'";

$result = mysql_query($sql, $link);

if ($result) {
    echo 1;
} else {
    #echo "Error updating record: " . $conn->error;
    echo 0;
}

exit();