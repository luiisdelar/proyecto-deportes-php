<html>
<head>

	<title>The System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

	<?php 
		
		session_start();	

		if (!isset($_SESSION["user"])){
			
			header("location:index.php");

		}

	 ?>

	<div class="container">
		<h1 class="text-center">Inscrip Tourn</h1>
		<h3 class="text-center">Bienvenid@ <?php echo $_SESSION["user"]; ?></h3>
		<input class="btn btn-primary" type="button" value="Logout" onclick="location.href='logout.php';">
		<form method="POST" action="#">

			<div class="form-group">
				<label>Tournaments</label>
				<select class="form-control">

					<?php 

						require("data_connection.php");
						
						$conexion=mysqli_connect($db_host,$db_usuario,$db_pass,$db_nombre);

						if (mysqli_connect_errno()) {
							echo "<script> alert('Error al conectar con la base de datos'); </script>";
							exit();
						}

						mysqli_set_charset($conexion,"utf8");

						$consulta="select name_tourn from tournaments";

						$resultados=mysqli_query($conexion,$consulta);

						while($fila=mysqli_fetch_row($resultados)){

							echo "<option>" . $fila[0] . "</option>";

						}
					 ?>	

				</select>
			</div>

			<div class="form-group">
				<label>Participants numbers</label>
				<input class="form-control" type="number" name="participants" placeholder="participants numbers">
			</div>

			<div class="form-group">
				<label>Category</label>
				<select class="form-control">
					<option>Beginner</option>
					<option>Amateur</option>
					<option>Profesional</option>
				</select>
			</div>

		</form>
	
	</div>

</body>

</html>