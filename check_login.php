<?php
	function check_login()
	{
		$host="localhost"; // Host name
		$username_db="root"; // Mysql username
		$password_db=""; // Mysql password
		$db_name="bed_and_breakfast"; // Database name
		$tbl_name="user"; // Table name

		// Connect to server and select databse.
		mysql_connect("$host", "$username_db", "$password_db")or die("cannot connect");
		mysql_select_db("$db_name")or die("cannot select DB");

		// username and password sent from form
		$myemail=isset($_POST['myemail']) ? $_POST['myemail'] : 'nomail';
		$mypassword=isset($_POST['mypassword']) ? $_POST['mypassword'] : 'nopass';

		// To protect MySQL injection (more detail about MySQL injection)
		$myemail = stripslashes($myemail);
		$mypassword = stripslashes($mypassword);
		$myemail = mysql_real_escape_string($myemail);
		$mypassword = mysql_real_escape_string($mypassword);

		$sql="SELECT * FROM $tbl_name WHERE email='$myemail' and contrasenya='$mypassword'";
		$result=mysql_query($sql);

		// Mysql_num_row is counting table row
		$count=mysql_num_rows($result);

		// If result matched $myemail and $mypassword, table row must be 1 row
		if($count==1){
			// Register $myemail, $mypassword and redirect to file "login_success.php"
			session_register("myemail");
			session_register("mypassword");
			header("location:login_success.php");
		}
		else {
			echo "Wrong Username or Password";
		}
	}
?>