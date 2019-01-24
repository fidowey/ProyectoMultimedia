<?php require_once "../model/bd.php"; ?>
<?php require_once "include/head_visitante.php";

session_start();
$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_cuenta=$_SESSION['idcuenta'];

echo $id_cuenta;

?>



 	<div class="row">
 		<div class="col-md-8">
 			<div class="jumbotron jumbotron-fluid">
  				<div class="container">
  					<?php 
  						$consulta=cosultarvisitante($email,$password);
  					 while ($valores=mysqli_fetch_assoc($consulta)){
  					 echo"
    				<p class='lead'>Nombre: ".$valores['nombre_vis']."</p>
    				<p class='lead'>Apellidos: ".$valores['appat_vis']." ".$valores['apmat_vis']."</p>
    				<p class='lead'>Rut: ".$valores['rut_vis']."-".$valores['dv_vis']."</p>
    				<p class='lead'>Fecha de nacimiento: ".$valores['fecha_nacvis']."</p>
    				<p class='lead'>Sexo: ".$valores['sexo_vis']."</p>
    				";
    			}
    				?>
  				</div>
			</div>
 		</div>
 		<div class="col-md-4"></div>
 	</div>
 	<div class="row">
 		<div class="col-md-2"></div>
 		<div class="col-md-8">
 			<table class="table">
  				<thead>
    				<tr>
      					<th scope="col">ID</th>
     					<th scope="col">Fecha</th>
      					<th scope="col">Hora</th>
      					<th scope="col">Parque</th>
    				</tr>
  				</thead>
  				<tbody>
  				<?php

  				$consulta=consultarvisitas($email,$password);

  				while ($valores=mysqli_fetch_assoc($consulta)) {

  				echo"
    				<tr>
      					<th scope='row'>".$valores['id_vis']." </th>
      					<td>".$valores['fecha_vis']."</td>
      					<td>".$valores['hora_vis']."</td>
      					<td>".$valores['nombre_parque']."</td>
    				</tr>
    				";
    				}
?>
  				</tbody>
			</table>
 		</div>
 		<div class="col-md-2"></div>
 	</div>
<?php require_once "include/footer_visitante.php"; ?>