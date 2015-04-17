<?php
include ("Connection.php");

$link = connect ();

session_start (); // Starting Session

if (! empty ( $_SESSION ['login_user'] )) {
	// Storing Session
	$user_check = $_SESSION ['login_user'];
	
	// SQL Query To Fetch Complete Information Of User
	$query = mysql_query ( "select email from user where email='$user_check'", $link );
	$row = mysql_fetch_assoc ( $query );
	$login_session = $row ['email'];
	
	if (! isset ( $login_session )) {
		mysql_close ( $link ); // Closing Connection
		header ( 'location: ../../index.php' ); // Redirecting To Home Page
	}
}

?>