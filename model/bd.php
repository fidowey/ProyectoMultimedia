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
						SELECT email_vis,pass_cuenta,est_cuenta,id_cuenta FROM VISITANTE vis JOIN 
						CUENTA cuen ON vis.cod_vis=cuen.cod_vis
						WHERE email_vis='$email' AND pass_cuenta='$password'
						";

						$resultado_visita=mysqli_query($db,$select_visita);
						$resultado=mysqli_fetch_array($resultado_visita);
						$filas_vis=mysqli_num_rows($resultado_visita);

						if($filas_vis>0 && $resultado['est_cuenta']==1 && $resultado!=NULL){
							//redireccionar a la vista del visitante frecuente
							session_start();
							$_SESSION['usuario']=$email;
							$_SESSION['password']=$password;
							$_SESSION['idcuenta'] = $id_cuenta=$resultado['id_cuenta'];
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

		$barcode=mt_rand(0000000000,9999999999); //creamos un numero al azar
		
		while ($valores = mysqli_fetch_array($consulta)) 
		{
		//si el codigo de barra ya existe
			if($barcode==$valores['bar_codevis']) 
			{
			//creamos un codigo nuevo
			$barcode=mt_rand(0000000000,9999999999); //en caso de repetirse, se vuelve a crear otro
			}
		}

		$sel2=" 
			SELECT MAX(cod_vis) AS cod_vis
			FROM VISITANTE
		"; //seleccionamos el maximo codigo de visita

		$consulta2=mysqli_query($db,$sel2);

		while ($valores2=mysqli_fetch_array($consulta2)) {
			
			$cod_vis=$valores2['cod_vis'];
			$cod_vis=$cod_vis+1; //al cod vis le sumamos uno
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

		function RegistrarPersonal($nombre,$appat,$apmat,$rut,$dv,$telefono,$email,$img,$id_cargo,$id_parque,$privilegio,$password,$estadofunc,$estadocuenta){
		global $db;

		$sel="
		SELECT * FROM PARQUE
		WHERE id_parque=$id_parque
		";

		$consulta=mysqli_query($db,$sel);

		while ($valores = mysqli_fetch_array($consulta)) {
		$id_parque=$valores['id_parque'];
		$nombre_parque=$valores['nombre_parque'];
		$comuna_parque=$valores['comuna_parque'];
		$cord_parque=$valores['cord_parque'];
		$region_parque=$valores['region_parque'];
		}

		$sql ="
		INSERT INTO PERSONAL
		(
		nombre_func,
		appat_func,
		apmat_func,
		rut_func,
		dv_func,
		img_func,
		privilegio,
		email_func,
		telefono_func,
		estado_cta,
		estado_func,
		id_cargo,
		pass_func
		)
		VALUES
		(
		'$nombre',
		'$appat',
		'$apmat',
		'$rut',
		'$dv',
		'$img',
		'$privilegio',
		'$email',
		$telefono,
		'$estadocuenta',
		'$estadofunc',
		'$id_cargo',
		'$password'
		)";

		
		if ($db->query($sql)===TRUE) {
			echo "el registro se ingreso con exito";
	}
		else{
		echo "Error: ".$sql."<br>".$db->error;
		}

		$sql2 ="
		INSERT INTO DETALLE_PARQUE
		(
		nombre_func,
		appat_func,
		apmat_func,
		rut_func,
		dv_func,
		img_func,
		privilegio,
		email_func,
		telefono_func,
		estado_cta,
		estado_func,
		id_cargo,
		pass_func,
		id_parque,
		nombre_parque,
		comuna_parque,
		cord_parque,
		region_parque
		)
		VALUES(
		'$nombre',
		'$appat',
		'$apmat',
		'$rut',
		'$dv',
		'$img',
		$privilegio,
		'$email',
		$telefono,
		$estadocuenta,
		$estadofunc,
		$id_cargo,
		'$password',
		$id_parque,
		'$nombre_parque',
		'$comuna_parque',
		'$cord_parque',
		'$region_parque'
		)";

		if ($db->query($sql2)===TRUE) {
			echo "el registro se ingreso con exito";
	}
		else{
		echo "Error: ".$sql2."<br>".$db->error;
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


	function registrarcuenta($id_cuenta,$est_cuenta,$password,$cod_vis){
		global $db;
			$sql ="
			INSERT INTO CUENTA(
			id_cuenta,
			est_cuenta,
			pass_cuenta,
			cod_vis
			)
			VALUES(
			'$id_cuenta',
			$est_cuenta,
			'$password',
			$cod_vis
			)";

			if ($db->query($sql)===TRUE) {
			echo "insersión";
			}
			else{
			echo "Error: ".$sql."<br>".$db->error;
			}
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
				mysqli_close($db);
		}

		function consultarvis1parque($id_parque){
			global $db;

			$consulta="
			SELECT nombre_vis,appat_vis, apmat_vis, rut_vis, dv_vis, fecha_vis, hora_vis FROM VISITANTE NATURAL JOIN VISITA
			WHERE id_parque=$id_parque";

			return mysqli_query($db,$consulta);
			mysqli_close($db);
		}

			function consultarfuncionario($email,$password){
			global $db;

			$consulta="
			SELECT * FROM DETALLE_PARQUE
			WHERE email_func='$email'
			AND pass_func=$password";

			return mysqli_query($db,$consulta);
			mysqli_close($db);
		}


		function agendarvisita($hora,$fecha,$fecha_ahora,$id_cuenta,$ruta){
		
		global $db;

		$consulta="
			SELECT COUNT(id_registro) AS cuentareg FROM PROG_VISITA";

		$sesion=mysqli_query($db,$consulta);
		$resultado=mysqli_fetch_array($sesion);
			
				$id_registro=$resultado['cuentareg'];
				$id_registro=$id_registro+1;
			

		$sql="INSERT INTO PROG_VISITA
		(
		hora_preprog_vis,
		fecha_preprog_vis,
		fecha_registro,
		id_registro,
		id_cuenta,
		id_ruta
		)
		VALUES
		(
		$hora,
		'$fecha',
		'$fecha_ahora',
		$id_registro,
		$id_cuenta,
		'$ruta'
		)";

		if ($db->query($sql)===TRUE) {
			echo "el registro se ingreso con exito";
		}
		else{
		echo "Error: ".$sql."<br>".$db->error;
		}
		mysqli_close($db);
		}

		function consultarvisfrec(){
		global $db;
			
			$consulta="
			SELECT * FROM VISITANTE NATURAL JOIN CUENTA
			WHERE tipo_vis='frecuente' AND est_cuenta=1";

			return mysqli_query($db,$consulta);
		}

				function consultarvisfrec2(){
		global $db;
			
			$consulta="
			SELECT * FROM VISITANTE NATURAL JOIN CUENTA
			WHERE tipo_vis='frecuente' AND est_cuenta=0";

			return mysqli_query($db,$consulta);
			mysqli_close($db);
		}

		function consultarvisitasgenerales(){
		global $db;
			$consulta="
			SELECT * FROM VISITANTE
			WHERE tipo_vis='esporadico'
			";

			return mysqli_query($db,$consulta);
			mysqli_close($db);
		}

		function consultar1vis($cod_vis){
		global $db;

		$consulta="
		SELECT * FROM VISITANTE
		WHERE cod_vis=$cod_vis;
		";

		return mysqli_query($db,$consulta);
		mysqli_close($db);
		}

		function editarvisitante($cod_vis,$nombre,$appat,$apmat,$rut,$dv,$direccion,$fechanac,$pasaporte,$telefono,$edad,$email,$tipo_vis,$target_file){

		global $db;

			$sql="UPDATE VISITANTE
			SET
			nombre_vis='$nombre',
			appat_vis='$appat',
			apmat_vis='$apmat',
			rut_vis='$rut',
			dv_vis='$dv',
			fecha_nacvis='$fechanac',
			pasaporte='$pasaporte',
			edad_vis=$edad,
			dir_vis='$direccion',
			email_vis='$email',
			telefono_vis=$telefono,
			tipo_vis='$tipo_vis',
			img_vis='$target_file'
			WHERE cod_vis=$cod_vis";

			if ($db->query($sql)===TRUE) {
			echo "actualizacion exitosa";
			}
			else{
			echo "Error: ".$sql."<br>".$db->error;
			}

			mysqli_close($db);
		}

		function consultarcuentas(){
		global $db;
				
		$consulta="
		SELECT MAX(id_cuenta) as maxcuenta from cuenta
		";

		return mysqli_query($db,$consulta);
		mysqli_close($db);
		}

		function consultarfuncionarios(){
		global $db;
			$consulta="
			SELECT * FROM PERSONAL
			WHERE estado_func=1 AND estado_cta=1
			";

			return mysqli_query($db,$consulta);
			mysqli_close($db);
		}

		function consultarfuncionariosbloqueados(){
		global $db;
			$consulta="
			SELECT * FROM PERSONAL
			WHERE estado_func=0 AND estado_cta=0
			";

			return mysqli_query($db,$consulta);
			mysqli_close($db);
		}


?>