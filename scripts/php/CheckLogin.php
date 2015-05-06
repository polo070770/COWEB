<?php

include("Connection.php");

// username and password sent from form
$username = isset($_POST ['username']) ? $_POST ['username'] : 'nousername';
$password = isset($_POST ['password']) ? $_POST ['password'] : 'nopassword';

// database connect
$link = connect();

// table name
$tbl_name = "user";

// To protect MySQL injection (more detail about MySQL injection)
$username = stripslashes($username);
$password = stripslashes($password);
$username = mysql_real_escape_string($username);
$password = mysql_real_escape_string($password);

// SQL query
$sql = "SELECT * FROM $tbl_name WHERE email='$username' and contrasenya='$password'";
$result = mysql_query($sql, $link);

// Mysql_num_row is counting table row
$count = mysql_num_rows($result);

// If result matched $email and $password, table row must be 1 row
if ($count == 1) {
    session_start();
    $_SESSION['login_user'] = $username; // Initializing Session
    echo 1;
} else {
    echo 0;
}

mysql_close($link); // Closing Connection