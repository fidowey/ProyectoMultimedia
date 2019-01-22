<?php require_once "include/head_visitante.php"; ?>
	<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
		<form action="correo.php" method= "POST">

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
    		<button type="submit" class="btn btn-primary">Editar</button>
		</form>
    </div>
    <div class="col-md-4">

    </div>
  </div>
	
<?php require_once "include/footer_visitante.php"; ?>