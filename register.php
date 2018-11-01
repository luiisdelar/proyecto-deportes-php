<html>

<head>

	<title>The System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap4.1/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">

</head>

<body>

	<div class="container">

	<h1 class="text-center">Register</h1>

	<form method="POST" action="insert_register.php">
		
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
			<input class="form-control" type="password" placeholder=" confirm password" required="true">
		</div>

		<div class="form-group">
			<input class="form-control" type="submit" value="Register">
		</div>
	</form>

	</div>

</body>

</html>