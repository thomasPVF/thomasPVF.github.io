<?php 
include("conexion.php");
$con = DBconexion();






$factual=date("Y-m-d H:i:s");
$V=$_POST['vegano'];

if($V=="on"){
    $V=1; //
}else{
    $V=0;
}


$D=$_POST['desc'];
$N = $_POST['nombre'];
$B = $_POST['bizcocho'];

if (isset($_POST['bizcocho2'])) {
    $B2 = $_POST['bizcocho2'];
    if($B2 =="noda"){$B2 = "nada";}
}else{
    $B2 = "no incluye";
}

if (isset($_POST['bizcocho3'])) {
    $B3 = $_POST['bizcocho3'];
    if($B3 =="noda"){$B3 = "nada";}
}else{
    $B3 = "no incluye";
}




$caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
$RR = rand(10, 40);
$longitud = $RR;
$RND = substr(str_shuffle($caracteres_permitidos), 0, $longitud);


if (($_FILES['foto']['name']!="")){
    // Where the file is going to be stored
        $target_dir = "img/";
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
}



    /*if(isset($R[1])) { echo $R[1]; }else {$R[1] = "sin relleno";}
    if(isset($R[2])) { echo $R[2]; }else {$R[2] = "sin relleno";}
    if(isset($R[3])) { echo $R[3]; }else {$R[3] = "sin relleno";}
    if(isset($R[4])) { echo $R[4]; }else {$R[4] = "sin relleno";}*/

    /*echo $N;
    echo "<br>";
    echo $R[0];
    echo "<br>";
    echo $R[1];
    echo "<br>";
    echo $R[2];
    echo "<br>";
    echo $R[3];
    echo "<br>";
    echo $R[4];
    echo "<br>";
    echo $B;
    echo "<br>";
    echo $file;
    echo "<br>";
    echo $V;
    echo "<br>";
    echo $factual;
    echo "<br>";
    echo $D;
    echo "<br>";*/

//$mascota="INSERT INTO dulce (`nombre`, `relleno0`, `relleno1`, `relleno2`, `relleno3`, `relleno4`, `bizcocho`, `foto`, `identidad`, `vegano`, `subida`, `desc`) VALUES 



$mascota="INSERT INTO dulce (`nombre`, `bizcocho1`, `bizcocho2`, `bizcocho3`, `foto`, `identidad`, `vegano`, `subida`, `desc`) VALUES 
('$N', '$B', '$B2', '$B3', 'img/$file', '$RND', '$V', '$factual', '$D');";
$sen =$con->prepare($mascota);
$sen->execute();

echo '<script language="javascript">alert("Registro De Torta Exitoso");window.location.href="ndulce.php"</script>';


?>