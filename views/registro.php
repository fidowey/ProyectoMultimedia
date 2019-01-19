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
			<form>
  				<div class="form-row">
    				<div class="form-group col-md-8">
      					<label for="inputCity">Rut</label>
      					<input type="text" class="form-control" id="inputCity">
      					<small id="emailHelp" class="form-text text-muted">Ingrese rut sin digito verificador</small>
    				</div>

    				<div class="form-group col-md-4">
      					<label for="inputState">Digito verificador</label>
      					<select id="inputState" class="form-control">
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
    				<input type="text" class="form-control" >
  				</div>
  				<div class="form-group">
    				<label >Apellido Paterno </label>
    				<input type="text" class="form-control" >
  				</div>
  				<div class="form-group">
    				<label >Apellido Materno </label>
    				<input type="text" class="form-control" >
  				</div>
  				<div class="form-group">
    				<label >Fecha de nacimiento </label>
    				<input type="text" class="form-control" placeholder="dd-mm-aaaa" >
  				</div>
  				<div class="form-group ">
      					<label for="inputState">Sexo</label>
      					<select id="inputState" class="form-control">
        				<option selected>hombre</option>
        				<option>mujer</option>
      					</select>
    			</div>
    			<div class="form-group">
    				<label >Telefono </label>
    				<input type="text" class="form-control" >
  				</div>
  				<div class="form-group">
    				<label for="exampleInputEmail1">Email </label>
    				<input type="email" class="form-control" id="exampleInputEmail1" >
    				<small id="emailHelp" class="form-text text-muted">No compartiremos tu informacion con terceros</small>
  				</div>
  				<div class="form-group">
    				<label for="exampleInputPassword1">Contraseña</label>
    				<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
  				</div>
  				<small id="emailHelp" class="form-text text-muted">
  				los campos destacados en amarillo seran para tu inicio de sesion </small>
  				<div class="form-group">
    				<label for="exampleFormControlFile1">Imagen</label>
    				<input type="file" class="form-control-file" id="exampleFormControlFile1">
    			</div>
  				<div class="form-group form-check">
    				<input type="checkbox" class="form-check-input" id="exampleCheck1">
    				<label class="form-check-label" for="exampleCheck1">Check </label>
  				</div>
  				
  				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
<?php require_once "include/footer_views.php"; ?>