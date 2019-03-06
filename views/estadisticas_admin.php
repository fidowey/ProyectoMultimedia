

<?php require_once "../model/bd.php"; ?>
<?php require_once "include/head_admin.php";

session_start();

        $email=$_SESSION['usuario'];
        $password=$_SESSION['password'];
        $privilegio=$_SESSION['privilegio'];

?>


 	<div class="row">
 		<div class="col-md-6">
  					<script type="text/javascript" src="include/js/loader.js"></script>
       <div id="piechart" style="width: 900px; height: 500px;"></div>
   
           
 		</div>

    
 		<div class="col-md-2"></div>
 	</div>
<?php require_once "include/footer_views.php"; ?>
  </div>