<?php require_once "../model/bd.php"; ?>
<?php require_once "include/head_subadmin.php";

session_start();

$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_parque=$_SESSION['place'];
$privilegio=$_SESSION['privilegio'];

switch ($id_parque) {
  case '1':
    $id_parque="CERRO LA CAMPANA";
    break;
  case '2':
    $id_parque="EL PERAL";
    break;
  case '3':
    $id_parque="EL TABO";
    break;
  
  default:
    # code...
    break;
}


?>

<div class="container">
 	<div class="row">
 		<div class="col-md-6">
            <?php 
  						$consulta=consultarfuncionario($email,$password);
  					 while ($valores=mysqli_fetch_assoc($consulta)){
              $imagen=$valores['img_func'];
  					 echo"
    				<p class='lead'>Nombre: ".$valores['nombre_func']."</p>
    				<p class='lead'>Apellidos: ".$valores['appat_func']." ".$valores['apmat_func']."</p>
    				<p class='lead'>Rut: ".$valores['rut_func']."-".$valores['dv_func']."</p>
            <p class='lead'>Parque asignado: ".$id_parque."</p>
    				";
    			}
    				?>
  	</div>
    <div class="col-md-6">

      <img src="<?php echo $imagen; ?>" class="img-circle" alt="profile-pic" width="304" height="236">

    </div>
 		</div>
 		<div class="col-md-2"></div>
 	</div>
<?php require_once "include/footer_visitante.php"; ?>