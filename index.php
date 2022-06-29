<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>bienvenid@</title>

<script src="https://kit.fontawesome.com/e8f470a272.js" crossorigin="anonymous"></script>
</head>



<body>
    
<?php include("estructura/nav.php"); ?><!-- menu -->

 

    </br>
    <div class="container" >
        
        <div class="row">

            
            <?php include("estructura\carusel.php"); ?><!-- menu -->

                <div class="row">
                    
                    <?php $i=0; $x=0; $y=1;
                    $sql = "SELECT * FROM dulce";
                    $result=mysqli_query($con, $sql);
                    while($mostrar=mysqli_fetch_array($result)) {
                        
                        if($mostrar['vegano']==1){
                            $veg="<button type='button' class='btn btn-success' disabled>PRODUCTO VEGANO <i class='fa-solid fa-seedling'></i></button>";
                        }else{$veg="";}

                        echo "
                        <div class='col-sm-4'>
                            <div class='card' style='width: auto; height: auto;'>
                                <img src='".$mostrar['foto']."' alt='...' style='border-top-left-radius: 10px; border-top-right-radius: 10px;'>

                                <div class='card-body'>
                                    <h5 class='card-title'>".$mostrar['nombre']."</h5>
                                    <p class='card-text'>".$mostrar['desc']."</p>
                                </div>

                                <ul class='list-group list-group-flush'>";

                                    $sql1 = "SELECT bizcocho1, bizcocho2, bizcocho3  FROM dulce where identidad ='".$mostrar['identidad']."'";
                                        $result1=mysqli_query($con, $sql1);
                                        while($mostrar1=mysqli_fetch_array($result1)) {
                                        echo "<li class='list-group-item'>Relleno bizcocho N°".$y." ".$mostrar1['bizcocho1']."</li>";$y++;
                                        
                                        

                                        if($mostrar1['bizcocho2'] =="nada"){

                                        }else{
                                            echo "<li class='list-group-item'>Relleno bizcocho N°".$y." ".$mostrar1['bizcocho2']."</li>";$y++;
                                            if($mostrar1['bizcocho3'] =="nada"){

                                            }else{
                                                echo "<li class='list-group-item'>Relleno bizcocho N°".$y." ".$mostrar1['bizcocho3']."</li>";$y++;
                                            }

                                        }
                                        
                                        $y=1;}
                                
                                echo"
                                </ul>
                                <div class='card-body'>
                                ".$veg."
                                </div>
                            </div>
                            </br>
                        </div>";    
                    $i++;
                    }
            ?>
                </div>
        </div>

        
    </div>
    
</body>
<br</br></br></br></br> <br</br></br></br></br>
        <div class="row">
            <?php include("estructura/footer.php"); ?><!-- pie de pagina -->
        </div>
</html>