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
		SELECT email_func,pass_func,privilegio,id_parque,estado_cta
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
				if ($resultado['estado_cta']==0) {
				header("Location:../views/baneado.php");
				}

				else{


				switch ($resultado['privilegio'])
				{
					case '1':
						//redireccionar a la vista del adminnistrador general
						session_start();
						$_SESSION['usuario']=$email;
						$_SESSION['password']=$password;
						$_SESSION['privilegio']=$resultado['privilegio'];
						header("Location:../views/perfil_admin.php");
						break;

					case '2':
						//redireccionar a la vista del subadministrador
						session_start();
						$_SESSION['usuario']=$email;
						$_SESSION['password']=$password;
						$_SESSION['place']=$resultado['id_parque'];
						$_SESSION['privilegio']=$resultado['privilegio'];
						header("Location:../views/perfil_subadmin.php");
					break;

					case '3':
						//redireccionar a la vista del usuario empleado
						session_start();
						$_SESSION['usuario']=$email;
						$_SESSION['password']=$password;
						$_SESSION['place']=$resultado['id_parque'];
						$_SESSION['privilegio']=$resultado['privilegio'];
						header("Location:../views/perfil_usuario.php");
						break;
				}
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
						else if($resultado['est_cuenta']==1){
							header("Location:../views/baneado.php");
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

		function RegistrarPersonal($nombre,$appat,$apmat,$rut,$dv,$telefono,$email,$target_file,$id_cargo,$id_parque,$privilegio,$password,$estadofunc,$estadocuenta){
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
		'$target_file',
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
		'$target_file',
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

	function updatevisitante($cod_vis,$nombre,$appat,$apmat,$rut,$dv,$fechanac,$sexo,$pasaporte,$edad,$direccion,$email,$telefono,$tipo_vis){

		global $db;

			$sql ="
			UPDATE VISITANTE
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
			$sq="UPDATE CUENTA
			SET
			pass_cuenta='$password',
			est_cuenta=$est_cuenta,
			password=$password
			";

			if ($db->query($sq)===FALSE) {
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
			}

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
			WHERE email_vis='$email' AND pass_cuenta='$password'";

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

		function consultarvisitasgenerales1parque($id_parque){
		global $db;
			$consulta="
			SELECT * FROM VISITANTE
			WHERE tipo_vis='esporadico' AND 
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

		function editarvisitante($cod_vis,$nombre,$appat,$apmat,$rut,$dv,$direccion,$fechanac,$pasaporte,$telefono,$edad,$email,$tipo_vis,$target_file,$comentario){

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
			img_vis='$target_file',
			comentario='$comentario'
			WHERE cod_vis=$cod_vis";

			if ($tipo_vis="esporadico")
				$del="DELETE FROM CUENTA
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

		function consultarfuncionarios($email,$password){
		global $db;
			$consulta="
			SELECT * FROM PERSONAL
			WHERE estado_func=1 AND estado_cta=1
			AND email_func!='$email'
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

		function registraradmin($nombre,$appat,$apmat,$rut,$dv,$telefono,$email,$target_file,$id_cargo,$privilegio,$password,$estadofunc,$estadocuenta){
				global $db;

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
		'$target_file',
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


		$sel="
		SELECT * FROM PARQUE
		";

		$consulta=mysqli_query($db,$sel);

		while ($valores = mysqli_fetch_array($consulta)) {

		$id_parque=$valores['id_parque'];
		$nombre_parque=$valores['nombre_parque'];
		$comuna_parque=$valores['comuna_parque'];
		$cord_parque=$valores['cord_parque'];
		$region_parque=$valores['region_parque'];

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
		'$target_file',
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


		}

		


		mysqli_close($db);
	}

	function consultarpareditar($rut_func){

	global $db;
			$consulta="
			SELECT * FROM PERSONAL
			WHERE rut_func=$rut_func
			";


	return mysqli_query($db,$consulta);

	mysqli_close($db);
	}

	function updateadmin($nombre,$appat,$apmat,$rut,$telefono,$email,$privilegio,$password,$dv,$target_file,$id_cargo){
		global $db;

		$sql="UPDATE PERSONAL SET
		nombre_func='$nombre',
		appat_func='$appat',
		apmat_func='$apmat',
		img_func='$target_file',
		privilegio=$privilegio,
		email_func='$email',
		telefono_func=$telefono,
		id_cargo=$id_cargo,
		pass_func='$password'
		WHERE rut_func=$rut
		";


		$sql2="DELETE FROM DETALLE_PARQUE
		WHERE rut_func=$rut
		";

		if ($db->query($sql2)===TRUE) {
			echo "eliminacion exitosa";
		}
		else{
		echo "Error: ".$sql2."<br>".$db->error;
		}

		$sel="
		SELECT * FROM PARQUE
		";

		$consulta=mysqli_query($db,$sel);

		while ($valores = mysqli_fetch_array($consulta)) {

		$id_parque=$valores['id_parque'];
		$nombre_parque=$valores['nombre_parque'];
		$comuna_parque=$valores['comuna_parque'];
		$cord_parque=$valores['cord_parque'];
		$region_parque=$valores['region_parque'];
		$estadocuenta=1;
		$estadofunc=1;

		$sql3 ="
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
		'$target_file',
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

							if ($db->query($sql3)===TRUE) {
			echo "el registro se ingreso con exito para adminnistrador";
	}
		else{
		echo "Error: ".$sql3."<br>".$db->error;
		}

		}
		

			


	mysqli_close($db);	
	}

function updatesubadmin($nombre,$appat,$apmat,$rut,$telefono,$email,$privilegio,$password,$dv,$id_cargo,$target_file,$id_parque){
		global $db;

		$sql="UPDATE PERSONAL SET
		nombre_func='$nombre',
		appat_func='$appat',
		apmat_func='$apmat',
		img_func='$target_file',
		privilegio=$privilegio,
		email_func='$email',
		telefono_func=$telefono,
		id_cargo=$id_cargo,
		pass_func='$password'
		WHERE rut_func=$rut
		";

		$sql2="UPDATE DETALLE_PARQUE SET
		nombre_func='$nombre',
		appat_func='$appat',
		apmat_func='$apmat',
		img_func='$target_file',
		privilegio=$privilegio,
		email_func='$email',
		telefono_func=$telefono,
		id_cargo=$id_cargo,
		pass_func='$password'
		WHERE rut_func=$rut
		";

		$sql3="DELETE FROM DETALLE_PARQUE
		WHERE rut_func=$rut AND id_parque<>$id_parque";

		if ($db->query($sql)===TRUE) {
			echo "el registro se ingreso con exito";
	}
		else{
		echo "Error: ".$sql."<br>".$db->error;
		}

		if ($db->query($sql2)===TRUE) {
			echo "el registro se ingreso con exito";
	}
		else{
		echo "Error: ".$sql2."<br>".$db->error;
		}

		if ($db->query($sql3)===TRUE) {
			echo "el registro se ingreso con exito";
	}
		else{
		echo "Error: ".$sql3."<br>".$db->error;
		}

	mysqli_close($db);	
	}

	

	function updateuser($nombre,$appat,$apmat,$rut,$telefono,$email,$privilegio,$password,$dv,$target_file,$id_cargo,$id_parque){
		global $db;

		$sql="UPDATE PERSONAL SET
		nombre_func='$nombre',
		appat_func='$appat',
		apmat_func='$apmat',
		img_func='$target_file',
		privilegio=$privilegio,
		email_func='$email',
		telefono_func=$telefono,
		id_cargo=$id_cargo,
		pass_func='$password'
		WHERE rut_func=$rut
		";

		$sql2="UPDATE DETALLE_PARQUE SET
		nombre_func='$nombre',
		appat_func='$appat',
		apmat_func='$apmat',
		img_func='$target_file',
		privilegio=$privilegio,
		email_func='$email',
		telefono_func=$telefono,
		id_cargo=$id_cargo,
		pass_func='$password'
		WHERE rut_func=$rut
		";

		$sql3="DELETE FROM DETALLE_PARQUE
		WHERE rut_func=$rut AND id_parque<>$id_parque";

		if ($db->query($sql)===TRUE) {
			echo "el registro se ingreso con exito";
		}
		else{
		echo "Error: ".$sql."<br>".$db->error;
		}

		if ($db->query($sql2)===TRUE) {
			echo "el registro se ingreso con exito";
		}
		else{
		echo "Error: ".$sql2."<br>".$db->error;
		}

		if ($db->query($sql3)===TRUE) {
			echo "el registro se ingreso con exito";
	}
		else{
		echo "Error: ".$sql3."<br>".$db->error;
		}

	mysqli_close($db);	
	}

	function consultarfichafunc($idcomparador){
		global $db;
		$sel="
		SELECT * FROM PERSONAL NATURAL JOIN DETALLE_PARQUE
		WHERE rut_func=$idcomparador
		";

		return mysqli_query($db,$sel);

		mysql_close($db);

		}

		function consultarfichavis($idcomparador){
		global $db;
		$sel="
		SELECT * FROM VISITANTE
		WHERE rut_vis=$idcomparador
		";

		return mysqli_query($db,$sel);

		mysql_close($db);

		}

	function registrovisita($codebar,$id_parque,$horario,$fecha){
		global $db;

		$sel="
		SELECT * FROM VISITANTE
		WHERE codebar_vis=$codebar
		";

		mysqli_query($db,$sel);

		while ($valores=mysqli_fetch_array($consulta)) {
			$cod_visita=$valores['cod_vis'];

			$consulta2="SELECT MAX(id_vis) AS maxvis from VISITA";

			while ($resultado = mysqli_fetch_array($consulta2)) {

				$id_visita=$resultado['maxvis']+1;
			

			$sql="INSERT INTO VISITA
			fecha_vis,
			hora_vis,
			id_vis,
			cod_vis,
			id_parque
			VALUES
			$fecha,
			$horario,
			$id_visita,
			$cod_visita,
			$id_parque
			";

			if ($db->query($sql)===TRUE) {
			echo "el registro se ingreso con exito";
		}
		else{
		echo "Error: ".$sql."<br>".$db->error;
		}
		}
		}
}
		

		function selecttodosvisitantes(){
			global $db;

			$consulta="
			SELECT * FROM VISITANTE
			";

			return mysqli_query($db,$consulta);
			mysql_close($db);
		}

		function selecttodostrabajadores(){
			global $db;

			$consulta="
			SELECT * FROM PERSONAL
			";

			return mysqli_query($db,$consulta);
			mysql_close($db);
		}

		function consultarvisitasmasculinas(){
			global $db;

			$consulta="SELECT COUNT(id_vis) AS vismas FROM VISITA
			NATURAL JOIN VISITANTE WHERE sexo_vis='M'";

			return mysqli_query($db,$consulta);
			mysql_close($db);

		}

		function consultarvisitasfemeninas(){
			global $db;

			$consulta="SELECT COUNT(id_vis) AS visfem FROM VISITA
			NATURAL JOIN VISITANTE WHERE sexo_vis='F'";

			return mysqli_query($db,$consulta);
			mysql_close($db);

		}








?>