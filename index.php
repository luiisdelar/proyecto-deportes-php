<?php require("templates/header.php"); ?>

	<?php 

		if (isset($_POST["login"])) {
			
			try{

				$base=new PDO("mysql:host=localhost; dbname=proyectodeportes","root","");

				$base->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

				$base->exec("set character set utf8");

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
					echo "<script>alert('Invalid username or password');
						  location.href ='index.php';</script>";
					exit();	
				}		

			}catch(Exception $e){

				die("Error: " . $e->getMessage());

			}finally{
				$base=null;
			}

		}	
			require("templates/navbar3.php");
		?>

	<div class="container">
		
		<div class="row align-items-center h-100 justify-content-center">
		
				
				<form class="col-6 border border-secondary rounded shadow-lg p-3 mb-5 bg-white rounded" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">

					<h1 class="text-center">Login</h1>			
					
						<div class="form-group">
							<label >User:</label>
							<input class="form-control" type="text" placeholder="user" name="user">		
						</div>
							
						
						<div class="form-group">
							<label>Password:</label>
							<input class="form-control" type="password" placeholder="password" name="password">
						</div>

						<div class="row justify-content-between form-group">
								<input class="btn btn-primary" type="button" value="Register" onclick="location.href='register.php';">
								<input class="btn btn-primary" type="submit" value="Login" name="login">
						</div>
		
				</form>
			</div>
		
	</div>			


<?php require("templates/endpage.php"); ?>