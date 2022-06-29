<?php 
session_start();
ob_start();
include("conexion.php");
$con = DBconexion();

$ip_add = $_SERVER['REMOTE_ADDR'];


if (!isset($_SESSION['data']['nombre'])) {
  $m = date("Y-m-d H:i:s");
  $in="INSERT INTO acesso (`momento`, `nombre`, `identidad`, `correo`, `ip`) VALUES('$m', 'ingreso sin sesion', 'ingreso sin sesion', 'sin_sesion@sinsesion.cl', '$ip_add');";

  $sen =$con->prepare($in);
  $sen->execute();
  echo '<script language="javascript">alert("USTED NO TIENE AUTORIZACION PARA INGRESAR A ESTA SECCION");window.location.href="index.php"</script>';
    die();
}else{

  if ($_SESSION['data']['acceso'] != 1 ) {

  

    $m = date("Y-m-d H:i:s");
    $n = $_SESSION['data']['nombre'];
    $i = $_SESSION['data']['identidad'];
    $c = $_SESSION['data']['correo'];
  
  
    $in="INSERT INTO acesso (`momento`, `nombre`, `identidad`, `correo`, `ip`) VALUES('$m', '$n', '$i', '$c' , '$ip_add');";
  
    $sen =$con->prepare($in);
    $sen->execute();
    echo '<script language="javascript">alert("USTED NO TIENE AUTORIZACION PARA INGRESAR A ESTA SECCION");window.location.href="index.php"</script>';
    die();
  
  }
}




?>

    
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>agregado</title>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<style> 
div.sombra {
  
  height: 100px;
  padding: 15px;
  background-color: white;
  box-shadow: 10px 10px lightblue;
  margin-left: auto;
	margin-right: auto;
    border:2px solid grey;
    height: auto;
    width: 80%;
}
.nav{
  margin-top:5px;
}
div.sombra .tbody{
  width: 90%;
}

<?php

$sql = "SELECT count(estado) as Ts FROM cotizaciones where estado ='1'";
      $result=mysqli_query($con, $sql);
      while($mostrar=mysqli_fetch_array($result)) {
          $rel=$mostrar['Ts'];
      }

?>

</style>
</head>
<body>
<ul class="nav justify-content-center">
  <li class="nav-item">
    <a class="nav-link active" href="ndulce.php">DULCE</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="nrelleno.php">RELLENO</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="nbizcocho.php">BIZCOHO</a>
  </li>
  <li class="nav-item">
  <a class="nav-link"><?php include("calculadora.html"); ?></a>
</li>
<li class="nav-item">
    <a class="nav-link active" href="logs.php">LOGS</a>
  </li>
  
  <li class="nav-item">
    <a class="nav-link active" href="index.php">INICIO</a>
  </li>

  <li class="nav-item">
  <a href="cotizaciones_adm.php" class="nav-link link-danger" style="color:black;">CONTIZACION PENDIENTE DE RESPONDER: <?php echo $rel ?></a>  
  </li>
 
</ul>
</body>
</html>