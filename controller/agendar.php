
<?php 
require_once'../model/bd.php';

session_start();
$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_cuenta=$_SESSION['idcuenta'];

$hoy=getdate();
$hoy=date('Y-m-d');

$hora=$_REQUEST['hora'];
$fecha=$_REQUEST['fecha'];
$ruta=$_REQUEST['ruta'];


agendarvisita($hora,$fecha,$hoy,$id_cuenta,$ruta);


 ?>