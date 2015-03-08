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
					<li><a href="login.html">Log in</a></li>
					<li><a href="help.html">Help</a></li>
					<li><a href="reservas.php">Reservas></a></li>
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
				    <?php  
					    //tomamos los datos del archivo conexion.php  
					    include("Connection.php");  
					    $link = connect(); 
					    //se envia la consulta  
					    $email="turpis@euismod.ca";
					    $query="SELECT DISTINCT p.id_propiedad, p.capacidad, p.dormitorios, p.banyos, p.precio FROM propiedad as p, reserva_propiedad as r, user as u WHERE '$email' = r.fk_email AND r.fk_propiedad = p.id_propiedad;
";
					    $result = mysql_query($query, $link);  
					    //se despliega el resultado  
					    echo "<table>";  
					    echo "<tr>";  
					    echo "<th>id_propiedad</th>";  
					    echo "<th>capacidad</th>";  
					    echo "<th>Dormitorios</th>"; 
					    echo "<th>Banyos</th>";
					    echo "<th>Precio</th>";  
					    echo "</tr>";  
					    while ($row = mysql_fetch_row($result)){   
					        echo "<tr>";  
					        echo "<td>$row[0]</td>";  
					        echo "<td>$row[1]</td>";  
					        echo "<td>$row[2]</td>";  
					        echo "<td>$row[3]</td>"; 
					        echo "<td>$row[4]</td>";  
					        echo "</tr>";  
					    }  
					    echo "</table>";  
				    ?> 
				</div>
			</div>
		</div>

		<div class="footer">
			<p>© University of Barcelona.</p>	
		</div>
	</body>
</html>