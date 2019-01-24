<?php require_once "include/head_views.php"; ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

<!--Facebook -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v3.2';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



  
</body>
</html>

  <div class="row">
    <div class="col-md-4">
		<img src="include/img/forestin.png" class="img-fluid rounded mx-auto d-block" >
    </div>
    <div class="col-md-4">
		<form action="correo.php" method= "POST">
    		<div class="form-group">
      			<label >Nombre</label>
      			<input type="text"  class="form-control" name="nombre">
    		</div>
    		<div class="form-group">
      			<label >Direccion</label>
      			<input type="text"  class="form-control" name="direccion">
    		</div>
    		<div class="form-group">
      			<label >Telefono</label>
      			<input type="text"  class="form-control" name="telefono">
    		</div>
    		<div class="form-group">
      			<label >Email</label>
      			<input type="text"  class="form-control" name="email" >
    		</div>
    		<div class="form-group">
      			<label >Motivo de consulta</label>
      			<select  class="form-control" name="motivo">
        		<option>sugerencia</option>
        		<option>consulta</option>
        		<option>reclamo</option>
      			</select>
    		</div>
        <div class="form-group">
            <label >Parque</label>
            <select  class="form-control" name="parque">
            <option>Laguna El Peral</option>
            <option>Parque Nacional La Campana</option>
            <option>Lago Peñuelas</option>
            </select>
        </div>
			<div class="form-group">
    			<label for="exampleFormControlTextarea1">Mensaje</label>
    			<textarea class="form-control" name="mensaje" rows="3"></textarea>
  			</div>
    <button type="submit" class="btn btn-primary">Enviar</button>
</form>
    </div>

    <div class="col-md-4">
		<img src="include/img/conaf.jpg" class="img-fluid rounded mx-auto d-block" >
    <br />
    <h2>Redes Sociales</h2>
    <br /> 

    <!-- Facebook -->
    <div class="fb-like" data-href="https://www.facebook.com/CONAF/" data-layout="box_count" data-action="like" data-size="large" data-show-faces="true" data-share="true"></div>
    <br /> <br />

    <!-- Youtube -->
    <script src="https://apis.google.com/js/platform.js"></script>
    <div class="g-ytsubscribe" data-channel="conafchile" data-layout="full" data-count="default"></div>
    <br /> <br />
    <!-- Twitter -->
    <a href="https://twitter.com/conaf_minagri?ref_src=twsrc%5Etfw" class="twitter-follow-button" data-show-count="false">Follow @conaf_minagri</a><script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>


    </div>
  </div>
	




<?php require_once "include/footer_views.php"; ?>