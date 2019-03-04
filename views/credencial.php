<?php require_once "include/head_visitante.php"; ?>



<?php
session_start();
$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_cuenta=$_SESSION['idcuenta'];


require_once "../model/bd.php";


?>

<?php
  
  require '../phpqrcode/qrlib.php';
  
  $dir = 'temp/';
  
  if(!file_exists($dir))
    mkdir($dir);
  
  $filename = $dir.'test.png';
  
  $tamanio = 3;
  $level = 'H';
  $frameSize = 1;
  $contenido = 'hola';

  QRcode::png($contenido, $filename, $level, $tamanio, $frameSize);
  
  echo '<img src="'.$filename.'" />';

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>

  <link rel="stylesheet" type="text/css" href="include/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="include/css/credencial.css">
   <script type="text/javascript" src="include/js/jquery-3.3.1.min.js"></script>
   <script type="text/javascript" src="include/js/bootstrap.js"></script>
</head>
<body>
  <div class="container">
    <div class="row">
      <h3 class="text-center">Credencial</h3>
    </div>
    <div class="row">
      <div class="col-md-6 cred-front-iz">
<?php 
      $consulta=cosultarvisitante($email,$password);
      

      
             while ($valores=mysqli_fetch_assoc($consulta)){
               $img=$valores['img_vis'];
    
 ?>
      </div>
      <div class="col-md-6 cred-front-der">
        <br>
        <br>
        <br>
      <?php 
      echo "&nbsp &nbsp &nbsp"."&nbsp".
            $valores['appat_vis']."&nbsp".
            $valores['apmat_vis']."&nbsp".
            $valores['nombre_vis'];
      }?>
        
    
      </div>
    </div>
  </div>

<a href="../tcpdf/pdf/documento.php" target = "blank">
<button class="btn btn-warning pull-right" style="margin:100px;">Imprimir credencial</button>
</a>

</body>
</html>



<?php require_once "include/footer_visitante.php"; ?>