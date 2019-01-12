<?php 
	$user ="root";
	$pass="";
	$db_name="conaf";
	$host="localhost";
	
	if (mysqli_connect_errno()) {
		printf("fallo la conexion: %s",mysqli_connect_error());
		exit();
	}
	function ValidacionUsuario ($user ,$pass){
		$db= mysqli_connect($host,$user,$pass,$db_name);
		$sql ="SELECT * FROM user WHERE usuario='$usuario' and clave='$pass'";
		$resultado=mysqli_query($db,$sql);
		$filas=mysqli_num_rows($resultado);
		if($filas>0){
			echo"usuario no autorizado";
			die();
		}
		else{
			echo "Error en la autentificacion";
		}
		mysqli_free_result($resultado);
		mysqli_close($db);
	}
	function RegistrarUsuario(){
		$db= mysqli_connect($host,$user,$pass,$db_name);
		$sql ="insert into personal (rut, dv , nombres, apellido_p , apellido_m)
		values('$rut','$dv','$nombre','$apellido_p','$apellido_m')";
		if ($bd->query($sql)===TRUE) {
			echo "el registro se ingreso con exito";
	}
		else{
		echo "Error: ".$sql."<br>".$bd->error;
		}
		mysqli_free_result($resultado);
		mysqli_close($db);
	}

 ?>