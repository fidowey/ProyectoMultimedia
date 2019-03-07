


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
require_once'include/bootstrap_link_views.php';
require_once'../model/bd.php';

echo "<div class=col-3></div>
<div class=col-6>";


$idcomparador=$_REQUEST['rut'];
for ($i=0; $i<1 ; $i++) { 

               $consulta=consultarfichavis($idcomparador);
 				 $valores=mysqli_fetch_assoc($consulta);{



                  
                  
                  
                  echo "NOMBRE VISITANTE: ". $valores["nombre_vis"]."<br>";
                  echo "APELLIDO PATERNO VISITANTE: ". $valores["appat_vis"]."<br>";
                  echo "APELLIDO MATERNO DEL VISITANTE: ". $valores["apmat_vis"]."<br>";
                  if (file_exists($valores['img_vis'])) {
                      $img= "../views/include/img/" . $valores["rut_vis"] . $valores["nombre_vis"] . '.png';
                  } else {
                      $img= "../views/include/img/" . 'default.jpg';
                  }
                  echo "NUMERO DE TELEFONO DEL VISITANTE: ". $valores["telefono_vis"]."<br>";
                  echo "<img lenght=150 width=150 src=".$img.">";

                  $i=1;
                 }   
                 }                      
                 ?>  
                 </div>


                 <div class="col-3"></div>