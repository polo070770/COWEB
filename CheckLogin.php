<?php

include("Connection.php"); 

if (isset($_POST['submit'])) {

	$link=connect();

	$tbl_name="user";

	// username and password sent from form
	$myemail=isset($_POST['myemail']) ? $_POST['myemail'] : 'nomail';
	$mypassword=isset($_POST['mypassword']) ? $_POST['mypassword'] : 'nopass';

	// To protect MySQL injection (more detail about MySQL injection)
	$myemail = stripslashes($myemail);
	$mypassword = stripslashes($mypassword);
	$myemail = mysql_real_escape_string($myemail);
	$mypassword = mysql_real_escape_string($mypassword);

	$sql="SELECT * FROM $tbl_name WHERE email='$myemail' and contrasenya='$mypassword'";
	$result=mysql_query($sql,$link);

	// Mysql_num_row is counting table row
	$count=mysql_num_rows($result);

	// If result matched $myemail and $mypassword, table row must be 1 row
	if($count==1){
		header("location:reservas.php");
	}
	else {	
		echo "Wrong Username or Password";
	}
	mysql_close($link); // Closing Connection
}
?>