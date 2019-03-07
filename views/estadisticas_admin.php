

<?php require_once "../model/bd.php"; ?>
<?php require_once "include/head_admin.php";

session_start();

        $email=$_SESSION['usuario'];
        $password=$_SESSION['password'];
        $privilegio=$_SESSION['privilegio'];

?>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
 	<div class="row">
 		<div class="col-md-6">
  					
       <div id="piechart" style="width: 900px; height: 500px;"></div>
   
      <html>
    <body>

      <script type="text/javascript">
      google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {

        var data = google.visualization.arrayToDataTable([
          ['Task', 'Visitantes por género'],
         <?php $consulta=consultarvisitasmasculinas();
         while ($valores = mysqli_fetch_array($consulta)) {  
          echo "['Masculino',".$valores["vismas"]."],";}?>

          <?php $consulta=consultarvisitasfemeninas();
          while ($valores = mysqli_fetch_array($consulta)) {
          echo "['Femenino',".$valores["visfem"]."],";}?>
        ]);

        var options = {
          title: 'Visitantes por Género'
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart'));

        chart.draw(data, options);
      }
    </script>

  </body>
</html>     






 		</div>

    
 		<div class="col-md-2"></div>
 	</div>
<?php require_once "include/footer_views.php"; ?>
  </div>