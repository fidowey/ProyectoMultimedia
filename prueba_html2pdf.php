<?php 
	require './vendor/autoload.php';
	use Spipu\Html2Pdf\Html2Pdf;
	

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