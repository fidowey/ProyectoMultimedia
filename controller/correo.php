<?php
header("Content-type: text/html;charset=\"utf-8\"");
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$telefono = $_POST['telefono'];
$email = $_POST['email'];
$motivo = $_POST['motivo'];
$mensaje = $_POST['mensaje'];

$header = 'From: ' . $mail . " \r\n";
$header .= "X-Mailer: PHP/" . phpversion() . " \r\n";
$header .= "Mime-Version: 1.0 \r\n";
$header .= "Content-Type: text/plain";

$mensaje = "Este mensaje fue enviado por: " . $nombre . ",\r\n";
$mensaje .= "Su direccion es: " . $direccion . " \r\n";
$mensaje .= "Telefono: " . $telefono . " \r\n";
$mensaje .= "E-mail: " . $email . " \r\n";
$mensaje .= "Motivo: " . $motivo . " \r\n";
$mensaje .= "Mensaje: " . $mensaje . " \r\n";
$mensaje .= "Enviado el " . date('d/m/Y', time());

$para = 'edwinpimentel@outlook.com';
$asunto = 'Mensaje de mi sitio web';

if(mail($para, $motivo, utf8_decode($mensaje), $header))
	echo "<script type= 'text/javascript'>alert('Tu mensaje ha sido enviado exitosamente');</script>";
   echo "<script type= 'text/javascript'>window.location.href='http://localhost/ProyectoMultimedia/views/index.php'; </script>";
   
?>