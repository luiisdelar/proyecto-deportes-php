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

				<tbody>
					
						
						<?php 
							if (isset($_POST["consult"])) {

								$tour=$_POST["tour"];
								$cat=$_POST["cat"];
								$log="logout.php";

								$consulta="select i.name_tourn, i.participants, u.name_team, u.creation_date, u.adress, u.email,
										   u.user, u.password, u.website, u.short_name, i.id
										   from inscriptions i, users_pass u
										   where name_tourn='$tour' and category='$cat' and i.user=u.user";
									
								$resultados=mysqli_query($conexion,$consulta);

								while($fila=mysqli_fetch_row($resultados)){
									echo "<form method='POST' action='manage_data.php'>";	
									echo "<tr><td>".$tour."</td>";
									echo "<td>".$cat."</td>";
									echo "<td >".$fila[2]."</td>";
									echo "<td>".$fila[1]."</td>";
									echo "<td> <input class='btn btn-primary' type='button' name='details' value='Details' "; ?> onclick='admin("<?php echo $fila[2]; ?>","<?php echo $cat; ?>","<?php echo $tour; ?>","<?php echo $fila[1]; ?>","<?php echo $fila[3]; ?>","<?php echo $fila[4]; ?>","<?php echo $fila[5]; ?>")' <?php echo ">
											   <input class='btn btn-primary' type='submit' name='edit' value='Edit'>
											   <input class='btn btn-primary' type='button' name='delete' value='Delete' ";?> onclick='deletee("<?php echo $fila[10]; ?>")' <?php echo "></td></tr>";
								    echo "<input type='hidden' value='".$fila[2]."' name='team'>
								    	  <input type='hidden' value='".$fila[4]."' name='adress'>
								    	  <input type='hidden' value='".$fila[6]."' name='user'>
								    	  <input type='hidden' value='".$fila[5]."' name='email'>
								    	  <input type='hidden' value='".$fila[7]."' name='pass'>
								    	  <input type='hidden' value='".$fila[3]."' name='date'>
								    	  <input type='hidden' value='".$fila[8]."' name='web'>
								    	  <input type='hidden' value='".$fila[9]."' name='short'>";
								    echo "</form>";
								}	

							}

						 ?>
						
				</tbody>
				
			</table>
			</div>
 
</body>

<script type="text/javascript">
	function admin(a,b,c,d,e,f,g) {
		alert("Team: "+a+" \nCategory: "+b+"\nTournament: "+c+"\nParticipants: "+d+"\nCreation date: "+e+"\nAdress: "+f+"\nEmail: "+g);
	}
	function deletee(a) {
		location.href="delete.php?id="+a;
	}
</script>
</html>