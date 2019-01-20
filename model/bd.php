<?php
	function login ($email,$password){
		$user ="root";
		$pass="";
		$db_name="conaf";
		$host="localhost";

		if (mysqli_connect_errno()) {
		printf("fallo la conexion: %s",mysqli_connect_error());
		exit();
		}

		$db= mysqli_connect($host,$user,$pass,$db_name);

		$sql =
		"
		SELECT email_func,pass_func,privilegio
		FROM PERSONAL
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
					echo"usted es el administrador";
						//redireccionar a la vista del adminnistrador general
						/*$user='administrador';
						session_start();
						$_SESSION['user']=$user;
						header("Location:administrador.php");*/
						break;

					case '2':
						//redireccionar a la vista del subadministrador
						/*$user='subadministrador';
						session_start();
						$_SESSION['user']=$user;
						header("Location:subadministrador.php");*/
						echo"usted es el subadministrador";
					break;

					case '3':
						//redireccionar a la vista del usuario general
						/*$user='usuario';
						session_start();
						$_SESSION['user']=$user;
						header("Location:usuario.php");*/
						echo"usted es el usuario";
						break;
					
					default:
						//condiciones en caso de que el que se loguea no es un funcionario
						$select_visita=
						"
						SELECT email_vis,pass_cuenta FROM VISITANTE vis JOIN 
						CUENTA cuen ON vis.cod_vis=cuen.cod_vis
						WHERE email_vis='$email' AND pass_cuenta='$password'
						";

						$resultado_visita=mysqli_query($db,$select_visita);

						$filas_vis=mysqli_num_rows($resultado_visita);

						if($filas_vis>0){
							//redireccionar a la vista del visitante frecuente
							/*$user='visitante';
							session_start();
							$_SESSION['user']=$user;
							header("Location:visitante.php");
							mysqli_free_result($resultado_visita);
							mysqli_close($db);*/
							echo "usted es visitante";
						}

						else{
							//hacer aparecer un cuadro con javascript
									echo'<script>alert("Usuario incorrecto");</script>';
									
						}
						break;
				}
			}
		}
		else{
		//mismo cuadro con javascript
		echo'<script>alert("Usuario incorrecto");</script>';

		}

		mysqli_close($db);

}

	function RegistrarUsuario($nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$telefono,$img){

		$user ="root";
		$pass="";
		$db_name="conaf";
		$host="localhost";

		if (mysqli_connect_errno()) {
		printf("fallo la conexion: %s",mysqli_connect_error());
		exit();
		}

		$db= mysqli_connect($host,$user,$pass,$db_name);


		$sel="
		SELECT codebar_vis
		FROM VISITANTE
		";

		$consulta=mysqli_query($db,$sel);
		$resultado=mysqli_fetch_array($cosulta);
		$filas=mysqli_num_rows($consulta);


		$barcode=mt_rand(0000000000,9999999999); //creamos un numero al azar para el codigo de barra

		while ($barcode==$resultado['codebar_vis']) {

		$barcode=mt_rand(0000000000,9999999999); //en caso de repetirse, se vuelve a crear otro

		}

		$sel2=" 
			SELECT MAX(cod_vis)
			FROM VISITANTE
		"; //seleccionamos el maximo codigo de visita y le sumamos 1 para añadirselo al proximo visitante

		$consulta2=mysqli_query($db,$sel);
		$resultado2=mysqli_fetch_array($cosulta);
		$filas2=mysqli_num_rows($consulta);

		$cov_vis=$resultado2['cod_vis']+1;


		$sql ="
		INSERT INTO VISITANTE
		cod_vis,
		rut_vis,
		dv_vis,
		nombre_vis,
		appat_vis,
		apmat_vis,
		telefono_vis
		sexo_vis,
		edad_vis,
		pasaporte,
		fecha_nacvis,
		email_vis,
		codebar_vis
		VALUES
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
		'$fecha_nacvis',
		'$email',
		'$barcode'
		)";
		if ($bd->query($sql)===TRUE) {
			echo "el registro se ingreso con exito";
		}
		else{
		echo "Error: ".$sql."<br>".$bd->error;
		}
		mysqli_close($db);
		}

		function RegistrarPersonal(){
		$db= mysqli_connect($host,$user,$pass,$db_name);
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

	function updatevisitante(){
			$sql ="
			UPDATE VISITANTE
			SET
			rut_vis=$rut,
			dv_vis=$dv,
			nombre_vis=$nombre,
			appat_vis=$appat,
			apmat_vis=$apmat,
			telefono_vis=$telefono,
			sexo_vis=$sexo,
			tipo_vis=$tipo_vis
			pasaporte=$pasaporte,
			fecha_nacvis=$fechnac,
			email_vis=$email,
			img_vis=$img
			WHERE cod_vis=$codigo";
			mysqli_close($db);
	}
	function updatefuncionario(){
			$sql ="
			UPDATE PERSONAL
			SET
			nombre_func=$nombre,
			appat_func=$appat,
			apmat_func=$apmat,
			rut_func=$rut,
			dv_func=$dv,
			img_func=$img,
			privilegio=$privilegio,
			email_func=$email,
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
	function registrarcuenta(){
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
?>