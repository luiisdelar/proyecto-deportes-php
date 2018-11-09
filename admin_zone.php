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
			
			<div class="row">
			
				<div class="col-3">
					<h3>Tournaments:</h3>
					<select class="form-control">
				
				
				
			
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
			
				<div class="col-3">
					<h3>Category</h3>
					<select class="form-control">
						<option>Beginner</option>
						<option>Amateur</option>
						<option>Professional</option>
					</select>
				</div>

				<div class="col-3 d-flex align-items-end">
					
					<input class="btn btn-primary" type="button" name="accept" value="Consult">
					
				</div>
			</div>

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

						
						<td>aaaa</td>
						<td>bbbb</td>
						<td>cccc</td>
						<td>dddd</td>
						<td>eeee</td>
					</tr>
				</tbody>

			</table>
			</div>

</body>
</html>