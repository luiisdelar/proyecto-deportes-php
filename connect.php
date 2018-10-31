<!DOCTYPE html>
<html>
<head>
	<title>The System</title>
</head>

<body>

	<?php 

		require("data_connection.php");

		$conexion=mysqli_connect($db_host,$db_usuario,$db_pass,$db_nombre);

		if (mysqli_connect_errno()) {
			echo "<script> alert('Error al conectar con la base de datos'); </script>";
			exit();
		}

		mysqli_set_charset($conexion,"utf8");

		$consulta="select * from users_pass";

		$resultados=mysqli_query($conexion,$consulta);

		while($fila=mysqli_fetch_row($resultados)){

			echo $fila[1];

		}

		mysqli_close($conexion);

	 ?>

</body>
</html>