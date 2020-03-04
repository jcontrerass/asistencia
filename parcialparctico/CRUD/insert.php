<?php
	include_once 'conexion.php';

	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$fechan=$_POST['fechan'];


		if(!empty($nombre) && !empty($apellido) && !empty($fechan) ){
		{
				$consulta_insert=$con->prepare('INSERT INTO alumnos(nombre,apellido,fechan) VALUES(:nombre,:apellido,:fechan)');
				$consulta_insert->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':fechan' =>$fechan
				));
				header('Location: index.php');
			}
		}else{
			echo "<script> alert('Los campos estan vacios');</script>";
		}

	}


?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<title>Nuevo alumno</title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" placeholder="nombre" class="input__text">
				<input type="text" name="apellido" placeholder="apellido" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="fechan" placeholder="fechan" class="input__text">
			</div>
			<div class="form-group">
			</div>
			<div class="btn__group">
				<a href="index.php" class="btn btn__danger">Cancelar</a>
				<input type="submit" name="guardar" value="Guardar" class="btn btn__primary">
			</div>
		</form>
	</div>
</body>
</html>
