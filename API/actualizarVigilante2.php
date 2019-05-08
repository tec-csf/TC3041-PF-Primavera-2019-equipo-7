<?php
	include_once('funcionesVigilantes.php');

	$correoOrig = $_GET['correoOrig'];
	$correoNuevo = $_GET['correoNuevo'];
	$nombre = $_GET['nombre'];
	$apellidos = $_GET['apellidos'];
	$permiso = $_GET['permiso'];

	$vigilante = new Vigilante();
	echo $vigilante->actualizaVigilanteCompleto($correoOrig,$correoNuevo,$nombre,$apellidos,$permiso);
	
?> 
