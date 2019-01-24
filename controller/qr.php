<?php 


function cargarCodigoQr($directorio,$name,$rut){
   include '../views/include/phpqrcode/qrlib.php';
    $dir = $directorio;

   $filename = $name;

   $tamanio = 6;
   $level = 'M';
   $frameSize = 2;
   $contenido = $rut;

   QRcode ::png($contenido, $filename, $level, $tamanio, $frameSize);

}

?>