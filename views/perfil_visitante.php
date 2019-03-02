<?php require_once "../model/bd.php"; ?>
<?php require_once "include/head_visitante.php";

session_start();
$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_cuenta=$_SESSION['idcuenta'];

?>




  				<div class="container">
              <div class="row">
            <div class="col-md-6">
  					<?php 
  						$consulta=cosultarvisitante($email,$password);
  					 while ($valores=mysqli_fetch_assoc($consulta)){

            $img=$valores['img_vis'];

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
            <div class="col-md-6">
              <img src="<?php echo $img; ?>" class="img-circle" alt="profile-pic" width="304" height="236">
            </div>
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