<?php 
  include_once "include/bootstrap_link_views.php";?>

	<!DOCTYPE html>
	<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<title></title>
	</head>
	<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<img src="include/img/conaf_logo2.png" class="img-fluid rounded mx-auto d-block"  alt="conaf_logo2">
			</div>
			<div class="col-md-6" >
        <p class="text-center"><h1>BIENVENIDO </h1></p>				
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
                <a class="nav-link text-center" href="/ProyectoMultimedia/views/perfil_subadmin.php"> Ver tu perfil  </a>
              </li>
      				<li class="nav-item active">
        				<a class="nav-link text-center" href="/ProyectoMultimedia/views/historial_visitas.php">	Ver historial visitas		</a>
      				</li>
      				<li class="nav-item ">
        				<a class="nav-link text-center" href="/ProyectoMultimedia/views/control_visitas_subadmin.php">	Editar visitantes	</a>
      				</li>
      				<li class="nav-item">
        				<a class="nav-link text-center" href="/ProyectoMultimedia/views/registrar_usuarios.php">	Registrar personal	</a>
      				</li>
    			</ul>
          <!-- Button trigger modal -->
          <button type="button" onclick="window.location.href='../controller/cerrar_sesion.php'" class="btn btn-primary btn-lg active bg-success" data-toggle="modal" data-target="#exampleModal">
          Cerrar sesion
          </button>
		</nav>