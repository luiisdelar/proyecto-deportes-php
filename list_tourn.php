<!DOCTYPE html>
<html>

<head>
	<title>The System</title>
</head>

<body>

	<?php 

		session_start();	

		if (!isset($_SESSION["user"])){
			
			header("location:index.php");

		}

	?>

	<h1>Bienvenido <?php echo $_SESSION["user"]; ?></h1>

	

</body>

</html>