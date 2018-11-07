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
</body>
</html>