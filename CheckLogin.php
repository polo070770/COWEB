<?php

include("Connection.php"); 

session_start(); // Starting Session
$error=''; // Variable To Store Error Message

if (isset($_POST['submit'])) {

	if (empty($_POST['myemail']) || empty($_POST['mypassword'])){
		$error="Email and password cannot be empty.";
	}else{
		$link=connect();

		$tbl_name="user";

		// username and password sent from form
		$email=isset($_POST['myemail']) ? $_POST['myemail'] : 'nomail';
		$password=isset($_POST['mypassword']) ? $_POST['mypassword'] : 'nopass';

		// To protect MySQL injection (more detail about MySQL injection)
		$email = stripslashes($email);
		$password = stripslashes($password);
		$email = mysql_real_escape_string($email);
		$password = mysql_real_escape_string($password);

		//SQL query
		$sql="SELECT * FROM $tbl_name WHERE email='$email' and contrasenya='$password'";
		$result=mysql_query($sql,$link);

		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);

		// If result matched $email and $password, table row must be 1 row
		if($count==1){
			$_SESSION['login_user']=$email; // Initializing Session
			header("location: profile.php"); // Redirecting To Other Page
		} else {	
			$error="Wrong email or password.";
		}
		mysql_close($link); // Closing Connection
	}
}
?>