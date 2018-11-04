<!DOCTYPE html>
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
		<h3>User:<?php echo $_SESSION["user"]; ?></h3>

		<input class="btn btn-primary" type="button" value="Logout" onclick="location.href='logout.php';">	
		<input class="btn btn-primary" type="button" value="Return" onclick="location.href='inscr_tourn.php';">	

		<h2>Torneos donde esta inscrito: </h2>	
		<?php 
						$user=$_SESSION["user"];

						require("data_connection.php");
						
						$conexion=mysqli_connect($db_host,$db_usuario,$db_pass,$db_nombre);

						if (mysqli_connect_errno()) {
							echo "<script> alert('Error al conectar con la base de datos'); </script>";
							exit();
						}

						mysqli_set_charset($conexion,"utf8");

						$consulta="select * from inscriptions where user='$user' ";

						$resultados=mysqli_query($conexion,$consulta);

						echo "<div class='row'> ";
							echo "<div class='col'> Tournament </div> <div class='col'> Number of participants</div> <div class='col'>Category</div> ";
							echo "</div>";

						while($fila=mysqli_fetch_row($resultados)){

							
							echo "<div class='row'> ";
							echo "<div class='col'> <label class='from-group'>".$fila[1]."</label> </div> <div class='col'> <label>".$fila[2]."</label> </div> <div class='col'> <label>".$fila[3]."</label> </div> ";
							echo "</div>";
							//echo "<br>";

						}	

						mysqli_close($conexion);
					 ?>	

	</div>
	

	

</body>

</html>