<?php
require_once('include/bootstrap_link_views.php');
require_once "../model/bd.php";
session_start();

$email=$_SESSION['usuario'];
$password=$_SESSION['password'];

$rut=$_REQUEST['rut'];
?>

  <script src="include/js/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>

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
            <small class="form-text text-muted">Editar trabajador </small>

            <?php 
            $sql=consultarpareditar($rut);
             while ($valores=mysqli_fetch_assoc($sql)){

             ?>
      <form action="../controller/edit_user.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="rut" value="<?php echo $valores['rut_func']; ?>" >
          <div class="form-group">
            <label for="nombre" >Nombre * </label>
            <input type="text" class="form-control " value="<?php echo $valores['nombre_func']; ?>" name="nombre" id="nombre" required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
          </div>
          <div class="form-group">
            <label for="appat" >Apellido Paterno *</label>
            <input type="text" class="form-control" name="appat" value="<?php echo $valores['appat_func']; ?>" id="appat" required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
          </div>
          <div class="form-group">
            <label for="apmat">Apellido Materno * </label>
            <input type="text" class="form-control" name="apmat" value="<?php echo $valores['apmat_func']; ?>" id="apmat" required pattern="([A-Za-z]{3,})"
            title="No uses caracteres inválidos como números o signos">
          </div>

          <div class="form-group">
             <input type="radio" name="privilegio" value="1"  <?php echo ($valores['privilegio'] == "1" ? 'checked="checked"': ''); ?> onclick="hidepark()"> administrador <br>
             <input type="radio" name="privilegio" value="2" <?php echo ($valores['privilegio'] == "2" ? 'checked="checked"': ''); ?> onclick="showpark()"> subadministrador <br>
             <input type="radio" name="privilegio" value="3" <?php echo ($valores['privilegio'] == "3" ? 'checked="checked"': ''); ?> onclick="showpark()"> usuario <br>
          </div>
          <div class="form-group" id="park" style="display:none;">
            <select name="id_parque">
            <option value="1">CERRO LA CAMPANA</option>
            <option value="2">LAGO PEÑUELAS</option>
            <option value="3">EL PERAL</option>
            </select>

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
              <input type="file" name="img" id="img" value="<?php echo $valores['appat_func']; ?>" accept="image/*">
            </div>
          <div class="form-group">
            <label >Telefono * </label>
            <input type="text" class="form-control" value="<?php echo $valores['telefono_func']; ?>" name="telefono" required pattern="[0-9]{7,}">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email * </label>
            <input type="email" class="form-control" id="exampleInputEmail1" value="<?php echo $valores['email_func']; ?>" name="email" required>
            <small id="emailHelp" class="form-text text-muted">No compartiremos tu informacion con terceros</small>
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">password * </label>
            <input type="password" class="form-control" value="<?php echo $valores['pass_func']; ?>" id="exampleInputEmail1" name="password" required>
          </div>
          <input type="hidden" name="estadocuenta" value="1">
          <input type="hidden" name="estadofunc" value="1">
          <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
    <div class="col-md-3"></div>
  </div>

  <?php 
}

   ?>

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
</script>

 <script type="text/javascript">
  function showpark() {
  // Get the checkbox
  document.getElementById('park').style.display = 'block';
}
</script>

 <script type="text/javascript">
  function hidepark() {
  // Get the checkbox
  document.getElementById('park').style.display = 'none';
}
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


<?php require_once "include/footer_views.php"; ?>