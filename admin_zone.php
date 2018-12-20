<!DOCTYPE html>
<html>
<head>
	<title>The System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>
	
<body>

	 		<h1 class="text-center">Admin Zone</h1>
	
			<form class="row" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
				<div class="col-4">
					<h3>Tournaments:</h3>
					<select class="form-control" name="tour">
				
				
			<?php 
					require("data_connection.php");	

					$registros=$base->query("select * from tournaments")->fetchAll(PDO::FETCH_OBJ);

					foreach ($registros as $tor) {
						echo "<option value='" . $tor->name_tourn. "'>" . $tor->name_tourn . "</option>";
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
					 	<th>Admin</th>
					 </tr>
				</thead>

				<tbody>
						
						<?php

							if (isset($_POST["consult"]) || isset($_GET["pagination"])) {


								if (isset($_POST["consult"])) {
									$tour=$_POST["tour"];
									$cat=$_POST["cat"];
								}

								if(isset($_GET["pagination"])){
									$tour=$_GET["tour"];
									$cat=$_GET["cat"];
								}

								$tamanho_pag=3;	

								if (isset($_GET["pagination"])) {

									if ($_GET["pagination"]==1) {
											$pagina=1;
											header("location:list_tourn.php");		
									}else{
											$pagina=$_GET["pagination"];
									 }


								}else{
										$pagina=1;
								}


								$desde=($pagina-1)*$tamanho_pag;

								$sql="select i.name_tourn, i.participants, u.name_team, u.creation_date, u.adress, u.email,
										   u.user, u.password, u.website, u.short_name, i.id
										   from inscriptions i, users_pass u
										   where name_tourn='$tour' and category='$cat' and i.user=u.user";

								$resultado=$base->prepare($sql);

								$resultado->execute();

							 	$num_filas=$resultado->rowCount();

								$totalpaginas=ceil($num_filas/$tamanho_pag);

								$sql2="select i.name_tourn, i.participants, u.name_team, u.creation_date, u.adress, u.email,
										   u.user, u.password, u.website, u.short_name, i.id
										   from inscriptions i, users_pass u
										   where name_tourn='$tour' and category='$cat' and i.user=u.user limit $desde,$tamanho_pag";

								$resultado=$base->prepare($sql2);

								$resultado->execute();
												   
								/*$registros=$base->query("select i.name_tourn, i.participants, u.name_team, u.creation_date, u.adress, u.email,
										   u.user, u.password, u.website, u.short_name, i.id
										   from inscriptions i, users_pass u
										   where name_tourn='$tour' and category='$cat' and i.user=u.user")->fetchAll(PDO::FETCH_OBJ);
								*/								

								while ($registros=$resultado->fetch(PDO::FETCH_ASSOC)) {
										 ?>
								
									<form method="POST" action="manage_data.php">
										<tr>
											<td><?php echo $tour; ?></td>
											<td><?php echo $cat; ?></td>
											<td><?php echo $registros["name_team"]; ?></td>
											<td><?php echo $registros["participants"]; ?></td>
											<td>
												<input class="btn btn-success" type="button" name="details" value="Details" onclick='admin("<?php echo $tor->name_team; ?>","<?php echo $cat; ?>","<?php echo $tour; ?>","<?php echo $tor->participants; ?>","<?php echo $tor->creation_date; ?>","<?php echo $tor->adress; ?>","<?php echo $tor->email; ?>")'> 
												<input class='btn btn-warning' type='submit' name='edit' value='Edit'>
												<input class="btn btn-danger" type="button" name="delete" value="Delete" onclick='deletee("<?php echo $tor->id; ?>")'>
												<input type='hidden' value="<?php echo $registros["name_team"]; ?>" name='team'>
										    	<input type='hidden' value="<?php echo $registros["adress"]; ?>" name='adress'>
										     	<input type='hidden' value="<?php echo $registros["user"]; ?>" name='user'>
										    	<input type='hidden' value="<?php echo $registros["email"]; ?>" name='email'>
										    	<input type='hidden' value="<?php echo $registros["password"]; ?>" name='pass'>
										    	<input type='hidden' value="<?php echo $registros["creation_date"]; ?>" name='date'>
										    	<input type='hidden' value="<?php echo $registros["website"]; ?>" name='web'>
										    	<input type='hidden' value="<?php echo $registros["short_name"]; ?>" name='short'>
										    
											</td>
										</tr>	

									</form>

								<?php
								} 
							}

						 ?>
						
				</tbody>
				
			</table>

			<?php if (isset($totalpaginas)): ?>	
			
			<nav aria-label="...">
		
				 <ul class="pagination">
								  	
				    	<?php  
				    if (isset($_GET["pagination"])) {
				    	?>

					    <li class="page-item">
				    		<a class="page-link" href="?pagination=<?php echo $_GET['pagination']-1; ?>&tour=<?php echo $tour; ?>&cat=<?php echo $cat; ?>" tabindex="-1">Previous</a>
				   		</li>
	
						<?php
					}else{
						?>
							<li class="page-item disabled">
						    	  <a class="page-link" tabindex="-1">Previous</a>
							</li>
								    		<?php	
								    	}

								    ?>


									<?php for ($i=1; $i <= $totalpaginas; $i++) :?>
										
										<?php 
											if ($pagina==$i) {
												echo "<li class='page-item active'>";		
											}else{
												echo "<li class='page-item'>";											
											}
										?>
										
											<a class="page-link" href="?pagination=<?php echo $i; ?>&tour=<?php echo $tour; ?>&cat=<?php echo $cat; ?>"><?php echo $i; ?></a>
										</li>
								    <?php endfor; ?>	

									<?php  

										if (isset($_GET["pagination"]) && $_GET["pagination"]==$totalpaginas) {
											?>
												<li class="page-item disabled">
											      <a class="page-link">Next</a>
											    </li>
											<?php
										}else{
											
												if (isset($_GET["pagination"])) {
													?>	
														<li class="page-item">
													      <a class="page-link" href="?pagination=<?php echo $_GET["pagination"]+1; ?>&tour=<?php echo $tour; ?>&cat=<?php echo $cat; ?>">Next</a>
													    </li>
													<?php
												}else{
													?>
														<li class="page-item">
													      <a class="page-link" href="?pagination=2&tour=<?php echo $tour; ?>&cat=<?php echo $cat; ?>">Next</a>
													    </li>
													<?php
												}
										}

									?>								   

								  </ul>
							</nav>

			<?php endif ?>
			
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