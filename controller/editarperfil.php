<?php 
require_once '../model/bd.php';

$cod_vis=$_REQUEST['cod_vis'];
$nombre=$_REQUEST['nombre'];
$appat=$_REQUEST['appat'];
$apmat=$_REQUEST['apmat'];
$rut=$_REQUEST['rut'];
$dv=$_REQUEST['dv'];
$fechanac=$_REQUEST['fechanac'];
$sexo=$_REQUEST['sexo'];
$pasaporte=$_REQUEST['pasaporte'];
$edad=$_REQUEST['edad'];
$direccion= strtoupper($_REQUEST['direccion']);
$email=$_REQUEST['email'];
$telefono=$_REQUEST['telefono'];
$img=$_REQUEST['img'];
$tipo_vis=$_REQUEST['tipo_vis'];

updatevisitante($cod_vis,$nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$edad,$direccion,$email,$telefono,$img,$tipo_vis);





 ?>