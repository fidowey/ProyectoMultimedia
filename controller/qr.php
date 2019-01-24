<?php 


/*function guardarFormularioCred($rut,$apellidoPaterno,$apellidoMaterno,$nombre,$pasaporte,$sexo,$fechaNacimiento){
   include './model/bd.php';
   $retorno = null;
   $sql="INSERT INTO credencial(rut,apellidopaterno,apellidomaterno,nombre,pasaporte,sexo,fecha_nacimiento) VALUES(?,?,?,?,?,?,?)";
   $smt=$conn->prepare($sql);
   $smt->bindParam(1,$rut);
   $smt->bindParam(2,$apellidoPaterno);
   $smt->bindParam(3,$apellidoMaterno);
   $smt->bindParam(4,$nombre);
   $smt->bindParam(5,$pasaporte);
   $smt->bindParam(6,$sexo);
   $smt->bindParam(7,$fechaNacimiento);
   if($smt->execute()){
      $retorno = true;
   }else{
      $retorno = false;
   }
   $conn=null;
   return $retorno;
}*/


function cargarCodigoQr($directorio,$name,$rut){
   include './phpqrcode/qrlib.php';
    $dir = $directorio;

   $filename = $name;

   $tamanio = 6;
   $level = 'M';
   $frameSize = 2;
   $contenido = $rut;

   QRcode ::png($contenido, $filename, $level, $tamanio, $frameSize);

}

?>