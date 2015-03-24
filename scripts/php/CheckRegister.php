<?php

$error_register = "";

if (isset($_POST ['form_submit'])) {
    if (empty($_POST ["form_email"]) || empty($_POST ["form_pass"]) || empty($_POST ["form_gender"])) {
        $error_register = "Gender, email and password cannot be empty.";
    } else {
        include ("Connection.php");

        $link = connect();

        // table of users
        $tbl_name = "user";

        // username and password sent from form
        $email = isset($_POST ["form_email"]) ? $_POST ["form_email"] : "nomail";
        $password = isset($_POST ["form_pass"]) ? $_POST ["form_pass"] : "nopass";
        $gender = isset($_POST ["form_gender"]) ? $_POST ["form_gender"] : "nogender";

        // to protect mysql injection
        $email = stripslashes($email);
        $password = stripslashes($password);
        $gender = stripslashes($gender);
        $email = mysql_real_escape_string($email);
        $password = mysql_real_escape_string($password);
        $gender = mysql_real_escape_string($gender);

        // mysql query
        $sql = "INSERT INTO $tbl_name (email, contrasenya, genero) "
                . "VALUES ('$email', '$password', '$gender')";
        $result = mysql_query($sql, $link) or die(mysql_error());

        if ($result) {
            header("location: ../../login.php");
        } else {
            $error_register = "You registration isn'nt completed, try again.";
        }

        mysql_close($link); // Closing Connection
    }
}
?>