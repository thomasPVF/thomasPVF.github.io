<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head><br>
<?php include("nav_dulce.php"); ?>
<body>

    <style>
        .center {
        display: block;
        margin-left: auto;
        margin-right: auto;
        width: 100%;
}
    </style>
    
    <div class="container-xl">


    </table>

        <table class="table table-striped table-inverse table-responsive">
            <thead class="thead-inverse" align="center">


                    <th>NOMBRE</th>
                    <th>NUMERO</th>
                    <th>CORREO</th>
                    <th>PISOS</th>
                    <th>PORCIONES</th>
                    <th>DETALLES</th>
                    <th>FECHA ENTREGA</th>
                    <th>IMG ADJUNTA</th>
                    <th>IMG URL</th>
                    <th>FECHA SOLICITUD</th>
            
                </tr>
                </thead>
                <tbody align="center">
                    <?php
                    
                    $x=0;$y=0;
                    $sql = "SELECT * FROM cotizaciones";
                    $result=mysqli_query($con, $sql);
                    while($mostrar=mysqli_fetch_array($result)) {
                        
                        if($mostrar['imagen']=="sin foto adjunta"){
                            $i="sin";
                            $iM="";
                            
                        }else{
                            $i="<a type='' class='' data-bs-toggle='modal' data-bs-target='#modelId".$x."'>ver imagen</a>";
                            $iM="<div class='modal fade' id='modelId".$x."' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>

                                    <div class='modal-body'>
                                    <img class='center' src='".$mostrar['imagen']."' >
                                    </div>
                                
                                </div>
                            </div>
                        </div>";
                        $x++;
                        }

                        if($mostrar['imagenURL']=="sin link"){
                            $ir="sin";
                            $irM="";
                        }else{
                            $ir="<a type='' class='' data-bs-toggle='modal' data-bs-target='#odelId".$y."'>ver imagen</a>";
                            $irM="<div class='modal fade' id='odelId".$y."' tabindex='-1' role='dialog' aria-labelledby='modelTitleId' aria-hidden='true'>
                            <div class='modal-dialog' role='document'>
                                <div class='modal-content'>
        
                                    <div class='modal-body'>
                                    <img class='center' src='".$mostrar['imagenURL']."' >
                                    </div>
                                
                                </div>
                            </div>
                            </div>
                            ";
                            $y--;
                        }


                        echo "<tr>";
                        echo "<td>".$mostrar['nombre']."</td>";
                        echo "<td>".$mostrar['numero']."</td>";
                        echo "<td>".$mostrar['correo']."</td>";
                        echo "<td>".$mostrar['pisos']."</td>";
                        echo "<td>".$mostrar['porciones']."</td>";
                        echo "<td>".$mostrar['detalles']."</td>";
                        echo "<td>".$mostrar['fecha']."</td>";
                        echo "<td>".$i."</td>";
                        echo "<td>".$ir."</td>";
                        echo "<td>".$mostrar['momento']."</td>";
                        echo "</tr>";

                        echo $iM;

                        echo $irM;


                    }?>
                </tbody>
        </table>

        
        
    </div>




</body>
</html>