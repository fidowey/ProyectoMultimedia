<?php require_once "include/head_visitante.php"; ?>
	  <div class="row">
    <div class="col-md-4">
    </div>
    <div class="col-md-4">
		<form name="agendar" action="agendar.php" method= "POST">
  			<div class="form-group">
    			<label >Fecha de visita  </label>
    			<input type="date" class="form-control" placeholder="dd-mm-aaaa" name="fechanac" required>
  			</div>
  	        <div class="form-group">
        	    <label >Hora </label>
          	    <input type="text" class="form-control" name="hora">
            </div>
       		<div class="form-group">
       		    <label >Parque</label>
            	<select  class="form-control" name="parque" onchange="cambia()">
                <option value=""> -- </option>
            		<option value="1"> Parque Nacional La Campana</option>
                <option value="2"> Lago Peñuelas </option>
                <option value="3"> Laguna El Peral</option>           		
            	</select>
        	</div>
              <div class="form-group">
              <label >Ruta</label>
              <select  class="form-control" name="ruta">
              <option value="">--</option>

              </select>
          </div>
    <button type="submit" class="btn btn-primary">Agendar</button>
</form>
    </div>
    <div class="col-md-4">
    </div>
  </div>

<?php require_once "include/footer_visitante.php"; ?>

  <script type="text/javascript">
      //1) Definir Las Variables Correspondintes
      var ruta_1 = new Array ("", "A", "B", "C");
      var ruta_2 = new Array ("", "D", "E", "F");
      var ruta_3 = new Array ("", "G", "H", "I");
      // 2) crear una funcion que permita ejecutar el cambio dinamico
      
      function cambia(){
        var parque;
        //Se toma el vamor de la "cosa seleccionada"
        parque = document.agendar.parque[document.agendar.parque.selectedIndex].value;
        //se chequea si la "cosa" esta definida
        if(parque!=0){
          //selecionamos las cosas Correctas
          mis_opts=eval("ruta_" + parque);
          //se calcula el numero de cosas
          num_opts=mis_opts.length;
          //marco el numero de opt en el select
          document.agendar.ruta.length = num_opts;
          //para cada opt del array, la pongo en el select
          for(i=0; i<num_opts; i++){
            document.agendar.ruta.options[i].value=mis_opts[i];
            document.agendar.ruta.options[i].text=mis_opts[i];
          }
          }else{
            //si no habia ninguna opt seleccionada, elimino las cosas del select
            document.agendar.ruta.length = 1;
            //ponemos un guion en la unica opt que he dejado
            document.agendar.ruta.options[0].value="-";
            document.agendar.ruta.options[0].text="-";
          }
          //hacer un reset de las opts
          document.agendar.ruta.options[0].selected = true;
          
        }
      
      
    
    </script>

