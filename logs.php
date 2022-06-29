<br><?php
include("nav_dulce.php");

?>

<div class="container" style="padding-top: 100px;">
    
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">momento</th>
      <th scope="col">nombre</th>
      <th scope="col">identidad</th>
      <th scope="col">correo</th>
      <th scope="col">ip</th>
    </tr>
  </thead>
  <tbody>

  <?php

    $i=1;
    $sql = "SELECT * FROM acesso";
    $result=mysqli_query($con, $sql);
    while($mostrar=mysqli_fetch_array($result)) {
        echo "
        
        <tr>
            <th scope='row'>".$i."</th>
            <td>".$mostrar['momento']."</td>
            <td>".$mostrar['nombre']."</td>
            <td>".$mostrar['identidad']."</td>
            <td>".$mostrar['correo']."</td>
            <td>".$mostrar['ip']."</td>

        </tr>
        
        ";
        $i++;
        }   

  ?>

    

  </tbody>
</table>
</div>