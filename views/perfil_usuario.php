

<?php require_once "../model/bd.php"; ?>
<?php require_once "include/head_user.php";

session_start();

$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_parque=$_SESSION['place'];

?>


 	<div class="row">
 		<div class="col-md-6">
  					
            <?php 
  						$consulta=consultarfuncionario($email,$password);
              $i=0;

              for ($i=0; $i<1 ; $i++) { 
                # code...
                $valores=mysqli_fetch_assoc($consulta);

                 $img=$valores['img_func'];
                 echo"
            <p class='lead'>Nombre: ".$valores['nombre_func']."</p>
            <p class='lead'>Apellidos: ".$valores['appat_func']." ".$valores['apmat_func']."</p>
            <p class='lead'>Rut: ".$valores['rut_func']."-".$valores['dv_func']."</p>
            ";
              }

    				?>
 		</div>

    <div class="col-md-6">
    <img src="<?php echo $img; ?>" class="img-circle" alt="profile-pic" width="304" height="236">
    </div>
 		<div class="col-md-2"></div>
 	</div>
<?php require_once "include/footer_views.php"; ?>
  </div>