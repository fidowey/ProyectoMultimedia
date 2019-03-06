
<p>
<?php 
require_once('include/head_admin.php');
require_once'include/bootstrap_link_views.php';
 require_once'../model/bd.php';

 session_start();

$email=$_SESSION['usuario'];
$password=$_SESSION['password'];

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
          <button type="button" class="btn-secondary" data-toggle="modal" data-target="#exampleModal"> Ver ficha </button>

          <!-- Modal -->
          <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ficha de Funcionario</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">


                <?php

                echo $idcomparador;
 
                  switch ($valores["id_cargo"]) {
                    case '1':
                      $id_parque="CONTROL TOTAL";
                      $privilegio="ADMINISTRADOR GENERAL";
                      break;

                    case '2':
                      $id_parque="CONTROL TOTAL";
                      $privilegio="SUBADMINISTRADOR DE PARQUE";
                      break;

                    case '3':
                      $id_parque=$valores["id_parque"];
                      $privilegio="EMPLEADO";
                      break;
                  }

                  echo "NOMBRE DEL FUNCIONARIO: ". $valores["nombre_func"]."<br>";
                  echo "APELLIDO PATERNO DEL FUNCIONARIO: ". $valores["appat_func"]."<br>";
                  echo "APELLIDO MATERNO DEL FUNCIONARIO: ". $valores["apmat_func"]."<br>";
                  echo "NUMERO DE TELEFONO DEL FUNCIONARIO: ". $valores["telefono_func"]."<br>";
                  echo "CARGO DEL FUNCIONARIO: ". $privilegio ."<br>";
                  echo "<img lenght=150 width=150 src=".$valores["img_func"].">";

                                          
                 ?>   
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin del modal -->
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
Usuarios Bloqueados
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
                  <td><b>estado funcionario</b></td>
                  <td><b>Nivel</b></td>
                  <td><b>Funciones</b></td></tr> \n"; 
   do { 
     $idcomparador=$valores['rut_func'];
      echo "<tr><td>".$valores["rut_func"]."</td>
        <td>".$valores["dv_func"]."</td>
        <td>".$valores["nombre_func"]."</td>
        <td>".$valores["appat_func"]."</td>
        <td>".$valores["apmat_func"]."</td>
        <td>".$valores["email_func"]."</td>
        <td>".$valores["estado_func"]."</td>
        <td>".$valores["privilegio"]."</td>
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

