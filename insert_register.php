<!DOCTYPE html>
<html>
<head>
	<title>The System</title>
</head>

<body>

	<?php 

		$name_team=$_POST["name_team"];
		$short_name=$_POST["short_name"];
		$creation=$_POST["creation_date"];
		$adress=$_POST["adress"];
		$email=$_POST["email"];
		$website=$_POST["website"];
		$user=$_POST["user"];
		$pass=$_POST["password"];

		require("data_connection.php");	

		$conexion=mysqli_connect($db_host,$db_usuario,$db_pass,$db_nombre);

		if (mysqli_connect_errno()) {
			echo "<script> alert('Error al conectar con la base de datos'); </script>";
			exit();
		}

		mysqli_set_charset($conexion,"utf8");
		
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

	 ?>

</body>
</html>