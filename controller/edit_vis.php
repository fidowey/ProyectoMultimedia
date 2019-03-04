<?php 

require_once'../model/bd.php';
	$cod_vis=$_REQUEST['cod_vis'];
	$nombre = strtoupper($_POST['nombre']); //strtoupper o string to upper, convierte a mayusculas la cadena
	$appat = strtoupper($_POST['appat']);
	$apmat = strtoupper($_POST['apmat']);
	$rut=$_POST['rut'];
	$direccion=$_POST['direccion'];
	$fechanac=$_POST['fechanac'];
	$pasaporte=$_POST['pasaporte'];
	$telefono=$_POST['telefono'];
	$email = $_POST['email'];
	$tipo_vis=$_POST['tipo_vis'];
	$imgck=$_REQUEST['imgck'];

	$hoy=getdate(); //obtenemos la fecha actual
	$anioactual=(int)$hoy['year']; //el (int) es para convertir una variable a entero
	$mesactual=(int)$hoy['mon'];
	$diactual=(int)$hoy['mday']; //extraemos el año de la fecha actual

	$anionac= date("Y",strtotime($fechanac));
	$mesnac= date("M",strtotime($fechanac));
	$dianac= date("d",strtotime($fechanac));

	$anionac=(int)$anionac;
	$mesnac=(int)$mesnac;
	$dianac=(int)$dianac;

	$edad=(($anioactual.$mesactual.$diactual)-($anionac.$dianac.$mesnac));
	$edad=(substr($edad, 0, 2)); //substr es para obtener solo un digito, el 0 marca el punto de inicio de la cadena o numero, el 2 es el largo que tendrá la nueva cadena o numero
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

	if($tipo_vis=='frecuente'){
	$password=$_REQUEST['password'];
	$est_cuenta=$_REQUEST['est_cuenta'];
	$cod_vis=$_REQUEST['cod_vis'];
	$imgck=$_REQUEST['imgck'];

	$consulta=consultarcuentas();
	while ($valores = mysqli_fetch_array($consulta)) {
		$id_cuenta=$valores['maxcuenta']+1;
	}
	if($imgck=='file')
			{

							$img=$_FILES['img'];
							 if($img!==''){

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
	registrarcuenta($id_cuenta,$est_cuenta,$password,$cod_vis);

	}

	if($tipo_vis=="esporadico"){
		$target_file='';
	}	

	


editarvisitante($cod_vis,$nombre,$appat,$apmat,$rut,$dv,$direccion,$fechanac,$pasaporte,$telefono,$edad,$email,$tipo_vis,$target_file);
	


 ?>

 <script>window.history.go(-2)</script>