<?php require_once "include/head_views.php"; ?>

	<div class="row">
		<div class="col-md-4"></div>
		<div class="col-md-4">	
			<img src="include/img/conaf.jpg" class="img-fluid rounded mx-auto d-block" >
			<small class="form-text text-muted">Por favor complete los campos con asterisco para crear su cuenta </small>
		</div>
		<div class="col-md-4"></div>
	</div>
	<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
			<form action="../controller/registroUsuario.php" method="POST">
  				<div class="form-row">
    				<div class="form-group col-md-8">
      					<label for="inputCity">Rut</label>
      					<input type="text" class="form-control" id="inputCity" name="rut" pattern="([0-9]{0,7,8}>
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
    				<label >Fecha de nacimiento * </label>
    				<input type="date" class="form-control" placeholder="dd-mm-aaaa" name="fechanac" required>
  				</div>
  				<div class="form-group ">
      					<label for="inputState">Sexo *</label>
      					<select id="inputState" class="form-control" name="sexo">
        				<option value="M" selected>Masculino</option>
        				<option value="F" >Femenino</option>
      					</select>
    			</div>
    			<div class="form-group">
    				<label >Telefono * </label>
    				<input type="text" class="form-control" name="telefono" required pattern="[0-9]{7,}">
  				</div>
          <div class="form-group">
          <label >Numero Pasaporte </label>
          <input type="text" class="form-control" name="pasaporte">
          </div>
  				<div class="form-group">
    				<label for="exampleInputEmail1">Email * </label>
    				<input type="email" class="form-control" id="exampleInputEmail1" name="email" required>
    				<small id="emailHelp" class="form-text text-muted">No compartiremos tu informacion con terceros</small>
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
 <script src="include/js/validar.js"></script>
<?php require_once "include/footer_views.php"; ?>