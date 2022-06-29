<?php 
session_start();

include("conexion.php");
$con = DBconexion();

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];



$sql = "SELECT count(*) as Total FROM usuario where correo ='$_POST[correo]' and contrasena = '$_POST[contrasena]'";
    $result=mysqli_query($con, $sql);

    while($mostrar=mysqli_fetch_array($result)) {
        
        if($mostrar['Total'] == 0){
            
            echo '<script language="javascript">alert("Usuario o contraseña incorrecto");window.location.href="index.php"</script>';
        }else{

            $sql2 = "SELECT * FROM usuario where correo ='$_POST[correo]' and contrasena = '$_POST[contrasena]'";
            $result2=mysqli_query($con, $sql2);

            while($mostrar2=mysqli_fetch_array($result2)) {

                $R["nombre"] =$mostrar2['nombre'];
                $R["apellido"] =$mostrar2['apellido'];
                $R["correo"] =$mostrar2['correo'];
                $R["nacimiento"] =$mostrar2['nacimiento'];
                $R["acceso"] =$mostrar2['acceso'];
                $R["identidad"] =$mostrar2['identidad'];
                $R["telefono"] =$mostrar2['telefono'];
                $R["cot"] =$mostrar2['cot'];

            }

            $_SESSION['data'] = $R;

        
             header("Location:index.php");

        }

        

    }



?>