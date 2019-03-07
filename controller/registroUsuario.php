<?php 

	require_once'../model/bd.php';
	require '../vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	$nombre = strtoupper($_POST['nombre']); //strtoupper o string to upper, convierte a mayusculas la cadena
	$appat = strtoupper($_POST['appat']);
	$apmat = strtoupper($_POST['apmat']);
	$rut=$_POST['rut'];
	$direccion=$_POST['direccion'];
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
	$dv= dv($rut);

	if($dv==1){
		$dv="k";
	}

	function dv($rut){
	$s=1;
     for($m=0;$rut!=0;$rut/=10){
         $s=($s+$rut%10*(9-$m++%6))%11;
     }
     $dv=chr($s?$s+47:75);
     return $dv;

 	}

	RegistrarUsuario($nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$telefono,$edad,$email,$direccion);

		$html = '<h1>Visitantes registrados</h1>
<h2>Datos personales</h2>
<ol>
    <li><i>nombre = '.$nombre.'</i></li> 
    <li><i>apellido paterno = '.$appat.'</i></li>  
    <li><i>apellido materno = '.$apmat.'</i></li>
    <li><i>rut = '.$rut.'</i></li>  
	<li><i>direccion = '.$direccion.'</i></li> 
    <li><i>fecha de nacimiento = '.$fechanac.'</i></li> 
	<li><i>sexo = '.$sexo.'</i></li> 
	<li><i>telefono = '.$telefono.'</i></li> 
	<li><i>Email = '.$email.'</i></li> 
</ol>
';
	$html2pdf = new Html2Pdf('C','A4','es','true','UTF-8');
	$html2pdf->writeHTML($html);
	$html2pdf->output();
?>
	
	header("Location:".$_SERVER['HTTP_REFERER']);

 ?>