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
		<input class="btn btn-primary" type="button" value="Return" onclick="location.href='logout.php';">

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div class="form-group">
				<label>Tournaments</label>
				<select class="form-control" name="sel">

					<?php 

						require("data_connection.php");
						
						$conexion=mysqli_connect($db_host,$db_usuario,$db_pass,$db_nombre);

						if (mysqli_connect_errno()) {
							echo "<script> alert('Error al conectar con la base de datos'); </script>";
							exit();
						}

						mysqli_set_charset($conexion,"utf8");

						$consulta="select * from tournaments";

						$resultados=mysqli_query($conexion,$consulta);

						while($fila=mysqli_fetch_row($resultados)){

							echo "<option value='" . $fila[1] . "'>" . $fila[1] . "</option>";

						}

						mysqli_close($conexion);
					 ?>	

				</select>
			</div>

			<div class="form-group">
				<label>Participants numbers</label>
				<input class="form-control" type="number" name="participants" placeholder="participants numbers">
			</div>

			<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="category">
					<option value="Beginner">Beginner</option>
					<option value="Amateur">Amateur</option>
					<option value="Profesional">Profesional</option>
				</select>
			</div>	

			<div class="form-group">
				<input class="btn btn-primary form-control" type="submit" name="inscription" value="Inscription">
			</div>

			<div class="form-group">
				<input class="btn btn-primary form-control" type="button" value="Tournaments List" onclick="location.href='list_tourn.php';">
			</div>

			<?php 

				if (isset($_POST["inscription"])) {
					
					
					$tourn=$_POST["sel"];
					$part=$_POST["participants"];
					$cat=$_POST["category"];
					$user=$_SESSION["user"];

					require("data_connection.php");	
						
					$conexion=mysqli_connect($db_host,$db_usuario,$db_pass,$db_nombre);

					if (mysqli_connect_errno()) {
						echo "<script> alert('Error al conectar con la base de datos'); </script>";
						exit();
					}

					mysqli_set_charset($conexion,"utf8");

					$consulta="insert into inscriptions (name_tourn, participants, category, user) values ('$tourn','$part','$cat','$user')";

					$resultados=mysqli_query($conexion,$consulta);

					if (!$resultados) {
						echo "<script> alert('ERRORRRR'); </script>";
						var_dump($user);							
					}else{
						echo "<script> alert('Equipo inscrito con exito'); location.href ='list_tourn.php'; </script>";
					}

					msqli_close($conexion);	
				}
				
			 ?>

		</form>
	
	</div>

</body>

</html>