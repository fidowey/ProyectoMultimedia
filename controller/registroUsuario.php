<?php 
	$nombre = $_POST['nombre'];
	$appat = $_POST['appat'];
	$apmat = $_POST['apmat'];
	$rut=$_POST['rut'];
	$dv = $_POST['dv'];
	$fechaNac=$_POST['fechaNac'];
	$sexo=$_POST['sexo'];
	$pasaporte=$_POST['pasaporte'];
	$telefono=$_POST['telefono'];


	$hoy=getdate(); //obtenemos la fecha actual
	$anioactual=date("Y",$hoy); //extraemos el año de la fecha actual
	$anionac= date("Y",$fechaNac); //extraemos el año de la fecha de nacimiento

	$edad=$anioactual-$anionac; //hacemos el calculo de edad mediante una operacion matemática

	
 ?>