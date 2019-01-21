<?php
require_once'../model/bd.php';

//tomamos todos los datos de la visita esporadica, pero le agregamos unos mas

	$nombre = strtoupper($_POST['nombre']);
	$appat = strtoupper($_POST['appat']);
	$apmat = strtoupper($_POST['apmat']);
	$rut=$_POST['rut'];
	$dv = $_POST['dv'];
	$fechanac=$_POST['fechanac'];
	$sexo=$_POST['sexo'];
	$pasaporte=$_POST['pasaporte'];
	$telefono=$_POST['telefono'];
	$email = $_POST['email'];
	$imagen = $_FILES['imagen']; //la imagen a pesar de ser nulo, mediante php se le pedirá de manera obligatoria

	$target_dir = "img/";
$target_file = $target_dir . $nombreproducto . $descripcion . '.png';
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($imagen["tmp_name"]);
    if($check !== false) {
        echo "File is an image - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($imagen["size"] > 50000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($imagen["tmp_name"], $target_file)) {
        echo "The file ". basename( $imagen["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

	$hoy=getdate(); //obtenemos la fecha actual
	$anioactual=$hoy['year']; //extraemos el año de la fecha actual
	$anionac= date("Y",strtotime($fechanac)); //extraemos el año de la fecha de nacimiento

	$edad=$anioactual-$anionac; //hacemos el calculo de edad mediante una operacion matemática

	RegistrarVisFrec($nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$telefono,$img,$edad,$email);


?>