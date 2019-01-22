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
	$anioactual=(int)$hoy['year'];
	$mesactual=(int)$hoy['mon'];
	$diactual=(int)$hoy['mday']; //extraemos el año de la fecha actual

	$anionac= date("Y",strtotime($fechanac));
	$mesnac= date("M",strtotime($fechanac));
	$dianac= date("d",strtotime($fechanac));

	$anionac=(int)$anionac;
	$mesnac=(int)$mesnac;
	$dianac=(int)$dianac;

	$edad=(($anioactual.$mesactual.$diactual)-($anionac.$dianac.$mesnac));
	$edad=(substr($edad, 0, 2));

	RegistrarUsuario($nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$telefono,$edad,$email);

	
 ?>