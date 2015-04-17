<?php

// var to show error
$error_login = "";

if (isset($_POST ['form_submit'])) {

    if (empty($_POST ['form_email']) || empty($_POST ['form_password'])) {
        $error_login = "Email and password cannot be empty.";
    } else {
        include ("Connection.php");

        // database connect
        $link = connect();

        // table name
        $tbl_name = "user";

        // username and password sent from form
        $email = isset($_POST ['form_email']) ? $_POST ['form_email'] : 'nomail';
        $password = isset($_POST ['form_password']) ? $_POST ['form_password'] : 'nopass';

        // To protect MySQL injection (more detail about MySQL injection)
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
            $_SESSION ['login_user'] = $email; // Initializing Session
            header("location: ../../profile.php"); // Redirecting To Other Page
        } else {
            $error_login = "Wrong email or password.";
        }
        mysql_close($link); // Closing Connection
    }
}
?>