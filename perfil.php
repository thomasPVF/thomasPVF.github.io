<?php include("estructura/nav.php"); 

if (!isset($_SESSION['data']['nombre'])) {
   
    echo '<script language="javascript">alert("DEBE INGRESAR SESION ANTES DE ENTRAR A ESTA SECCION");window.location.href="index.php"</script>';
      die();
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
</head>

<body>
    
<div class="container">

</div>
    
    
<br</br></br></br></br> <br</br></br></br>
    <div class="row">
        <?php include("estructura/footer.php"); ?><!-- pie de pagina -->
    </div>
   
</body>
</html>