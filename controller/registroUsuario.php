<?php 

require_once'../model/bd.php';

	$nombre = strtoupper($_POST['nombre']);
	$appat = strtoupper($_POST['appat']);
	$apmat = strtoupper($_POST['apmat']);
	$rut=$_POST['rut'];
	$dv = $_POST['dv'];
	$fechanac=$_POST['fechanac'];
	$sexo=$_POST['sexo'];
	$pasaporte=$_POST['pasaporte'];
	$telefono=$_POST['telefono'];
	$email = $_POST['email'];

	$hoy=getdate(); //obtenemos la fecha actual
	$anioactual=$hoy['year']; //extraemos el año de la fecha actual
	$anionac= date("Y",strtotime($fechanac)); //extraemos el año de la fecha de nacimiento

	$edad=$anioactual-$anionac; //hacemos el calculo de edad mediante una operacion matemática

	RegistrarUsuario($nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$telefono,$edad,$email);

	
 ?>