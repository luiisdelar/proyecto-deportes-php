<?php require("templates/header.php"); ?>


<body>

	<?php 
		
		session_start();	

		if (!isset($_SESSION["user"])){
			
			header("location:index.php");

		}

		require("templates/navbar2.php");
		
	?>

	<div class="container">

		<h2 class="text-center">Tournaments List</h2>	
		<?php 
						$user=$_SESSION["user"];

						require("data_connection.php");
						
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

										$registros=$base->query("select * from inscriptions where user='$user'")->fetchAll(PDO::FETCH_OBJ);

										foreach ($registros as $tor) {
											
											echo "<tr><td>".$tor->name_tourn."</td>";
											echo "<td>".$tor->participants."</td>";


											if ($tor->category==1) {
												echo "<td>Beginner</td></tr>";	
											}
											if ($tor->category==2) {
												echo "<td>Amateur</td></tr>";	
											}
											if ($tor->category==3) {
												echo "<td>Professional</td></tr>";	
											}

										}

				 				?>	
								</tbody>

							</table>
						</div>
						

	</div>
<?php require("templates/endpage.php"); ?>