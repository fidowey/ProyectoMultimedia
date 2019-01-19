<?php 
	$user ="root";
	$pass="";
	$db_name="conaf";
	$host="localhost";
	
	if (mysqli_connect_errno()) {
		printf("fallo la conexion: %s",mysqli_connect_error());
		exit();
	}
	function login ($email ,$pass){
		$db= mysqli_connect($host,$user,$pass,$db_name);
		$sql =
		"
		SELECT email_func,pass_func,privilegio
		FROM FUNCIONARIO
		WHERE email='$email'
		AND pass_func='$pass'
		";
		$resultado=mysqli_query($db,$sql);


//este if está orientado unicamente a los  funcionarios
		$filas=mysqli_num_rows($resultado);
		if($filas>0)
		{
			if($email=='email'&& $pass=='pass_func')
			{
				switch ('privilegio')
				{
					case '1':
						//redireccionar a la vista del adminnistrador general
					header('Location: administrador.php');
						break;

					case '2':
						//redireccionar a la vista del subadministrador
					header('Location: subadministrador.php');
						break;

					case '3':
						//redireccionar a la vista del usuario general
					header('Location: usuario.php');
						break;
					
					default:
						//condiciones en caso de que el que se loguea no es un funcionario
						$select_visita=
						"
						SELECT email_vis,pass_cuenta FROM VISITANTE vis JOIN 
						CUENTA cuen ON vis.cod_vis=cuen.cod_vis
						WHERE email_vis='$email' AND pass_cuenta='$pass';
						";

						$resultado_visita=mysqli_query($db,$select_visita);

						$filas_vis=mysqli_num_rows($resultado_visita);

						if($filas_vis>0){
							//redireccionar a la vista del visitante frecuente
							header('Location: visita.php');
									mysqli_free_result($resultado_visita);
									mysqli_close($db);
						}

						else{
							//hacer aparecer un cuadro con javascript
									echo"
									<script>
									alert ("."El nombre de usuario o la contraseña no son correctos".");
									return false;
									</script>
									"
						}
						break;
				}
			}
		}
		else{
			//mismo cuadro con javascript
		echo"
		<script>
		alert ("."El nombre de usuario o la contraseña no son correctos".");
		return false;
		</script>
		"
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