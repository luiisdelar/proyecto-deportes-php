<html>

<head>
	<title>The System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
</head>

<body>

	<?php 

		if (isset($_POST["login"])) {
			
			try{

				$base=new PDO("mysql:host=localhost; dbname=proyectodeportes","root","");

				$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

				$sql="select * from users_pass where user= :user and password= :password";

				$resultado=$base->prepare($sql);

				$user=htmlentities(addslashes($_POST["user"]));

				$password=htmlentities(addslashes($_POST["password"]));

				$resultado->bindValue(":user",$user);

				$resultado->bindValue(":password",$password);

				$resultado->execute();

				$num_register=$resultado->rowCount();

				if ($num_register!=0){

					session_start();
					
					$_SESSION["user"]=$_POST["user"];

					header("location:inscr_tourn.php");

				}else{
					echo "<h3>Usuario no encontrado</h3>";	
				}		

			}catch(Exception $e){
				die("Error: " . $e->getMessage());
			}

		}	
			
		?>

	<div class="container">
	
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">


			<h1 class="text-center">Login</h1>			
			
			<div class="form-group">
				<label >User:</label>
				<input class="form-control" type="text" placeholder="user" name="user">		
			</div>

			<div class="form-group">
				<label>Password:</label>
				<input class="form-control" type="password" placeholder="password" name="password">
			</div>

			<div class="form-group flex-row-reverse ">
				<input class="btn btn-primary" type="submit" value="Login" name="login">
				<input class="btn btn-primary" type="button" value="Register" onclick="location.href='register.php';">
			</div>

			<div class="form-group">
				
			</div>
		</form>
	
	</div>
</body>

</html>