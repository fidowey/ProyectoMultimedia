<?php 
require_once'../model/bd.php';

$id_parque=$_POST['id_parque'];
$codebar=$_POST['codebar'];


$hoy=getdate();
$anioactual=(int)$hoy['year']; //el (int) es para convertir una variable a entero
$mesactual=(int)$hoy['mon'];
$diactual=(int)$hoy['mday']; 

$horaactual=(int)$hoy['hours'];
$minutoactual=(int)$hoy['minutes'];

$horario=$horaactual.$minutoactual;
$fecha=$anioactual.$mesactual.$diactual;


registrovisita($codebar,$id_parque,$horario,$fecha);

header("Location:".$_SERVER['HTTP_REFERER']);

?>