<?php require_once "include/head.php"; ?>

	<div class="container">
		<div class="row">
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="views/include/img/el-peral.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title"> Laguna El Peral</h5>
						<p class="card-text"> temperatura: </p>
						<p class="card-text"> Humedad: </p>
						<a href="/ProyectoMultimedia/views/peral.php" class="btn btn-primary">Ver mas</a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="views/include/img/la-campana.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Parque Nacional La Campana</h5>
						<p class="card-text"> Temperatura: <span id="tempVal"></span></p>
						<p class="card-text"> Humedad: <span id="uptimeVal"></span></p>
						<a href="/ProyectoMultimedia/views/campana.php" class="btn btn-primary">Ver mas </a>
					</div>
				</div>
			</div>
			<div class="col-md-4">
				<div class="card">
					<img class="card-img-top" src="views/include/img/peñuela.jpg" alt="Card image cap">
					<div class="card-body">
						<h5 class="card-title">Lago Peñuelas</h5>
						<p class="card-text"> Temperatura: 25°</p>
						<p class="card-text"> Humedad: </p>
						<a href="/ProyectoMultimedia/views/peñuelas.php" class="btn btn-primary">Ver mas</a>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php require_once "include/footer.php"; ?>