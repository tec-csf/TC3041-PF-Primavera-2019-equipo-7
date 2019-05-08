<?php
	include_once('funcionesVigilantes.php');
	$nombre = $_GET['nombre'];
	$apellidos = $_GET['apellidos'];
	$correo = $_GET['correo'];
	$contrasenia = $_GET['contrasenia'];
	$permiso = $_GET['permiso'];

	$vigilante = new Vigilante();
	echo $vigilante->aniadeVigilante($nombre,$apellidos,$correo,$contrasenia,$permiso);
?>

