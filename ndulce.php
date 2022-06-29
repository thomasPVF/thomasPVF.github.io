<br><?php include("nav_dulce.php"); ?>
<body>
<br><br><br>

<div class="sombra">

<script src="js/app.js"></script>

<div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" id="relleno2" class="btn btn-secondary">2 pisos</button>
    <button type="button" id="relleno3" class="btn btn-secondary">3 pisos</button>
      
      
      
    </div>

<form method="post" action="Rdulce.php" enctype="multipart/form-data" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Nombre Dulce</label>
    <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" placeholder="nombre del pastel">
  </div><br>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Seleccione el bizcocho <a href="nbizcocho.php" class="">agregar</a></label>
    <select class="form-control" name="bizcocho" id="exampleFormControlSelect1" >
    <option value="noda">- seleccione una opcion -</option>
      <?php
      $sql = "SELECT * FROM bizcocho";
      $result=mysqli_query($con, $sql);
      while($mostrar=mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<option value=".$mostrar['relleno0']."-".$mostrar['relleno1']."-".$mostrar['relleno2']."-".$mostrar['relleno3']."-".$mostrar['relleno4'].">"
        .$mostrar['nombre']." Relleno: ".$mostrar['relleno0']." - ".$mostrar['relleno1']." - ".$mostrar['relleno2']." - ".$mostrar['relleno3']." - ".$mostrar['relleno4']."</option>";
        echo "</tr>";
      }
      ?>
    </select>
  </div><br>

    <div id="elemento2" style="padding: 25px 50px 0px 0px; background-color: rgb(248, 255, 246);">
        
      <div class="form-group">
      <label for="exampleFormControlSelect1">Seleccione el bizcocho (PISO 2)</label>
      <select class="form-control" name="bizcocho2" id="b2">
      <option value="noda">- seleccione una opcion -</option>
        <?php
        $sql = "SELECT * FROM bizcocho";
        $result=mysqli_query($con, $sql);
        while($mostrar=mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<option value=".$mostrar['relleno0']."-".$mostrar['relleno1']."-".$mostrar['relleno2']."-".$mostrar['relleno3']."-".$mostrar['relleno4'].">"
          .$mostrar['nombre']." Relleno: ".$mostrar['relleno0']." - ".$mostrar['relleno1']." - ".$mostrar['relleno2']." - ".$mostrar['relleno3']." - ".$mostrar['relleno4']."</option>";
          echo "</tr>";
        }
        ?>
      </select>
    </div><br>
        
    </div>

    <div id="elemento3" style="padding: 25px 50px 0px 0px; background-color: rgb(249, 255, 254);">

      <div class="form-group">
      <label for="exampleFormControlSelect1">Seleccione el bizcocho (PISO 3)</label>
      <select class="form-control" name="bizcocho3" id="b3">
        <option value="noda">- seleccione una opcion -</option>
        <?php
        $sql = "SELECT * FROM bizcocho";
        $result=mysqli_query($con, $sql);
        while($mostrar=mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<option value=".$mostrar['relleno0']."-".$mostrar['relleno1']."-".$mostrar['relleno2']."-".$mostrar['relleno3']."-".$mostrar['relleno4'].">"
          .$mostrar['nombre']." Relleno: ".$mostrar['relleno0']." - ".$mostrar['relleno1']." - ".$mostrar['relleno2']." - ".$mostrar['relleno3']." - ".$mostrar['relleno4']."</option>";
          echo "</tr>";
        }
        ?>
      </select>
    </div><br>

    </div>


 
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault" name="vegano"/>
    <label class="form-check-label" for="flexSwitchCheckDefault">Producto vegano?</label>
</div><br>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">descripcion</label>
    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="desc"></textarea>
  </div><br>
  
  <div class="form-group">
    <label for="exampleFormControlFile1">Imagen del dulce</label><br>
    <input type="file" class="form-control-file" name="foto" id="exampleFormControlFile1">
  </div><br>

  <input type="submit" class="btn btn-success" name="agregar" value="agregar"></input>
</form>
 </div>



      
    </tr>
  </tbody>
</table>
</div>

</body>
</html>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
<script>
 $('#myModal').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})
</script>
