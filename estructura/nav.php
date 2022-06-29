
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>



<?php
session_start();

include("conexion.php");
$con = DBconexion();


if (!isset($_SESSION['data']['nombre'])) {
  $nva ="<li class='nav-item'><a class='nav-item nav-link' data-toggle='modal' data-target='#exampleModal'>  Iniciar sesion <i class='fa-solid fa-right-to-bracket'></i> </i></a></li> ";
  $cot="";
  $per="";
}else{
  $per ="<li class='nav-item'><a class='nav-item nav-link' href='perfil.php'>Perfil: ".$_SESSION['data']['nombre']." <i class='fa-solid fa-user'></i></i></a></li>";
  $cot ="<li class='nav-item'><a class='nav-item nav-link' href='cotizar.php'>Cotizar <i class='fa-solid fa-cart-plus'></i></a></li>";
  $nva ="<li class='nav-item'><a class='nav-item nav-link' href='cerrar_session.php'>Cerrar sesion <i class='fa-solid fa-person-through-window'></i></i></a></li>";

  if ($_SESSION['data']['acceso'] == 1 ) {

    $panel ="<li class='nav-item'><a class='nav-item nav-link' href='ndulce.php'>Panel </a></li>";
  
  }else{
    $panel = "";
  }
}



?> 

<style>
body{
    background-image: url("img/hermoso-patron-transparente-floral-dibujado-mano_44538-2787.jpg");
    
}
html{
    
    background-color: black;
    
 }
 
  
</style>

<nav class="navbar navbar-inverse navbar-inverse bg-light">
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <h1 align="center">Marcela pasteleria</h1><br>
  <div class="collapse navbar-collapse" id="navbarTogglerDemo01" style="padding-left:10px;">
    
    <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item"><a class="nav-item nav-link" href="Index.php">Inicio <i class="fa-solid fa-house"></i></a></li>
      <?php echo $per;?>
      <?php echo $cot;?>
      <?php echo @$panel;?>
      <?php echo $nva;?>
    </ul>
  </div>
</nav>







        

        <!-- Modal -->
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Inicio de sesion </h5>
                
              </div>
              <div class="modal-body">
                

              <form method="post" action="validar_session.php">
              <div class="form-group">
                <label for="exampleInputEmail1">Correo electronico </label>
                <input type="email" class="form-control" name=correo id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Ingrese su correo" required>
                <small id="emailHelp" class="form-text text-muted">Su correo no sera compartido con nadie mas</small>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Contraseña</label>
                <input type="password" class="form-control" name="contrasena" id="exampleInputPassword1" placeholder="Contraseña" required>
              </div><br>
              <div class="form-group">
              <input type="submit" class="btn btn-primary btn-success" value="Ingresar"></input>
              </div>
              
              
            </form>


              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">cerrar</button>
                <a type="button" class="btn btn-primary" href="registro.php" >Registrarse</a>
              </div>
            </div>
          </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.6/dist/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.2.1/dist/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>



