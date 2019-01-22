<?php require_once "include/head_views.php"; ?>


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
    </div>
  </div>
	


<?php require_once "include/footer_views.php"; ?>