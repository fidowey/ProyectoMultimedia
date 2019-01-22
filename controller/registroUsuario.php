<?php 

require_once'../model/bd.php';

	$nombre = strtoupper($_POST['nombre']); //strtoupper o string to upper, convierte a mayusculas la cadena
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
	$anioactual=(int)$hoy['year']; //el (int) es para convertir una variable a entero
	$mesactual=(int)$hoy['mon'];
	$diactual=(int)$hoy['mday']; //extraemos el año de la fecha actual

	$anionac= date("Y",strtotime($fechanac));
	$mesnac= date("M",strtotime($fechanac));
	$dianac= date("d",strtotime($fechanac));

	$anionac=(int)$anionac;
	$mesnac=(int)$mesnac;
	$dianac=(int)$dianac;

	$edad=(($anioactual.$mesactual.$diactual)-($anionac.$dianac.$mesnac));
	$edad=(substr($edad, 0, 2)); //substr es para obtener solo un digito, el 0 marca el punto de inicio de la cadena o numero, el 2 es el largo que tendrá la nueva cadena o numero

	RegistrarUsuario($nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$telefono,$edad,$email);

	
 ?>