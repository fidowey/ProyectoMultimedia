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
  <script src="include/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
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
  				<input type="checkbox" name="tipo_vis" id="tipo_vis" value="frecuente" onclick="showMe('frecuente')" />
            	Visitante Frecuente.
  				</div>

  	<div class="form-group" id="frecuente" style="display:none;">
		<div class="form-group">
  		<label for="password" >Password * </label>
      <input type="password" id="password" class="password" name="password" placeholder="password" id="password">
      	</div>
    <div class="form-group">
            tomar foto con webcam
    <input type="checkbox" name="imgck" id="imgck" value="imgck" onclick="showcamera('imgck')" />
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
              <input type="file" name="img" id="img" value="<?php echo $valores['img_vis']; ?>" >
            </div>
            </div>
  				<button type="submit" class="btn btn-primary">Modificar</button>
			</form>
	
</div>
<?php } ?>

 <script type="text/javascript">
 	function showMe() {
  // Get the checkbox
  var tipo_vis = document.getElementById("tipo_vis");
  // Get the output text
  var chboxs = document.getElementById("frecuente").style.display;
  var vis = "none";
        if(tipo_vis.checked==true){
         vis = "block"; }
        if(tipo_vis.checked==false){
         vis = "none"; }
    document.getElementById("frecuente").style.display = vis;
}
  //-->
</script>


 <script type="text/javascript">
 	function showcamera() {
  // Get the checkbox
  var imgck = document.getElementById("imgck");
  // Get the output text
  var checkbox = document.getElementById("camera").style.display;
  var chboxs2 = document.getElementById("file").style.display;
  var vista = "none";
  var vista2= "block";

        if(imgck.checked==true){
         vista = "block";
         vista2 ="none";
         }
        if(imgck.checked==false){
         vista = "none";
         vista2 = "block";
         }

    document.getElementById("camera").style.display = vista;
    document.getElementById("file").style.display = vista2;
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