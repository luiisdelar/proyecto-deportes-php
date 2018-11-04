<html>

<head>

	<title>The System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

	<?php 

		if (isset($_POST["register"])) {
			
				$name_team=$_POST["name_team"];
				$short_name=trim($_POST["short_name"]);
				$creation=$_POST["creation_date"];
				$adress=$_POST["adress"];
				$email=trim($_POST["email"]);
				$website=trim($_POST["website"]);
				$user=trim($_POST["user"]);
				$pass=trim($_POST["password"]);

				if (empty($short_name) || empty($name_team) || empty($creation) || empty($email) || empty($user) || empty($pass)) {
					header("location:err_register.php");
					exit();
				}

				require("data_connection.php");	

				$conexion=mysqli_connect($db_host,$db_usuario,$db_pass,$db_nombre);

				if (mysqli_connect_errno()) {
					echo "<script> alert('Error al conectar con la base de datos'); </script>";
					exit();
				}

				mysqli_set_charset($conexion,"utf8");
				
				$consulta="select user from users_pass";

				$resultados=mysqli_query($conexion,$consulta);

				while($fila=mysqli_fetch_row($resultados)){

					if (strcasecmp($fila[0],$user)===0) {
						echo "<script>alert('El usuario ya existe'); location.href ='index.php'; </script>";
						exit();
					}

				}

				$consulta="insert into users_pass (user, password, name_team, short_name, creation_date, adress, email, website) values ('$user','$pass','$name_team','$short_name','$creation','$adress','$email','$website')";

				$resultados=mysqli_query($conexion,$consulta);

				if (!$resultados) {
					echo "Error en la consulta";
				}else{
					echo "<script> alert('Equipo registrado con exito'); </script>";
					header("location:index.php");

				}
				/**********consulta**********
				$consulta="select * from users_pass";

				$resultados=mysqli_query($conexion,$consulta);

				while($fila=mysqli_fetch_row($resultados)){

					echo $fila[1];

				}*/

				mysqli_close($conexion);

	 
		}


	 ?>
	
	<div class="container">

	<h1 class="text-center">Register</h1>

	<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		
		<div class="form-group">
			<label>Name team</label>
			<input class="form-control" type="text" placeholder="name team" name="name_team" required="true">
		</div>
	
		<div class="form-group">
			<label>Short name</label>
			<input class="form-control" type="text" placeholder="short name" name="short_name" required="true">
		</div>

		<div class="form-group">
			<label>Creation date</label>
			<input class="form-control" type="date" name="creation_date" required="true">
		</div>

		<div class="form-group">
			<label>Responsability adress</label>
			<input class="form-control" type="text" name="adress" placeholder="responsabilty adress">
		</div>

		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="email" name="email" placeholder="email" required="true">
		</div>

		<div class="form-group">
			<label>Website</label>		
			<input class="form-control" typer="web" name="website" placeholder="website">
		</div>

		<div class="form-group">
			<label>Username</label>
			<input class="form-control" type="text" name="user" placeholder="username" required="true">
		</div>

		<div class="form-group">
			<label>Password</label>
			<input class="form-control" type="password" name="password" placeholder="password" required="true">
		</div>

		<div class="form-group">
			<label>Confirm password</label>
			<input class="form-control" type="password" placeholder="confirm password" required="true">
		</div>

		<div class="form-group">
			<input class="form-control btn btn-primary" type="submit" name="register" value="Register">
		</div>

		<div class="form-group">
			<input class="form-control btn btn-primary" type="button" value="Return" onclick="location.href='index.php';">
		</div>	
	</form>

	</div>

</body>

</html>