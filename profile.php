<?php
	include('Session.php');
?>

<html>
	<head>
		<title>Profile</title>
	</head>
		<body>
		<div id="profile">
			<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
			<b id="logout"><a href="logout.php">Log Out</a></b>
		</div>
	</body>
</html>