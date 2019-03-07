
<p>
<?php 
require_once('include/head_admin.php');
require_once'include/bootstrap_link_views.php';
 require_once'../model/bd.php';

session_start();

        $email=$_SESSION['usuario'];
        $password=$_SESSION['password'];
        $privilegio=$_SESSION['privilegio'];
echo "Funcionarios activos";
 $consulta=consultarfuncionarios($email,$password);
                    
          while ($valores = mysqli_fetch_array($consulta)) {

            echo "<table class='table table-hover'>";
            echo "<tr><td><b>Rut</b></td>
                 <td><b>Dv</b></td>
                 <td><b>Nombre</b></td>
                <td><b>Apellido Paterno</b></td>
                <td><b>Apellido Materno</b></td>
                <td><b>Email</b></td>
                <td><b>Funciones</b></td></tr> \n"; 
   do { 
     $idcomparador=$valores['rut_func'];
      echo "<tr><td>".$valores["rut_func"]."</td>
        <td>".$valores["dv_func"]."</td>
        <td>".$valores["nombre_func"]."</td>
        <td>".$valores["appat_func"]."</td>
        <td>".$valores["apmat_func"]."</td>
        <td>".$valores["email_func"]."</td>
        <td>"?>
          <form action="control_usuarios.php" id="desactivar" method="POST">
          <input type="hidden" name= "deactivate" id="deactivate">
          <input type="submit" class="btn-danger" name="botondesactivar" value="Desactivar"> </form>
          <!-- Boton que manda al modal -->
          <form action="ver_ficha_func.php">
            <input type="hidden" name="rut" value="<?php echo $valores['rut_func'] ?>"> 
            <input type="submit" class="secondary" value="Ver Ficha">
          </form>

        <form action="editor_usuarios.php" method="POST">
        <input type="hidden" name="rut" value="<?php echo $valores['rut_func'] ?>"> 
        <input type="submit" class="btn-primary" name="Editar" value="Editar"> </form>
        <?php echo "</td>
        </tr> \n";

       } while ($valores = mysqli_fetch_array($consulta)); 
   echo "</table> \n";
   }
   ?>

</p>
Funcionarios Bloqueados
<?php
      $consulta=consultarfuncionariosbloqueados();
                    
          while ($valores = mysqli_fetch_array($consulta)) {

            echo "<table class='table table-hover'>";
            echo "<tr><td><b>Rut</b></td>
                  <td><b>Dv</b></td>
                  <td><b>Nombre</b></td>
                  <td><b>Apellido Paterno</b></td>
                  <td><b>Apellido Materno</b></td>
                  <td><b>Email</b></td>
                  <td><b>Funciones</b></td></tr> \n"; 
   do { 
     $idcomparador=$valores['rut_func'];
      echo "<tr><td>".$valores["rut_func"]."</td>
        <td>".$valores["dv_func"]."</td>
        <td>".$valores["nombre_func"]."</td>
        <td>".$valores["appat_func"]."</td>
        <td>".$valores["apmat_func"]."</td>
        <td>".$valores["email_func"]."</td>
        <td>"?> <form action="control_usuarios.php" id="activar" method="POST"> <input type="hidden" name= "activate" id="activate">  <input type="submit" class="btn-success" name="botonactivar" value="Activar"> </form> <?php echo "</td>
        </tr> \n";

       } while ($valores = mysqli_fetch_array($consulta)); 
   echo "</table> \n";
   }
   ?>

</p>
</div>

<?php
if(isset($_POST['deactivate'])){

  $activar=mysqli_query($db,"UPDATE PERSONAL SET estado_cta=0, estado_func=0 WHERE rut_func=$idcomparador");

    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=control_usuarios.php">';
}

if(isset($_POST['activate'])){

  $desactivar=mysqli_query($db,"UPDATE PERSONAL SET estado_cta=1, estado_func=1 WHERE rut_func=$idcomparador");

     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=control_usuarios.php">';
}



 ?>
 <a href="../controller/excel_trabajadores.php" target = "blank">
<input type="button"  class="btn-secondary" value="Generar Excel">
</a>
