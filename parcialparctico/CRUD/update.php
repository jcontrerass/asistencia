<?php
	include_once 'conexion.php';

	if(isset($_GET['idalumno'])){
		$idalumno=(int) $_GET['idalumno'];

		$buscar_idalumno=$con->prepare('SELECT * FROM alumnos WHERE idalumno=:idalumno');
		$buscar_idalumno->execute(array(
			':idalumno'=>$idalumno
		));
		$resultado=$buscar_idalumno->fetch();
	}else{
		header('Location: index.php');
	}


	if(isset($_POST['guardar'])){
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$fechan=$_POST['fechan'];

		$idalumno=(int) $_GET['idalumno'];

		if(!empty($nombre) && !empty($apellido) && !empty($fechan) ){
		{
				$consulta_update=$con->prepare('UPDATE alumnos SET
					nombre=:nombre,
					apellido=:apellido,
					fechan=:fechan,

					WHERE idalumno=:idalumno;'
				);
				$consulta_update->execute(array(
					':nombre' =>$nombre,
					':apellido' =>$apellido,
					':fechan' =>$fechan,
					':idalumno' =>$idalumno
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
	<title>Editar alumnos </title>
	<link rel="stylesheet" href="estilo.css">
</head>
<body>
	<div class="contenedor">
		<h2>CRUD EN PHP CON MYSQL</h2>
		<form action="" method="post">
			<div class="form-group">
				<input type="text" name="nombre" value="<?php if($resultado) echo $resultado['nombre']; ?>" class="input__text">
				<input type="text" name="apellido" value="<?php if($resultado) echo $resultado['apellido']; ?>" class="input__text">
			</div>
			<div class="form-group">
				<input type="text" name="fechan" value="<?php if($resultado) echo $resultado['fechan']; ?>" class="input__text">
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
