<?php

include("Connection.php");

// username and password sent from form
$username = isset($_POST ["username"]) ? $_POST ["username"] : "nousername";
$password = isset($_POST ["password"]) ? $_POST ["password"] : "nopassword";
$gender = isset($_POST ["gender"]) ? $_POST ["gender"] : "nogender";

// database connect
$link = connect();

// table of users
$tbl_name = "user";

// To protect MySQL injection
$username = stripslashes($username);
$password = stripslashes($password);
$gender = stripslashes($gender);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);
$gender = mysql_real_escape_string($gender);

// MySQL query
$sql = "INSERT INTO $tbl_name (email, contrasenya, genero) "
    . "VALUES ('$username', '$password', '$gender')";
$result = mysql_query($sql, $link);

if ($result) {
    echo 1;
} else {
    echo 0;
}

mysql_close($link); // Closing Connection