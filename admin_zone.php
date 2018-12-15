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
							if (isset($_POST["consult"])) {

								$tour=$_POST["tour"];
								$cat=$_POST["cat"];
								$log="logout.php";

								$registros=$base->query("select i.name_tourn, i.participants, u.name_team, u.creation_date, u.adress, u.email,
										   u.user, u.password, u.website, u.short_name, i.id
										   from inscriptions i, users_pass u
										   where name_tourn='$tour' and category='$cat' and i.user=u.user")->fetchAll(PDO::FETCH_OBJ);


								foreach ($registros as $tor): ?>
								
									<form method="POST" action="manage_data.php">
										<tr>
											<td><?php echo $tour; ?></td>
											<td><?php echo $cat; ?></td>
											<td><?php echo $tor->name_team; ?></td>
											<td><?php echo $tor->participants; ?></td>
											<td>
												<input class="btn btn-success" type="button" name="details" value="Details" onclick='admin("<?php echo $tor->name_team; ?>","<?php echo $cat; ?>","<?php echo $tour; ?>","<?php echo $tor->participants; ?>","<?php echo $tor->creation_date; ?>","<?php echo $tor->adress; ?>","<?php echo $tor->email; ?>")'> 
												<input class='btn btn-warning' type='submit' name='edit' value='Edit'>
												<input class="btn btn-danger" type="button" name="delete" value="Delete" onclick='deletee("<?php echo $tor->id; ?>")'>
												<input type='hidden' value="<?php echo $tor->name_team; ?>" name='team'>
										    	<input type='hidden' value="<?php echo $tor->adress; ?>" name='adress'>
										     	<input type='hidden' value="<?php echo $tor->user; ?>" name='user'>
										    	<input type='hidden' value="<?php echo $tor->email; ?>" name='email'>
										    	<input type='hidden' value="<?php echo $tor->password; ?>" name='pass'>
										    	<input type='hidden' value="<?php echo $tor->creation_date; ?>" name='date'>
										    	<input type='hidden' value="<?php echo $tor->website; ?>" name='web'>
										    	<input type='hidden' value="<?php echo $tor->short_name; ?>" name='short'>
										    
											</td>
										</tr>	


									</form>


								<?php
								endforeach;	
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