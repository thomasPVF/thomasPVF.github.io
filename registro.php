<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Registro</title><?php include("estructura/nav.php"); ?><!-- menu -->
</head>

<body>
<div class="container">

<style>
    
    div.formulario{
        background-color:white;
        margin-top:15%;
        margin-bottom:15%;
        margin-right:10%;
        margin-left:10%;
        padding: 15px;
        border-radius:6px;
        box-shadow: 10px 10px ;
    }
    
</style>

    <div class="formulario">
        <form method="post">
            <h1 align="center">REGISTRO DE USUARIO</h1>
            
            <br><div class="form-row">

                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">

                            <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
                            </div>
                        </div>
                            <div class="col-6">
                            <div class="form-group">

                                <input type="text" class="form-control" name="apellido" placeholder="Apellidos" required>
                            </div>
                        </div>
                    </div><br>

                    
                    <div class="row">
                        <div class="col-4">
                            <div class="form-group">
                            <label for="" class="">Correo electronico</label>
                            <input type="email" class="form-control" name="correo" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-group">
                            <label for="" class="">Telefono / Celular</label>
                            <input type="number" class="form-control" name="telefono" placeholder="" required>
                            </div>
                        </div>
                        
                        <div class="col-4">
                            <div class="form-group">
                                <label for="" class="">Fecha de nacimiento</label>
                                <input type="date" class="form-control" name="nacimiento" placeholder="" required>
                            </div>
                        </div>
                    </div><br>
                    
                
                 </div>
                    <div class="form-group">
                        <label for="" class="">Contraseña</label>
                        <input type="password" class="form-control" name="contrasena" placeholder="" required>
                    </div><br>
                    
                 <div class="form-row">
                <input type="submit" name="Registrar" value="Registrar" class="btn btn-success"></input>
            </div>
        </form>
    </div>

</div>


</body><footer>
<?php include("estructura/footer.php"); ?><!-- pie de pagina --></footer>
</html>

<?php

  
	if(isset($_POST['Registrar'])){


        $caracteres_permitidos = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $RR = rand(10, 40);
        $longitud = $RR;
        $RND = substr(str_shuffle($caracteres_permitidos), 0, $longitud);
        
        $sql = "SELECT correo FROM usuario where correo ='$_POST[correo]'";
        $result=mysqli_query($con, $sql);
        while($mostrar=mysqli_fetch_array($result)) {

            $R= $mostrar['correo'];

        }

        if($R==""){
                
            $in="INSERT INTO usuario (`nombre`, `apellido`, `correo`, `nacimiento`, `contrasena`, `acceso`, `identidad`, `telefono`, `cot`) VALUES
            ('$_POST[nombre]', '$_POST[apellido]', '$_POST[correo]', '$_POST[nacimiento]', '$_POST[contrasena]', '0', '$RND', '$_POST[telefono]', '0');";

            $sen =$con->prepare($in);
            $sen->execute();

            echo '<script language="javascript">
   
            swal.fire({
                    title: "Registro Completo",
                    text: "Bienvenid@!",
                    type: "success"
                }).then(function() {
                    window.location = "registro.php";
                });

            </script>';

        } else{
            
            echo '<script language="javascript">
   
            Swal.fire({
                icon: "",
                title: "Algo ocurrio mal",
                text: "El correo esta en uso, pruebe con otro"
              })
            </script>';

        }
    
        
        /*
        
       */
       
       /*

    */}
		
		
	?>