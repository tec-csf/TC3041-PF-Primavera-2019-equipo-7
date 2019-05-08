<?php
	 include_once('funcionesVigilantes.php');

	$correo = $_GET['correo'];

	$vigilante = new Vigilante();
        echo $vigilante->eliminaVigilante($correo);
?>
