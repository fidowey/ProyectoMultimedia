<?php require_once "include/head_visitante.php"; ?>
<?php require_once "../model/bd.php"; ?>

	<div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
		<form action="../controller/editarperfil.php" method= "POST">
<?php 
session_start();
$email=$_SESSION['usuario'];
$password=$_SESSION['password'];

 $sql=cosultarvisitante($email,$password);
             while ($valores=mysqli_fetch_assoc($sql)){
?>
    		<div class='form-group'>
          <input type="hidden" name='cod_vis' value="<?php echo $valores['cod_vis']?>">
            <input type="hidden" name='img' value="<?php echo $valores['img_vis']?>">
            <input type="hidden" name='nombre' value="<?php echo $valores['nombre_vis']?>">
            <input type="hidden" name='appat' value="<?php echo $valores['appat_vis']?>">
            <input type="hidden" name='apmat' value="<?php echo $valores['apmat_vis']?>">
            <input type="hidden" name='rut' value="<?php echo $valores['rut_vis']?>">
            <input type="hidden" name='dv' value="<?php echo $valores['dv_vis']?>">
            <input type="hidden" name='fechanac' value="<?php echo $valores['fecha_nacvis']?>">
            <input type="hidden" name='sexo' value="<?php echo $valores['sexo_vis']?>">
            <input type="hidden" name='pasaporte' value="<?php echo $valores['pasaporte']?>">
            <input type="hidden" name='edad' value="<?php echo $valores['edad_vis']?>">
            <input type="hidden" name='tipo_vis' value="<?php echo $valores['tipo_vis']?>">
      			<label >Direccion</label>
            

      			<input type='text'  class='form-control' name='direccion' required value="<?php echo $valores['dir_vis'];?>" required>
    		</div>
    		<div class='form-group'>
      			<label >Telefono</label>
      			<input type='text'  class='form-control' name='telefono' value="<?php echo $valores['telefono_vis'] ;?>" required>
    		</div>
    		<div class='form-group'>
      			<label >Email</label>
      			<input type='text'  class='form-control' name='email' value="<?php echo $valores['email_vis'] ;?>" required >
    		</div>
    		<button type='submit' class='btn btn-primary'>Editar</button>
		</form>
    </div>
    <div class='col-md-4'>

    </div>
  </div>";
<?php 
}



?>
	
<?php require_once "include/footer_visitante.php"; ?>