<?php
session_start();
include("conexion.php");
$con = DBconexion(); 
$id = $_SESSION['data']['identidad'];
$nombre = $_SESSION['data']['nombre'];
$telefono = $_SESSION['data']['telefono'];
$correo = $_SESSION['data']['correo'];

$piso= $_POST['piso'];
$porciones= $_POST['porciones'];
$detalle= $_POST['detalle'];
$fecha= $_POST['fecha'];
$links= $_POST['links'];
$momento = date("Y-m-d");

if($links==""){
    $links="sin link";
}



if (!file_exists('img/cotis/'.$id)) {
    mkdir('img/cotis/'.$id, 0777, true);
}


if (($_FILES['foto']['name']!="")){
    // Where the file is going to be stored
        $target_dir = "img/cotis/$id/";
        $file = $_FILES['foto']['name'];
        $path = pathinfo($file);
        $filename = $path['filename'];
        $ext = $path['extension'];
        $temp_name = $_FILES['foto']['tmp_name'];
        $path_filename_ext = $target_dir.$filename.".".$ext;
     
    // Check if file already exists
    if (file_exists($path_filename_ext)) {
        echo '<script language="javascript">alert("El archivo ya existe);window.location.href="ndulce.php"</script>';
     }else{
     move_uploaded_file($temp_name,$path_filename_ext);
     echo "Congratulations! File Uploaded Successfully.";
     }
     $fotox=$target_dir.$file;
}else{
    $fotox ="sin foto adjunta";
}




$in="INSERT INTO cotizaciones (`nombre`, `numero`, `correo`, `pisos`, `porciones`, `detalles`, `fecha`, `imagen`, `imagenURL`, `estado`, `momento`) 
VALUES ('$nombre', '$telefono', '$correo', '$piso', '$porciones', '$detalle', '$fecha', '$fotox', '$links', '1', '$momento');";

$sen =$con->prepare($in);
$sen->execute();




$sqlS = "UPDATE usuario SET cot = '1' WHERE identidad = '$id'";
	
$sentencia = $con->prepare($sqlS);
$sentencia->execute();
$_SESSION['data']['cot']=1;


echo '<script language="javascript">alert("La cotizacion se realizo con exito, le daremos una respuesta a la brevedad");window.location.href="index.php"</script>';


?>