

    <p>
        <?php
        require_once'include/head_admin.php';
        require_once'../model/bd.php';
        require_once'include/bootstrap_link_views.php';

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
        <td>"?> <form action="control_visitas.php" id="desactivar" method="POST"> <input type="hidden" name= "deactivate" id="deactivate">  <input type="submit" class="btn-danger" name="botondesactivar" value="Desactivar"> </form>
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