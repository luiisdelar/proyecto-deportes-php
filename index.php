<?php require("templates/header.php"); ?>

	<?php 

		if (isset($_POST["login"])) {
			
				require("data_connection.php");

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
					/*echo "<script>alert('Invalid username or password');
						  location.href ='index.php';</script>";*/
					?>
					<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
					<?php	  
					exit();	
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
								<div class="col-6"> 
									<input class="btn btn-primary form-control" type="button" value="Register" onclick="location.href='register.php';">
								</div>
								
								<div class="col-6"> 	
									<input class="btn btn-primary form-control" type="submit" value="Login" name="login">
								</div>
						</div>
		
				</form>
			</div>
		
	</div>			


<?php require("templates/endpage.php"); ?>