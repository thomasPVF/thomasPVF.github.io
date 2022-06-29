<br><?php include("nav_dulce.php"); ?>
<body>
<br><br><br><br><br>



<div class="sombra">

<form method="post">
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre Bizcocho </label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" placeholder="nombre del bizcocho" required>
  </div><br>
<div class="form-group">
    <label for="exampleFormControlSelect2">Seleccione el relleno <a href="nrelleno.php" class="">agregar</a></label>
    <select multiple class="form-control" name="relleno[]" id="exampleFormControlSelect2" size="8" required>

    <?php
      $sql = "SELECT * FROM relleno";
      $result=mysqli_query($con, $sql);
      while($mostrar=mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<option>".$mostrar['nombre']."</option>";
        echo "</tr>";
      }
      ?>

    </select>
  </div><br>
  <input type="submit" class="btn btn-success" name="agregar" value="agregar"> <a href="ndulce.php" class="">volver</a></input>
</form>


 </div>
</body>

<br><div class="sombra">
<table class="table table-borderless">
  <thead>
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">relleno 1</th>
      <th scope="col">relleno 2</th>
      <th scope="col">relleno 3</th>
      <th scope="col">relleno 4</th>
      <th scope="col">relleno 5</th>

    </tr>
  </thead>
  <tbody>
    


      <?php
  
      $sql = "SELECT * FROM bizcocho";
      $result=mysqli_query($con, $sql);
      while($mostrar=mysqli_fetch_array($result)) {
        echo "<tr'>";
        echo "<td>".$mostrar['bnombre']."</td>";
        echo "<td>".$mostrar['relleno0']."</td>";
        echo "<td>".$mostrar['relleno1']."</td>";
        echo "<td>".$mostrar['relleno2']."</td>";
        echo "<td>".$mostrar['relleno3']."</td>";
        echo "<td>".$mostrar['relleno4']."</td>";
        echo "</tr>";
      }
      
      ?>
  </tbody>
</table>
</div>

<?php

  $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $RR = rand(10, 40);
  $longitud = $RR;
  $RND = substr(str_shuffle($caracteres_permitidos), 0, $longitud);
  
    $i=0;
		if(isset($_POST['agregar'])){
    
    foreach ($_POST['relleno'] as $selectedOption){
    $R[$i] = $selectedOption;

    $i++;
    }
			
		if(isset($R[1])) { echo $R[1]; }else {$R[1] = "";}
    if(isset($R[2])) { echo $R[2]; }else {$R[2] = "";}
    if(isset($R[3])) { echo $R[3]; }else {$R[3] = "";}
    if(isset($R[4])) { echo $R[4]; }else {$R[4] = "";}

   


    
		 	

       $in="INSERT INTO bizcocho (`identidad`, `bnombre`, `relleno0`, `relleno1`, `relleno2`, `relleno3`, `relleno4`) VALUES ('$RND', '$_POST[nombre]', '$R[0]', '$R[1]', '$R[2]', '$R[3]', '$R[4]');";
       $sen =$con->prepare($in);
       $sen->execute();
       header("Location:nbizcocho.php");


		}
		
		
	?>