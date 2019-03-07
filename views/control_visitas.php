

    <p>
        <?php
        session_start();

        $email=$_SESSION['usuario'];
        $password=$_SESSION['password'];
        $privilegio=$_SESSION['privilegio'];


        
        switch ($privilegio) {
          case '1':
            require_once('include/head_admin.php');
            break;

            case '2':
            require_once('include/head_subadmin.php');
            break;

            case '3':
            require_once('include/head_user.php');
            break;
          
          default:
            # code...
            break;
        }

        require_once'../model/bd.php';
        require_once'include/bootstrap_link_views.php';
        echo "Visitantes Frecuentes";
        $consulta=consultarvisfrec();
                    
          while ($valores = mysqli_fetch_array($consulta)) {

            echo "<table class='table table-hover'>";
            echo "<tr><td><b>codigo visitante</b></td>
                 <td><b>Rut</b></td>
                 <td><b>Dv </b></td>
                <td><b>Nombre </b></td>
                <td><b>Apellido Paterno</b></td>
                <td><b>Apellido Materno</b></td>
                <td><b>Codigo</b></td>
                <td><b>Sexo</b></td>
               <td><b>Edad</b></td>
               <td><b>Email</b></td>
               <td><b>Direccion</b></td>
               <td><b>Funciones</b></td></tr> \n"; 
   do { 
     $idcomparador=$valores['cod_vis'];
      echo "<tr><td>".$valores["cod_vis"]."</td>
        <td>".$valores["rut_vis"]."</td>
        <td>".$valores["dv_vis"]."</td>
        <td>".$valores["nombre_vis"]."</td>
        <td>".$valores["appat_vis"]."</td>
        <td>".$valores["apmat_vis"]."</td>
        <td>".$valores["bar_codevis"]."</td>
        <td>".$valores["sexo_vis"]."</td>
        <td>".$valores["edad_vis"]."</td>
        <td>".$valores["email_vis"]."</td>
        <td>".$valores["dir_vis"]."</td>
        <td>"?> <form action="control_visitas.php" id="desactivar" method="POST">
               <input type="hidden" name= "deactivate" id="deactivate"> 
               <input type="submit" class="btn-danger" name="botondesactivar" value="Desactivar"> </form>
          <!-- Boton que manda al modal -->
          <button type="button" class="btn btn-primary btn-lg  active bg-success" data-toggle="modal" data-target="#exampleModal"> Ver ficha </button>
          <!-- Modal -->
                    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel">Ficha de visitante</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <div class="modal-body">
                    <!-- En este espacio ira la informacion del visitante -->
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
              </div>
            </div>
          </div>
          <!-- Fin del modal -->
        <form action="editor_visitas.php" method="POST">
        <input type="hidden" name="cod_vis" value="<?php echo $valores['cod_vis'] ?>">  <input type="submit" class="btn-primary" name="Editar" value="Editar"> </form>
        <?php echo "</td>
        </tr> \n";

       } while ($valores = mysqli_fetch_array($consulta)); 
   echo "</table> \n"; 

} 
?>
    </p>

 <p>
  Visitas Generales
        <?php
        $consulta=consultarvisitasgenerales();
                    
          while ($valores = mysqli_fetch_array($consulta)) {

            echo "<table class='table table-hover'>";
            echo "<tr><td><b>codigo visitante</b></td>
                 <td><b>Rut</b></td>
                 <td><b>Dv </b></td>
                <td><b>Nombre </b></td>
                <td><b>Apellido Paterno</b></td>
                <td><b>Apellido Materno</b></td>
                <td><b>Codigo</b></td>
                <td><b>Sexo</b></td>
               <td><b>Edad</b></td>
               <td><b>Fecha de Nacimiento</b></td>
               <td><b>Email</b></td>
               <td><b>Direccion</b></td>
               <td><b>Funciones</b></td></tr> \n"; 
   do { 
      echo "<tr><td>".$valores["cod_vis"]."</td>
        <td>".$valores["rut_vis"]."</td>
        <td>".$valores["dv_vis"]."</td>
        <td>".$valores["nombre_vis"]."</td>
        <td>".$valores["appat_vis"]."</td>
        <td>".$valores["apmat_vis"]."</td>
        <td>".$valores["bar_codevis"]."</td>
        <td>".$valores["sexo_vis"]."</td>
        <td>".$valores["edad_vis"]."</td>
        <td>".$valores["fecha_nacvis"]."</td>
        <td>".$valores["email_vis"]."</td>
        <td>".$valores["dir_vis"]."</td>
        <td>"?> <form action="editor_visitas.php" method="POST">
        <input type="hidden" name="cod_vis" value="<?php echo $valores['cod_vis'] ?>">  <input type="submit" class="btn-primary" name="Edicion" value="Editar"> </form> <?php echo "</td>
        </tr> \n";

       } while ($valores = mysqli_fetch_array($consulta)); 
   echo "</table> \n"; 

} 
?>
    </p>

        <p>
        Usuarios Bloqueados
        <?php
        $consulta=consultarvisfrec2();
                    
          while ($valores = mysqli_fetch_array($consulta)) {

            echo "<table class='table table-hover'>";
            echo "<tr><td><b>codigo visitante</b></td>
                 <td><b>Rut</b></td>
                 <td><b>Dv </b></td>
                <td><b>Nombre </b></td>
                <td><b>Apellido Paterno</b></td>
                <td><b>Apellido Materno</b></td>
                <td><b>Codigo</b></td>
                <td><b>Sexo</b></td>
               <td><b>Edad</b></td>
               <td><b>Fecha de Nacimiento</b></td>
               <td><b>Email</b></td>
               <td><b>Direccion</b></td>
               <td><b>Funciones</b></td></tr> \n"; 
   do { 
     $idcomparador=$valores['cod_vis'];
      echo "<tr><td>".$valores["cod_vis"]."</td>
        <td>".$valores["rut_vis"]."</td>
        <td>".$valores["dv_vis"]."</td>
        <td>".$valores["nombre_vis"]."</td>
        <td>".$valores["appat_vis"]."</td>
        <td>".$valores["apmat_vis"]."</td>
        <td>".$valores["bar_codevis"]."</td>
        <td>".$valores["sexo_vis"]."</td>
        <td>".$valores["edad_vis"]."</td>
        <td>".$valores["fecha_nacvis"]."</td>
        <td>".$valores["email_vis"]."</td>
        <td>".$valores["dir_vis"]."</td>
        <td>"?> <form action="control_visitas.php" id="activar" method="POST"> <input type="hidden" name= "activate" id="activate">  <input type="submit" class="btn-success" name="botonactivar" value="Activar"> </form> <?php echo "</td>
        </tr> \n";

       } while ($valores = mysqli_fetch_array($consulta)); 
   echo "</table> \n"; 

} 
?>
</p>
</div>

<?php
if(isset($_POST['deactivate'])){

  $activar=mysqli_query($db,"UPDATE CUENTA SET est_cuenta=0 WHERE cod_vis=$idcomparador");

    echo '<META HTTP-EQUIV="Refresh" Content="0; URL=control_visitas.php">';
}

if(isset($_POST['activate'])){

  $desactivar=mysqli_query($db,"UPDATE CUENTA SET est_cuenta=1 WHERE cod_vis=$idcomparador");

     echo '<META HTTP-EQUIV="Refresh" Content="0; URL=control_visitas.php">';
}


 ?>

  <a href="../controller/excel_visitas.php" target = "blank">
<input type="button"  class="btn-secondary" value="Generar Excel">
</a>

</div>