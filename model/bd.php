<?php

$user ="root";
$pass="";
$db_name="conaf";
$host="localhost";

if (mysqli_connect_errno()) {
printf("fallo la conexion: %s",mysqli_connect_error());
exit();
}

$db= mysqli_connect($host,$user,$pass,$db_name);

	

	function login ($email,$password){
		
		global $db;

		$sql =
		"
		SELECT email_func,pass_func,privilegio,id_parque
		FROM DETALLE_PARQUE
		WHERE email_func='$email'
		AND pass_func='$password'
		";
		$sesion=mysqli_query($db,$sql);
		$resultado=mysqli_fetch_array($sesion);
		$filas=mysqli_num_rows($sesion);

		if($filas>0)
		{
			if($email==$resultado['email_func'] && $password==$resultado['pass_func'])
			{
				switch ($resultado['privilegio'])
				{
					case '1':
						//redireccionar a la vista del adminnistrador general
						session_start();
						$_SESSION['usuario']=$email;
						$_SESSION['password']=$password;
						header("Location:../views/perfil_admin.php");
						break;

					case '2':
						//redireccionar a la vista del subadministrador
						session_start();
						$_SESSION['usuario']=$email;
						$_SESSION['password']=$password;
						$_SESSION['place']=$resultado['id_parque'];
						header("Location:../views/perfil_subadmin.php");
					break;

					case '3':
						//redireccionar a la vista del usuario general
						session_start();
						$_SESSION['usuario']=$email;
						$_SESSION['password']=$password;
						header("Location:../views/usuario.php");
						break;
				}
						//condiciones en caso de que el que se loguea no es un funcionario			
			}
		}
		else{

		$select_visita=
						"
						SELECT email_vis,pass_cuenta,est_cuenta FROM VISITANTE vis JOIN 
						CUENTA cuen ON vis.cod_vis=cuen.cod_vis
						WHERE email_vis='$email' AND pass_cuenta='$password'
						";

						$resultado_visita=mysqli_query($db,$select_visita);
						$resultado=mysqli_fetch_array($resultado_visita);
						$filas_vis=mysqli_num_rows($resultado_visita);

						if($filas_vis>0 && $resultado['est_cuenta']==1){
							//redireccionar a la vista del visitante frecuente
							$user='visitante';
							session_start();
							$_SESSION['usuario']=$email;
							$_SESSION['password']=$password;
							header("Location:../views/perfil_visitante.php");
							mysqli_free_result($resultado_visita);
							mysqli_close($db);
						}
						else{
							echo'<script>alert("Usuario incorrecto");</script>';
						}
			}				
		mysqli_close($db);
	}

	function RegistrarUsuario($nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$telefono,$edad,$email,$direccion){


		global $db;


		$sel="
		SELECT bar_codevis
		FROM VISITANTE
		";

		$consulta=mysqli_query($db,$sel);

		while ($valores = mysqli_fetch_array($consulta)) {

		$barcode=mt_rand(0000000000,9999999999); //creamos un numero al azar para el codigo de barra

		while ($barcode==$valores['bar_codevis']) {

		$barcode=mt_rand(0000000000,9999999999); //en caso de repetirse, se vuelve a crear otro

		}
		}

		$sel2=" 
			SELECT MAX(cod_vis) AS cod_vis
			FROM VISITANTE
		"; //seleccionamos el maximo codigo de visita y le sumamos 1 para añadirselo al proximo visitante

		$consulta2=mysqli_query($db,$sel2);

		while ($valores2=mysqli_fetch_array($consulta2)) {
			
			$cod_vis=$valores2['cod_vis'];
			$cod_vis=$cod_vis+1;
			# code...
		}


		
		$sql ="
		INSERT INTO VISITANTE
		(
		cod_vis,
		rut_vis,
		dv_vis,
		nombre_vis,
		appat_vis,
		apmat_vis,
		telefono_vis,
		sexo_vis,
		edad_vis,
		pasaporte,
		fecha_nacvis,
		email_vis,
		bar_codevis,
		dir_vis
		)
		VALUES
		(
		'$cod_vis',
		'$rut',
		'$dv',
		'$nombre',
		'$appat',
		'$apmat',
		'$telefono',
		'$sexo',
		'$edad',
		'$pasaporte',
		'$fechanac',
		'$email',
		'$barcode',
		'$direccion'
		)";
		if ($db->query($sql)===TRUE) {
			echo "el registro se ingreso con exito";
		}
		else{
		echo "Error: ".$sql."<br>".$db->error;
		}
		mysqli_close($db);
		}

		function RegistrarPersonal(){
		global $db;
		$sql ="
		INSERT INTO PERSONAL
		nombre_func,
		appat_func,
		apmat_func,
		rut_func,
		dv_func,
		img_func,
		privilegio,
		email_func,
		telefono_func,
		id_cargo,
		pass_func
		VALUES
		'$nombre',
		'$appat',
		'$apmat',
		'$rut',
		'$dv',
		'$img',
		'$privilegio',
		'$email',
		'$telefono',
		'id_cargo',
		'$pass_func'
		)";
		$sql2="
		INSERT INTO CARGO
		id_cargo,
		nombre_cargo
		VALUES
		'$id_cargo',
		'$nombre_cargo'
		";
		if ($bd->query($sql)===TRUE&&$bd->query($sql2)) {
			echo "el registro se ingreso con exito";
	}
		else{
		echo "Error: ".$sql."<br>".$bd->error;
		}
		mysqli_close($db);
	}

	function updatevisitante($cod_vis,$nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$edad,$direccion,$email,$telefono,$img,$tipo_vis){

		global $db;

			$sql ="
			UPDATE VISITANTE
			SET
			cod_vis=$cod_vis,
			nombre_vis='$nombre',
			appat_vis='$appat',
			apmat_vis='$apmat',
			rut_vis='$rut',
			dv_vis='$dv',
			fecha_nacvis='$fechanac',
			sexo_vis='$sexo',
			pasaporte='$pasaporte',
			edad_vis=$edad,
			dir_vis='$direccion',
			email_vis='$email',
			telefono_vis=$telefono,
			img_vis='$img',
			tipo_vis='$tipo_vis'
			WHERE cod_vis=$cod_vis";

					if ($db->query($sql)===TRUE) {
			echo "actualizacion hecha con exito";
		}
		else{
		echo "Error: ".$sql."<br>".$db->error;
		}
		mysqli_close($db);
		}


	function registrarcuenta($cod_vis,$estado,$password,$qr,$img){
		global $db;
			$sql ="
			INSERT INTO CUENTA
			id_cuenta,
			est_cuenta,
			pass_cuenta,
			qr,
			cod_vis
			VALUES
			$id,
			$estado,
			$password,
			$qr,
			$cod_vis";
			mysqli_close($db);
	}

	function updatefuncionario(){
		global $db;
			$sql ="
			UPDATE PERSONAL
			SET
			nombre_func='$nombre',
			appat_func='$appat',
			apmat_func='$apmat',
			rut_func='$rut',
			dv_func='$dv',
			img_func='$img',
			privilegio='$privilegio',
			email_func='$email',
			telefono_func=$telefono,
			id_cargo=$id_cargo,
			estado_cta=$estado_cta,
			estado_func=$estado_func,
			pass_func=$pass_func
			WHERE cod_vis=$codigo";

			$sql2="
			UPDATE CARGO
			SET
			id_cargo=$id_cargo,
			nombre_cargo=$nombre_cargo
			";
			mysqli_close($db);
	}

	function cosultarvisitante($email,$password){
		global $db;

		$sql ="
			SELECT * FROM VISITANTE NATURAL JOIN CUENTA
			WHERE email_vis='$email' AND pass_cuenta=$password";

			return mysqli_query($db,$sql);


		}

		function consultarvisitas($email,$password){
			global $db;

			$consulta="
				SELECT fecha_vis,hora_vis,cod_vis,nombre_parque,id_vis FROM VISITA
				NATURAL JOIN PARQUE NATURAL JOIN VISITANTE NATURAL JOIN CUENTA
				WHERE email_vis='$email' AND pass_cuenta='$password'
				";

				return mysqli_query($db,$consulta);
		}

		function consultarvis1parque($id_parque){
			global $db;

			$consulta="
			SELECT nombre_vis,appat_vis, apmat_vis, rut_vis, dv_vis, fecha_vis, hora_vis FROM VISITANTE NATURAL JOIN VISITA
			WHERE id_parque=$id_parque";

			return mysqli_query($db,$consulta);
		}

			function consultarfuncionario($email,$password){
			global $db;

			$consulta="
			SELECT * FROM DETALLE_PARQUE
			WHERE email_func='$email'
			AND pass_func=$password";

			return mysqli_query($db,$consulta);
		}

		function agendarvisita($email,$password){
		global $db;

		$sql="INSERT INTO prog_visita
		hora_preprog_vis,
		fecha_preprog_vis,
		fecha_registro,
		id_registro,
		id_cuenta
		VALUES
		$hora,
		'$fecha',
		'$fecha_ahora',
		id_registro,
		id_cuenta"

		if ($bd->query($sql)===TRUE&&$bd->query($sql2)) {
			echo "el registro se ingreso con exito";
		}
		else{
		echo "Error: ".$sql."<br>".$bd->error;
		}
		mysqli_close($db);
	}

?>