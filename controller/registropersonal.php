<?php 
require_once'../model/bd.php';

$id_parque=$_POST['id_parque'];

$nombre = strtoupper($_POST['nombre']);
$appat = strtoupper($_POST['appat']);
$apmat = strtoupper($_POST['apmat']);
$rut=$_POST['rut'];
$telefono=$_POST['telefono'];
$email = $_POST['email'];
$img=$_FILES['img'];
$privilegio=$_REQUEST['privilegio'];
$password=$_REQUEST['password'];
$estadofunc=$_REQUEST['estadofunc'];
$estadocuenta=$_REQUEST['estadocuenta'];
$dv= dv($rut);

	if($dv==1){
		$dv="k";
	}

	function dv($rut){
	$s=1;
     for($m=0;$rut!=0;$rut/=10){
         $s=($s+$rut%10*(9-$m++%6))%11;
     }
     $dv=chr($s?$s+47:75);
     return $dv;

 	}

 	switch ($privilegio) {
 		case '2':
 			# code...
 		$id_cargo=2;
 			break;

 		case '3':
 			# code...
 		$id_cargo=3;
 			break;
 		
 	}

$target_dir = "../views/include/img/";
$target_file = $target_dir . $rut . $nombre . '.png';
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($img["tmp_name"]);
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
    chmod($target_file,0755); //Change the file permissions if allowed
    unlink($target_file); //remove the file
}
// Check file size
if ($img["size"] > 50000000) {
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
    
    if (move_uploaded_file($img["tmp_name"], $target_file)) {
        echo "The file ". basename( $img["name"]). " has been uploaded.";
        $img2=imagecreatefrompng($target_file);
        $img2cropped=imagecrop($img2,['x' => 0, 'y' => 0, 'width' => 150, 'height' => 150]);

    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
*/
 RegistrarPersonal($nombre,$appat,$apmat,$rut,$dv,$telefono,$email,$target_file,$id_cargo,$id_parque,$privilegio,$password,$estadofunc,$estadocuenta);

header("Location:".$_SERVER['HTTP_REFERER']);  

 ?>