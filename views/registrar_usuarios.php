<?php require_once "include/head_subadmin.php";
session_start();

$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_parque=$_SESSION['place'];?>

 <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>

  <!-- CropSelectJs files -->
  <link href="include/css/crop-select-js.min.css" rel="stylesheet" type="text/css" />
  <script src="include/js/crop-select-js.min.js"></script>

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">	
			<img src="include/img/conaf.jpg" class="img-fluid rounded mx-auto d-block" >
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
            <small class="form-text text-muted">Por favor complete los campos con asterisco para crear su cuenta </small>
			<form action="../controller/registropersonal.php" method="POST" enctype="multipart/form-data">
  				<div class="form-row">
    				<div class="form-group ">
      					<label for="inputCity">Rut</label>
      					<input type="text" class="form-control" id="inputCity" name="rut" required pattern="[0-9]{7,8}">
      					<small id="emailHelp" class="form-text text-muted">Ingrese rut sin digito verificador</small>
    				</div>
    			</div>
    			<div class="form-group">
    				<label >Nombre * </label>
    				<input type="text" class="form-control " name="nombre" required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
  				<div class="form-group">
    				<label >Apellido Paterno *</label>
    				<input type="text" class="form-control" name="appat" required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
  				<div class="form-group">
    				<label >Apellido Materno * </label>
    				<input type="text" class="form-control" name="apmat" required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
            <div class="form-group">
            <label >Imagen * </label>
            <input type="file" name="img" class="form-control-file" id="img" accept="image/*" required>
          </div>
      		<input type="hidden" name="privilegio" value="3">
    			<div class="form-group">
    				<label >Telefono * </label>
    				<input type="text" class="form-control" name="telefono" required pattern="[0-9]{7,}">
  				</div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email * </label>
            <input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
            <small id="emailHelp" class="form-text text-muted">No compartiremos tu informacion con terceros</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">password * </label>
            <input type="password" class="form-control" id="exampleInputEmail1" name="password" required>
          </div>
          <input type="hidden" name="id_parque" value="<?php echo"$id_parque"; ?>">
          <input type="hidden" name="estadocuenta" value="1">
          <input type="hidden" name="estadofunc" value="1">
  				<button type="submit" class="btn btn-primary">Submit</button>
          </form>
		</div>
		<div class="col-md-3"></div>
	</div>


<?php require_once "include/footer_views.php"; ?>