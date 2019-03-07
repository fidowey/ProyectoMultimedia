


<?php
require_once('include/head_admin.php');
require_once'include/bootstrap_link_views.php';
require_once'../model/bd.php';

echo "<div class=col-3></div>
<div class=col-6>";


$idcomparador=$_REQUEST['rut'];
for ($i=0; $i<1 ; $i++) { 

               $consulta=consultarfichafunc($idcomparador);
 				 $valores=mysqli_fetch_assoc($consulta);{

                  switch ($valores["id_cargo"]) {
                    case '1':
                      $id_parque="CONTROL TOTAL";
                      $privilegio="ADMINISTRADOR GENERAL";
                      $valores["nombre_parque"]="CONTROL TOTAL";
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
                  echo "PARQUE ASIGNADO: ". $valores["nombre_parque"] ."<br>";
                  echo "<img lenght=150 width=150 src=".$valores["img_func"].">";

                  $i=1;
                 }   
                 }                      
                 ?>  
                 </div>


                 <div class="col-3"></div>