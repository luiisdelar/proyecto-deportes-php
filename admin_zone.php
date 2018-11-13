<!DOCTYPE html>
<html>
<head>
	<title>The System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
<body>

	 		<h1 class="text-center">Admin Zone</h1>
			<h3 class="text-center">Bienvenid@: <?php echo $_SESSION["user"]; ?></h3>

			<input class="btn btn-primary" type="button" value="Logout" onclick="location.href='logout.php';">
			<input class="btn btn-primary" type="button" value="Return" onclick="location.href='logout.php';">


			<form class="row" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="col-4">
					<h3>Tournaments:</h3>
					<select class="form-control" name="tour">
				
				
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
			 ?>
			</select>
			</div>
			
				<div class="col-4">
					<h3>Category</h3>
					<select class="form-control" name="cat">
						<option value="1">Beginner</option>
						<option value="2">Amateur</option>
						<option value="3">Professional</option>
					</select>
				</div>

				<div class="col-4 d-flex align-items-end">
					<input class="btn btn-primary" type="submit" name="consult" value="Consult">
				</div>
				
			</form>
			

			<div class="table-responsive">
			<table class="table table-dark table-striped table-bordered table-hover">
			
				<thead>
					 <tr>
					    <th>Tournament</th>
					    <th>Category</th>
					    <th>Team Name</th>
					    <th>Participants</th>
					 	<th>Aux</th>
					 </tr>
				</thead>

				Ver un listado con todos los datos de los equipos inscritos en el torneo.	

				<tbody>
					<tr>
						
						<?php 
							if (isset($_POST["consult"])) {

								$tour=$_POST["tour"];
								$cat=$_POST["cat"];
								
								$consulta="select * from tournaments";
									
								$resultados=mysqli_query($conexion,$consulta);

								while($fila=mysqli_fetch_row($resultados)){
									echo "<option value='" . $fila[1] . "'>" . $fila[1] . "</option>";
								}	
								echo $tour." -- ".$cat;
							}else{
								echo "Nooooooooo";
							}

						 ?>
						<td>
						</td>
						<td>-------</td>
						<td>-------</td>
						<td>-------</td>
						<td>-------</td>
					</tr>
				</tbody>

			</table>
			</div>

</body>
</html>