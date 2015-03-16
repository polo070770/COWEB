<?php
	include('CheckLogin.php'); // Includes Login Script

	if(isset($_SESSION['login_user'])){
		header("location: profile.php");
	}
?>
<html>
	<head>
		<title>
			Bed & Breakfast
		</title>

		<meta name="description" content="
            Alquila alojamientos de anfitriones en diferentes países.
            Disfruta como si estés en tu propia casa, vayas donde vayas.
        ">
        
        <meta name="keywords" content="
            Alquiler, Apartamentos, Vacaciones, Casas, Habitaciones
        ">

        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

        <meta charset="utf-8" />

        <link rel="stylesheet" type="text/css" href="css/index.css">
	</head>

	<body>
		<div class="container">
			<nav>
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="register.html">Register</a></li>
					<li><a href="login.php">Log in</a></li>
					<li><a href="help.html">Help</a></li>
				</ul>
			</nav>

			<div class="row">
				<div class="col-12">
					<div id="title">
						BED AND BREAKFAST
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div id="subtitle">
						Enjoy like if you were in your own house, wherever you are!
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-12">
					<div class="login">
						<form action="" method="post">
							<input class="login-input" name="myemail" type="email" placeholder="Email">
							<input class="login-input" name="mypassword" type="password" placeholder="Password">
							<input name="submit" type="submit" value="Log in">
						</form>
						</br>
						<span><?php echo $error; ?></span>
					</div>
				</div>
			</div>
		</div>

		<div class="footer">
			<p>© University of Barcelona.</p>	
		</div>
	</body>
</html>