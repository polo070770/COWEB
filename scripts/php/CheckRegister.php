<?php
include ("Connection.php");

if (isset ( $_POST ['submit'] )) {
	
	$link = connect ();
	
	// table of users
	$tbl_name = "user";
	
	// username and password sent from form
	$myemail = isset ( $_POST ['myemail'] ) ? $_POST ['myemail'] : 'nomail';
	$mypassword = isset ( $_POST ['mypassword'] ) ? $_POST ['mypassword'] : 'nopass';
	
	// To protect MySQL injection
	$myemail = stripslashes ( $myemail );
	$mypassword = stripslashes ( $mypassword );
	$myemail = mysql_real_escape_string ( $myemail );
	$mypassword = mysql_real_escape_string ( $mypassword );
	
	// MySql query
	$sql = "INSERT INTO $tbl_name (email, contrasenya) VALUES ('$myemail', '$mypassword')";
	$result = mysql_query ( $sql, $link ) or die ( mysql_error () );
	
	if ($result) {
		header ( "location: ../../login.html" );
	} else {
		echo "You registration isn'nt completed...";
	}
	
	mysql_close ( $link ); // Closing Connection
}
?>