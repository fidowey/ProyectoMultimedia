<?php require_once "include/head_views.php"; ?>

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
            <p class="font-weight-bold text-center text-success">
        Si eres un visitante nuevo que está en busca de aventuras no dudes en agendar una visita por aca. Debes registrarte para poder llevar un historial de visitas .Si no nos visitas por primera vez no olvides en iniciar sesion 
           </p>
            <small class="form-text text-muted">Por favor complete los campos con asterisco para crear su cuenta </small>
			<form action="../controller/generar_pdf.php" method="POST">
  				<div class="form-row">
    				<div class="form-group ">
      					<label for="inputCity">Rut</label>
      					<input type="text" class="form-control" id="inputCity" name="rut" pattern="[0-9]{0,7,8}">
      					<small id="emailHelp" class="form-text text-muted">Ingrese rut sin digito verificador</small>
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
            <div class="form-group">
            <label >Direccion * </label>
            <input type="text" class="form-control" name="direccion" required">
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
  				<button type="submit" class="btn btn-primary">Submit</button>
			</form>
		</div>
		<div class="col-md-3"></div>
	</div>
<?php require_once "include/footer_views.php"; ?>