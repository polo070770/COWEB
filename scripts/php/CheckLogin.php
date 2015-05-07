<?php

include("Connection.php");

// username and password sent from form
$email = isset($_POST ["email"]) ? $_POST ["email"] : "noemail";
$password = isset($_POST ["password"]) ? $_POST ["password"] : "nopassword";

// database connect
$link = connect();

// table name
$tbl_name = "user";

// To protect MySQL injection
$email = stripslashes($email);
$password = stripslashes($password);
$email = mysql_real_escape_string($email);
$password = mysql_real_escape_string($password);

// SQL query
$sql = "SELECT * FROM $tbl_name WHERE email='$email' and contrasenya='$password'";
$result = mysql_query($sql, $link);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $email and $password, table row must be 1 row
if ($count == 1) {
    session_start();
    $_SESSION['login_user'] = $email; // Initializing Session
    echo 1;
} else {
    echo 0;
}

mysql_close($link); // Closing Connection