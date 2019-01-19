<?php require_once "include/head_views.php"; ?>

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">	
			<img src="include/img/conaf.jpg" class="img-fluid rounded mx-auto d-block" >
			<small class="form-text text-muted">Por favor complete los campos para crear su cuenta </small>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form action="../model/bd.php" method="POST" onsubmit="return validarR();">
  				<div class="form-row">
    				<div class="form-group col-md-8">
      					<label for="inputCity">Rut</label>
      					<input type="number" class="form-control" id="inputCity" name="rut">
      					<small id="emailHelp" class="form-text text-muted">Ingrese rut sin digito verificador</small>
    				</div>

    				<div class="form-group col-md-4">
      					<label for="inputState">Digito verificador</label>
      					<select id="inputState" class="form-control" name="dv">
        				<option selected>0</option>
        				<option>1</option>
        				<option>2</option>
        				<option>3</option>
        				<option>4</option>
        				<option>5</option>
        				<option>6</option>
        				<option>7</option>
        				<option>8</option>
        				<option>9</option>
        				<option>K</option>
      					</select>
    				</div>
    			</div>
    			<div class="form-group">
    				<label >Nombre </label>
    				<input type="text" class="form-control " name="nombre" required>
  				</div>
  				<div class="form-group">
    				<label >Apellido Paterno </label>
    				<input type="text" class="form-control" name="appat" required>
  				</div>
  				<div class="form-group">
    				<label >Apellido Materno </label>
    				<input type="text" class="form-control" name="apmat" required>
  				</div>
  				<div class="form-group">
    				<label >Fecha de nacimiento </label>
    				<input type="date" class="form-control" placeholder="dd-mm-aaaa" required>
  				</div>
  				<div class="form-group ">
      					<label for="inputState">Sexo</label>
      					<select id="inputState" class="form-control" name="sexo">
        				<option selected>hombre</option>
        				<option>mujer</option>
      					</select>
    			</div>
    			<div class="form-group">
    				<label >Telefono </label>
    				<input type="text" class="form-control" required>
  				</div>
  				<div class="form-group">
    				<label for="exampleInputEmail1">Email </label>
    				<input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
    				<small id="emailHelp" class="form-text text-muted">No compartiremos tu informacion con terceros</small>
  				</div>
  				<small id="emailHelp" class="form-text text-muted">
  				los campos destacados en amarillo seran para tu inicio de sesion </small>
  				<div class="form-group form-check">
    				<input type="checkbox" class="form-check-input" id="exampleCheck1">
    				<label class="form-check-label" for="exampleCheck1">Check </label>
  				</div>
  				
  				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
 <script src="include/js/validar.js"></script>
<?php require_once "include/footer_views.php"; ?>