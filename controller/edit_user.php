<?php 
require_once'../model/bd.php';

$nombre = strtoupper($_POST['nombre']);
$appat = strtoupper($_POST['appat']);
$apmat = strtoupper($_POST['apmat']);
$rut=$_POST['rut'];
$telefono=$_POST['telefono'];
$email = $_POST['email'];
$imgck=$_REQUEST['imgck'];
$privilegio=$_REQUEST['privilegio'];
$password=$_REQUEST['password'];
$estadofunc=$_REQUEST['estadofunc'];
$estadocuenta=$_REQUEST['estadocuenta'];
$dv= dv($rut);

$target_file= "../views/include/img/" . $rut . $nombre . '.png';

if (file_exists($target_file)) {
    $target_file= "../views/include/img/" . $rut . $nombre . '.png';
} else {
    $target_file= "../views/include/img/" . 'default.jpg';
}




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

if($imgck=='file')
            {
            $img=$_FILES['img'];

            if (!empty($_FILES['img']['name']))
            {

                            

                            
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
                                } else {
                                    echo "Sorry, there was an error uploading your file.";
                                }
                                }               
            }
        }


                                if ($imgck=='camera') {
                                $img = $_POST['image'];
                                $target_dir = "../views/include/img/";
                              
                                $image_parts = explode(";base64,", $img);
                                $image_type_aux = explode("image/", $image_parts[0]);
                                $image_type = $image_type_aux[1];
                              
                                $image_base64 = base64_decode($image_parts[1]);
                                $target_file = $target_dir . $rut . $nombre . '.png';
                              
                                $file = $target_dir . $target_file;
                                file_put_contents($target_file, $image_base64);
                                }

switch ($privilegio) {
        case '1':
        $id_cargo=1;
        updateadmin($nombre,$appat,$apmat,$rut,$telefono,$email,$privilegio,$password,$dv,$target_file,$id_cargo);
            break;

        case '2':
        $id_cargo=2;
        $id_parque=$_REQUEST['id_parque'];
        updatesubadmin($nombre,$appat,$apmat,$rut,$telefono,$email,$privilegio,$password,$dv,$id_cargo,$target_file,$id_parque);
            break;

        case '3':
        $id_cargo=3;
        $id_parque=$_REQUEST['id_parque'];
        updateuser($nombre,$appat,$apmat,$rut,$telefono,$email,$privilegio,$password,$dv,$target_file,$id_cargo,$id_parque);
            break;
        
    }

    header("Location: ../views/control_usuarios.php");
      

 ?>