<?php require_once "include/head_visitante.php"; ?>



<?php
include "model/bd.php";
include "controller/qr.php";

if(isset($_REQUEST['credencial_formulario'])) {
   $rut = $_REQUEST['rut'];
   $apellidoPaterno = $_REQUEST['apellidoPaterno'];
   $apellidoMaterno = $_REQUEST['apellidoMaterno'];
   $nombre = $_REQUEST['nombre'];
   $pasaporte = $_REQUEST['pasaporte'];
   $sexo = $_REQUEST['sexo'];
   $fechaNacimiento = $_REQUEST['fechaNacimiento'];


	if(RegistrarUsuario($nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$telefono,$edad,$email)){
      mkdir('personas/'.$rut,0700);
      $dir = "personas/".$rut.'/';
      $sep=explode('image/',$_FILES['foto']['type']); // Separamos image/ 
      $tipo=$sep[1];
      $foto = $rut.'.'.$tipo;
      move_uploaded_file($_FILES['foto']['tmp_name'], $dir.$foto);
      $imagen = "personas/".$rut.'/'.$foto;
      $name = $dir."QR-".$rut.".png";
      cargarCodigoQr($dir,$name,$rut);

   }else{
      echo "No se pudo guardar nada"; 
   }
 
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

  <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/credencial.css">
   <script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
   <script type="text/javascript" src="js/bootstrap.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <h3 class="text-center">Credencial</h3>
    </div>
    <div class="row">
      <div class="col-md-6 cred-front-iz">
      <div class="foto"><img src="<?php echo $imagen; ?>" class="foto-size"></div>
      <div class="apellidopaterno"><?php echo $apellidoPaterno; ?></div>
      <div class="apellidomaterno"><?php echo $apellidoMaterno; ?></div>
      <div class="nombre"><?php echo $nombre; ?></div>
      <div class="pasaporte"><?php echo $pasaporte; ?></div>
      <div class="sexo"><?php echo $sexo; ?></div>
      <div class="fecha_nacimiento"><?php echo $fechaNacimiento; ?></div>
      <div class="rut"><?php echo $rut; ?></div>

      </div>
      <div class="col-md-6 cred-front-der">
    
      </div>
    </div>
  </div>
</body>
</html>



<?php require_once "include/footer_visitante.php"; ?>