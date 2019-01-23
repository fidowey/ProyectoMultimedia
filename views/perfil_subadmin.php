<?php require_once "../model/bd.php"; ?>
<?php require_once "include/head_subadmin.php";

session_start();

$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_parque=$_SESSION['place'];

?>


 	<div class="row">
 		<div class="col-md-8">
 			<div class="jumbotron jumbotron-fluid">
  				<div class="container">
  					
            <?php 
  						$consulta=consultarfuncionario($email,$password);
  					 while ($valores=mysqli_fetch_assoc($consulta)){
  					 echo"
    				<p class='lead'>Nombre: ".$valores['nombre_func']."</p>
    				<p class='lead'>Apellidos: ".$valores['appat_func']." ".$valores['apmat_func']."</p>
    				<p class='lead'>Rut: ".$valores['rut_func']."-".$valores['dv_func']."</p>
    				";
    			}
    				?>
  				</div>
			</div>
 		</div>
 		<div class="col-md-2"></div>
 	</div>
<?php require_once "include/footer_visitante.php"; ?>