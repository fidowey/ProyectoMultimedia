
<?php require_once "../model/bd.php"; ?>
<?php require_once "include/head_subadmin.php";

session_start();
$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_parque=$_SESSION['place'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<div class="container">
	 		<div class="col-md-4"></div>
 	</div>
 	<div class="row">
 		<div class="col-md-2"></div>
 		<div class="col-md-8">
 			<table class="table">
  				<thead>
    				<tr>
      					<th scope="col">Nombre Visita</th>
      					<th scope="col">Rut Visita</th>
      					<th scope="col">Dv Visita</th>
     					<th scope="col">Fecha</th>
      					<th scope="col">Hora</th>
      				</tr>
  				</thead>
  				<tbody>
  				<?php

  				$consulta=consultarvis1parque($id_parque);

  				while ($valores=mysqli_fetch_assoc($consulta)) {

  				echo"
    				<tr>
      					<th scope='row'>".$valores['nombre_vis']." </th>
      					<td>".$valores['rut_vis']."</td>
      					<td>".$valores['dv_vis']."</td>
      					<td>".$valores['fecha_vis']."</td>
      					<td>".$valores['hora_vis']."</td>
    				</tr>
    				";
    				}
?>
  				</tbody>
			</table>
 		</div>	


	</div>
	
</body>
</html>