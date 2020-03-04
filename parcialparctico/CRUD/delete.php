<?php

	include_once 'conexion.php';
	if(isset($_GET['idalumno'])){
		$idalumno=(int) $_GET['idalumno'];
		$delete=$con->prepare('DELETE FROM alumnos WHERE idalumno=:idalumno');
		$delete->execute(array(
			':idalumno'=>$idalumno
		));
		header('Location: index.php');
	}else{
		header('Location: index.php');
	}
 ?>
