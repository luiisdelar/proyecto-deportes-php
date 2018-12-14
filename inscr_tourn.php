<?php require("templates/header.php"); ?>

<body>

	<?php 
		

		session_start();	

		if (!isset($_SESSION["user"])){
			
			header("location:index.php");

		}

		require("templates/navbar.php");
	 
	 ?>

	<div class="container">
		

		<?php 

			$user=$_SESSION["user"];

			require("data_connection.php");
						
			$registros=$base->query("select * from users_pass where user='$user'")->fetchAll(PDO::FETCH_OBJ);

			if ($registros[0]->type=="admin") {
					
				include("admin_zone.php");		
				mysqli_close($conexion);	

			}else{
		?>

			<h1 class="text-center">Inscription Tournament</h1>
			

		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

			<div class="form-group">
				<label>Tournaments</label>
				<select class="form-control" name="sel">

					<?php 
						
						$registros=$base->query("select * from tournaments")->fetchAll(PDO::FETCH_OBJ);	
						foreach ($registros as $x): 
					
					?>
													
						<option value='<?php echo $x->name_tourn;?>'> <?php echo $x->name_tourn;?> </option>

					<?php 
					
						endforeach; 
					
					?>	

				</select>
			</div>	

			<div class="form-group">
				<label>Participants numbers</label>
				<input class="form-control" type="number" required="true" name="participants" placeholder="participants numbers">
			</div>

			<div class="form-group">
				<label>Category</label>
				<select class="form-control" name="category">
					<option value="1">Beginner</option>
					<option value="2">Amateur</option>
					<option value="3">Profesional</option>
				</select>

			</div>	
			


			<div class="row form-group justify-content-between">
				<div class="col-6"> 
					<input class="btn btn-primary form-control" type="submit" name="inscription" value="Inscription">
				</div>

				<div class="col-6">
					<input class="btn btn-primary form-control" type="button" value="Tournaments List" onclick="location.href='list_tourn.php';">
				</div>
			</div>

			<?php 

				if (isset($_POST["inscription"])) {
					
					$tourn=$_POST["sel"];
					$part=$_POST["participants"];
					$cat=$_POST["category"];
					$user=$_SESSION["user"];


					if(!is_numeric($part) || $part<=0 ){
						echo "<script>alert('Only interger numeric values in participants'); location.href='inscr_tourn.php';</script>";
						exit();
					}

					require("data_connection.php");	
						
					$registros=$base->query("select name_tourn,category from inscriptions where user='$user'")->fetchAll(PDO::FETCH_OBJ);
					
					foreach ($registros as $y) {
						
						if (strcasecmp($y->name_tourn,$tourn)==0 && strcasecmp($y->category,$cat)==0) {

							echo "<script> alert('Equipo ya inscrito en ese torneo y en esa categoria'); location.href ='list_tourn.php'; </script>";
							exit();
			
						}

					}

					$registros=$base->query("insert into inscriptions (name_tourn, participants, category, user) values ('$tourn','$part','$cat','$user')")->fetchAll(PDO::FETCH_OBJ);

					echo "<script> alert('Equipo inscrito con exito'); location.href ='list_tourn.php'; </script>";

					/*while($fila=mysqli_fetch_row($resultados)){

						if (strcasecmp($fila[0],$tourn)===0 && strcasecmp($fila[1],$cat)===0) {
							
							echo "<script> alert('Equipo ya inscrito en ese torneo y en esa categoria'); location.href ='list_tourn.php'; </script>";
							exit();
						}

					}

					$consulta="insert into inscriptions (name_tourn, participants, category, user) values ('$tourn','$part','$cat','$user')";
	
					$resultados=mysqli_query($conexion,$consulta);

					if (!$resultados) {
							
						echo "<script> alert('ERRORRRR'); </script>";
										
					}else{

						echo "<script> alert('Equipo inscrito con exito'); location.href ='list_tourn.php'; </script>";
					}
					
					
					msqli_close($conexion);*/	
				}
				
			 ?>
			 
		</form>
		
		<?php 
			}
		 ?>

	</div>
	

<?php require("templates/endpage.php"); ?>