<?php 
session_start();

$email=$_SESSION['usuario'];
$password=$_SESSION['password'];
$id_parque=$_SESSION['place'];

?>

<div class="container">
	<form action="../controller/registrarvisita.php" method= "POST">
	<div class="form-group">
		<label> introduzca codigo de barra del visitante </label>
		<input type="text" class="form-control" name="codebar" required>
	</div>
	<div class="form-group">
		<input type="hidden" name="id_parque" value="<?php echo $id_parque; ?>"> 
		<input type="submit" class="btn-primary" value="registrar visita">
	</div> 
</div>