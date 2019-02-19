<?php 
require_once("include/bootstrap_link_views.php");
require_once'../model/bd.php';

session_start();
$email=$_SESSION['usuario'];
$password=$_SESSION['password'];


$cod_vis=$_REQUEST['cod_vis'];

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editor de visitas</title>
</head>
<body>
	<div class="container">

<?php
		 $sql=consultar1vis($cod_vis);
             while ($valores=mysqli_fetch_assoc($sql)){
?>

				<form action="../controller/edit_vis.php" method="POST">
  				<div class="form-row">
    				<div class="form-group ">
      					<label for="inputCity">Rut</label>
      					<input type="text" class="form-control" id="inputCity" name="rut" value="<?php echo $valores['rut_vis']; ?>" pattern="[0-9]{0,7,8}">
      					<small id="emailHelp" class="form-text text-muted">Ingrese rut sin digito verificador</small>
    				</div>
    			</div>
    			<div class="form-group">
    				<label >Nombre * </label>
    				<input type="text" class="form-control " name="nombre" value="<?php echo $valores['nombre_vis']; ?>" required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
  				<div class="form-group">
    				<label >Apellido Paterno *</label>
    				<input type="text" class="form-control" name="appat" value="<?php echo $valores['appat_vis']; ?>"required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
  				<div class="form-group">
    				<label >Apellido Materno * </label>
    				<input type="text" class="form-control" name="apmat" value="<?php echo $valores['apmat_vis']; ?>"required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
  				<div class="form-group">
    				<label >Fecha de nacimiento * </label>
    				<input type="date" class="form-control" value="<?php echo $valores['fecha_nacvis']; ?>" name="fechanac" required>
  				</div>
            <div class="form-group">
            <label >Direccion * </label>
            <input type="text" class="form-control" value="<?php echo $valores['dir_vis']; ?>" name="direccion" required">
          </div>
  				<input type="hidden" value="<?php echo $valores['sexo_vis']; ?>">
    			<div class="form-group">
    				<label >Telefono * </label>
    				<input type="text" class="form-control" name="telefono" value="<?php echo $valores['telefono_vis']; ?>" required pattern="[0-9]{7,}">
  				</div>
          <div class="form-group">
          <label >Numero Pasaporte </label>
          <input type="text" class="form-control" value="<?php echo $valores['pasaporte']; ?>" name="pasaporte">
          </div>
  				<div class="form-group">
    				<label for="exampleInputEmail1">Email * </label>
    				<input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $valores['email_vis']; ?>" name="email" required>
    				<small id="emailHelp" class="form-text text-muted">No compartiremos tu informacion con terceros</small>
  				</div>
  				<button type="submit" class="btn btn-primary">Modificar</button>
			</form>
</div>
<?php } ?>
	
</body>
</html>