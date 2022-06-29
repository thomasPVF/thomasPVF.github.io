<br><?php include("nav_dulce.php"); 

?>


<body>

<br><br><br><br><br>
<div class="sombra">


<form method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre Relleno</label>
    <input type="text" class="form-control"  name="nombre" placeholder="nombre del relleno" required>
  </div><br>
  <div class="form-group">
    <label for="exampleFormControlInput1">Valor</label>
    <input type="number" class="form-control"  name="cantidad" placeholder="Cantidad" required>
  </div><br>
  <input type="submit" class="btn btn-success" name="agregar" value="agregar">  <a href="nbizcocho.php" class="">volver</a></input>
</form>


 </div>
</body>

<br><div class=" sombra">
<table class="table table-borderless">
  <thead>
    <tr>

      <th scope="col">Nombre</th>
      <th scope="col">valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>


      <?php
  
      $sql = "SELECT * FROM relleno";
      $result=mysqli_query($con, $sql);
      while($mostrar=mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>".$mostrar['nombre']."</td>";
        echo "<td>".$mostrar['valor']."</td>";
        echo "</tr>";
      }
      
      ?>
    </tr>
  </tbody>
</table>
</div>


<?php

		if(isset($_POST['agregar'])){

			
		 	
		 	

       $in="INSERT INTO relleno (`nombre`, `valor`) VALUES ('$_POST[nombre]', '$_POST[cantidad]');";
       $sen =$con->prepare($in);
       $sen->execute();
      header("Location:nrelleno.php");

		}
		
		

		
	?>