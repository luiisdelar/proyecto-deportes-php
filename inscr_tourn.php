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
		<form method="POST" action="#">

			<div class="form-group">
				<label>Tournaments</label>
				<select class="form-control">
					<option>Mundial</option>	
				</select>
			</div>

			<div class="form-group">
				<label>Participants</label>
				<input class="form-control" type="number">
			</div>

		</form>
	
	</div>

</body>

</html>