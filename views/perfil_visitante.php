<?php require_once "include/head_visitante.php"; ?>
<?php require_once "../model/bd.php"; ?>
<?php 
$_SESSION['usuario'];
$_SESSION['password'];
 ?>
 	<div class="row">
 		<div class="col-md-8">
 			<div class="jumbotron jumbotron-fluid">
  				<div class="container">
    				<p class="lead">Nombre:[nombre del brea]</p>
    				<p class="lead">Apellidos:[apellidos  del brea]</p>
    				<p class="lead">Rut:[rut del brea]</p>
    				<p class="lead">Nacionalidad:[pais del brea]</p>
    				<p class="lead">Fecha de nacimiento:[cuando nacio el brea]</p>
    				<p class="lead">Sexo:[sexo del brea]</p>
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
  				$consulta=mysqli_query($db,$sel);

				while ($valores = mysqli_fetch_array($consulta)) {
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