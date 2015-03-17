<?php
include 'scripts/php/Session.php';

if (! isset ( $_SESSION ['login_user'] )) {
	header ( "location: index.php" );
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Bed & Breakfast</title>

<meta name="description"
	content="
            Alquila alojamientos de anfitriones en diferentes paÃ­ses.
            Disfruta como si estÃ©s en tu propia casa, vayas donde vayas.
        ">

<meta name="keywords"
	content="
            Alquiler, Apartamentos, Vacaciones, Casas, Habitaciones
        ">

<meta name="viewport"
	content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />

<meta charset="utf-8" />

<link rel="stylesheet" type="text/css" href="css/index.css">

<script type="text/javascript" src="scripts/javascript/CheckProfile.js"></script>

</head>
<body>
	<div class="container">
		<nav>
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="profile.php">Profile</a></li>
				<li><a href="reservations.php">Reservations</a></li>
				<li><a href="help.php">Help</a></li>
				<li><a href="logout.php">Log out</a></li>
			</ul>
		</nav>

		<div class="row">
			<div class="col-12">
				<div id="title">Edit your profile</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12">
				<div class="profile">
					<form class='user-profile' method="post"
						onsubmit="return validarForm(this);">
						<div>
							<label>Name:</label><input name="name" type='text' value=''>
						</div>
						<div>
							<label>First surname:</label><input name="firstsurnanme"
								type='text' value=''>
						</div>
						<div>
							<label>Second surname:</label><input name="secondsurname"
								type='text' value=''>
						</div>
						<div>
							<label>Email:</label><input name="email" type='text' value=''>
						</div>
						<div>
							<input type='submit' value='Save it'>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="push"></div>
	</div>

	<div class="footer">
		<p>� University of Barcelona.</p>
	</div>

</body>
</html>