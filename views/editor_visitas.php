<?php 
require_once("include/bootstrap_link_views.php");
require_once'../model/bd.php';

session_start();
$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$privilegio=$_SESSION['privilegio'];

switch ($privilegio) {
  case '1':
    # code
  require_once("include/head_admin.php");
    break;
  case '2':
    # code
  require_once("include/head_subadmin.php");
    break;
  
    case '3':
    # code
  require_once("include/head_user.php");
    break;

}




 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Editor de visitas</title>
  <script src="include/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
</head>
<body>
	<div class="container">

<?php
$cod_vis=$_REQUEST['cod_vis'];
		 $sql=consultar1vis($cod_vis);
             while ($valores=mysqli_fetch_assoc($sql)){
?>

				<form action="../controller/edit_vis.php" method="POST" enctype="multipart/form-data">
  				<div class="form-row">
    				<div class="form-group ">
                <input type="hidden" name="cod_vis" value="<?php echo($cod_vis); ?>">
      					<label for="rut">Rut</label>
      					<input type="text" class="form-control" id="rut" name="rut" value="<?php echo $valores['rut_vis']; ?>" pattern="[0-9]{0,7,8}">
      					<small id="emailHelp" class="form-text text-muted">Ingrese rut sin digito verificador</small>
    				</div>
    			</div>
    			<div class="form-group">
    				<label for="nombre" >Nombre * </label>
    				<input type="text" id="nombre" class="form-control " name="nombre" value="<?php echo $valores['nombre_vis']; ?>" required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
  				<div class="form-group">
    				<label for="appat" >Apellido Paterno *</label>
    				<input type="text" id="appat" class="form-control" name="appat" value="<?php echo $valores['appat_vis']; ?>"required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
  				<div class="form-group">
    				<label for="apmat" >Apellido Materno * </label>
    				<input type="text" id="apmat" class="form-control" name="apmat" value="<?php echo $valores['apmat_vis']; ?>"required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
  				</div>
  				<div class="form-group">
    				<label for="fechanac" >Fecha de nacimiento * </label>
    				<input type="date" id="fechanac" class="form-control" value="<?php echo $valores['fecha_nacvis']; ?>" name="fechanac" required>
  				</div>
            <div class="form-group">
            <label for="direccion" >Direccion * </label>
            <input type="text" id="direccion" class="form-control" value="<?php echo $valores['dir_vis']; ?>" name="direccion" required">
          </div>
  				<input type="hidden" value="<?php echo $valores['sexo_vis']; ?>">
    			<div class="form-group">
    				<label for="telefono" >Telefono * </label>
    				<input type="text" class="form-control" name="telefono" id="telefono" value="<?php echo $valores['telefono_vis']; ?>" required pattern="[0-9]{7,}">
  				</div>
          <div class="form-group">
          <label for="pasaporte" >Numero Pasaporte </label>
          <input type="text" id="pasaporte" class="form-control" value="<?php echo $valores['pasaporte']; ?>" name="pasaporte">
          </div>
  				<div class="form-group">
    				<label for="email">Email * </label>
    				<input type="email" class="form-control" id="email" value="<?php echo $valores['email_vis']; ?>" name="email" required>
    				<small id="emailHelp" class="form-text text-muted">No compartiremos tu informacion con terceros</small>
  				</div>

  				<div class="form-group">

          <input type="radio" name="tipo_vis" value="esporadico" <?php echo ($valores['tipo_vis'] == "esporadico" ? 'checked="checked"': ''); ?> onclick="dontshowMe()" /> Esporadico<br>
          <input type="radio" name="tipo_vis" value="frecuente" <?php echo ($valores['tipo_vis'] == "frecuente" ? 'checked="checked"': ''); ?> onclick="showMe()" /> Frecuente<br>
  				</div>

  	<div class="form-group" id="frecuente" style="display:none;">
		<div class="form-group">
      <input type="hidden" name="est_cuenta" value="1">
  		<label for="password" >Password * </label>
      <input type="password" id="password" class="password" name="password" placeholder="password" id="password">
      	</div>
    <div class="form-group">

          <input type="radio" name="imgck" value="file" onclick="showfile()" checked/> Subir foto por archivo <br>
         <input type="radio" name="imgck" value="camera" onclick="showcamera()"> Subir foto por webcam <br>
          </div>
          <div class="form-group" id="camera" style="display:none;">
                <div id="my_camera">foto</div>
                <br/>
                <input type=button name="imgcam" id="imgcam" value="Tomar Foto" onClick="take_snapshot()">
                <input type="hidden" name="image" class="image-tag">
                <div class="col-md-6">
                <div id="results"></div>
            </div>
            </div>
            
            <div class="form-group" id="file">
              <input type="file" name="img" id="img" >
            </div>
            </div>
            
            <div class="form-group">

          <textarea name="comentario" id="" cols="30" rows="10"  value="<?php echo($valores['comentario']); ?>"></textarea>
          </div>
  				<button type="submit" class="btn btn-primary">Modificar</button>
			</form>
	
</div>
<?php } ?>


 <script type="text/javascript">
  function dontshowMe() {
  // Get the checkbox
  document.getElementById('frecuente').style.display = 'none';
}
  //-->
</script>


 <script type="text/javascript">
 	function showMe() {
  // Get the checkbox
  document.getElementById('frecuente').style.display = 'block';
}
  //-->
</script>

 <script type="text/javascript">
  function showcamera() {
  // Get the checkbox
  document.getElementById('camera').style.display = 'block';
  document.getElementById('file').style.display = 'none';
}
  //-->
</script>

 <script type="text/javascript">
  function showfile() {
  // Get the checkbox
  document.getElementById('file').style.display = 'block';
  document.getElementById('camera').style.display = 'none';
}
  //-->
</script>



<!-- Configure a few settings and attach camera -->
<script language="JavaScript">
    Webcam.set({
        width: 490,
        height: 390,
        image_format: 'jpeg',
        jpeg_quality: 90
    });
  
    Webcam.attach( '#my_camera' );
  
    function take_snapshot() {
        Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
        } );
    }
</script>
	
</body>
</html>