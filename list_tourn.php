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
				
						?>
						<div class="table-responsive">
							<table class="table table-dark table-striped table-bordered table-hover">
							
								<thead>
									 <tr>
									    <th>Tournament</th>
									    <th>Number of participants</th>
									    <th>Category</th>
									 </tr>
								</thead>
								
								<tbody>
									<?php 

										$consulta="select * from inscriptions where user='$user' ";
										$resultados=mysqli_query($conexion,$consulta);

										while($fila=mysqli_fetch_row($resultados)){
										
											echo "<tr><td>".$fila[1]."</td>";
											echo "<td>".$fila[2]."</td>";

												if ($fila[3]==1) {
													echo "<td>Beginner</td></tr>";
												}
												if ($fila[3]==2) {
													echo "<td>Amateur</td></tr>";
												}
												if ($fila[3]==3) {
													echo "<td>Professional</td></tr>";
												}

										}	

										mysqli_close($conexion);
					 				?>	
								</tbody>

							</table>
						</div>
						

	</div>

</body>

</html>