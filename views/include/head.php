	<?php include_once "bootstrap_link.php"; ?>
	<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title></title>

	</head>
	<body>
	<div class="container">
		<div class="row">
			<div id="margen" class="col-12">
				<br>
				<br>
				<br>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<img src="views/include/img/conaf_logo2.png" class="img-responsive" width="369" height="128" alt="conaf_logo2">
			</div>
			<div class="col-6" style="text-align: center;">
				<br>
			<p><h1>BIENVENIDO</h1></p>
			<br>				
			</div>
			<div class="col-3"></div>
		</div>
		</div>
		<nav class="navbar navbar-expand-lg navbar-light bg-light">
  			<button class="navbar-toggler " type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
  			</button>
  			<div class="collapse navbar-collapse bg-info" id="navbarSupportedContent">
    			<ul class="navbar-nav mr-auto text-center ">
      				<li class="nav-item active">
        				<a class="nav-link text-center" href="index.php">	Inicio		</a>
      				</li>
      				<li class="nav-item ">
        				<a class="nav-link text-center" href="/ProyectoMultimedia/views/contacto.php">	Contacto	</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link text-center" href="#">	Nosotros	</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link text-center " href="#">	Visitanos	</a>
      				</li>
    			</ul>
				<!-- Button trigger modal -->
          <button type="button" class="btn btn-primary btn-lg active bg-success" data-toggle="modal" data-target="#exampleModal">
          Iniciar sesion
          </button>
          <!-- Modal -->
          <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Inicio de sesion</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Email</label>
                      <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                      <small id="emailHelp" class="form-text text-muted">No compartiremos tu informacion con terceros</small>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Contraseña</label>
                      <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <div class="form-group form-check">
                      <input type="checkbox" class="form-check-input" id="exampleCheck1">
                      <label class="form-check-label" for="exampleCheck1">Check</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar sesion</button>
                  </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <a href="/ProyectoMultimedia/views/registro.php" class="btn btn-primary btn-lg active bg-success" role="button" aria-pressed="true">Registrarse</a>
                </div>
              </div>
            </div>
          </div>
		</nav>
