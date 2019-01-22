<?php require_once "include/head_visitante.php"; ?>
	  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
		<form action="correo.php" method= "POST">
  			<div class="form-group">
    			<label >Fecha de visita  </label>
    			<input type="date" class="form-control" placeholder="dd-mm-aaaa" name="fechanac" required>
  			</div>
  	        <div class="form-group">
        	    <label >Hora </label>
          	    <input type="text" class="form-control" name="pasaporte">
            </div>
       		<div class="form-group">
       		    <label >Parque</label>
            	<select  class="form-control" name="parque">
            		<option>Laguna El Peral</option>
            		<option>Parque Nacional La Campana</option>
            		<option>Lago Peñuelas</option>
            	</select>
        	</div>
    <button type="submit" class="btn btn-primary">Agendar</button>
</form>
    </div>
    <div class="col-md-4">
    </div>
  </div>
	

<?php require_once "include/footer_visitante.php"; ?>