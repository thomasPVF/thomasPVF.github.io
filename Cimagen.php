<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<!--<script src="js/app.js"></script>
<div class="container my-5">

    <form method="post" action="Rdulce.php" enctype="multipart/form-data">

    <div class="btn-group" role="group" aria-label="Basic example">
    <button type="button" id="relleno2" class="btn btn-secondary">2 pisos</button>
    <button type="button" id="relleno3" class="btn btn-secondary">3 pisos</button>
    </div>

   

    <div class="form-group">
        <label for="exampleFormControlInput1">Nombre Dulce</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="nombre" placeholder="nombre del pastel">
    </div><br>
    <div class="form-group"  >
        <label for="exampleFormControlSelect1">Seleccione el bizcocho <a href="nbizcocho.php" class="" hide>agregar</a></label>
        <select  class="form-control" name="bizcocho" id="exampleFormControlSelect1">
        
        </select>
    </div><br>


    <div class="form-group">
        <label for="exampleFormControlSelect2">Seleccione el relleno primer piso <a href="nrelleno.php" class="">agregar</a></label>
        <select multiple class="form-control" name="relleno[]" id="exampleFormControlSelect2"></select>
    </div><br>

    <div id="elemento2" style="padding: 25px 50px 0px 0px; background-color: rgb(248, 255, 246);">
        
        <div class="form-group">
            <label for="exampleFormControlSelect1">Seleccione el bizcocho <a href="nbizcocho.php" class="" hide>agregar</a></label>
            <select  class="form-control" name="bizcocho" id="exampleFormControlSelect1">
            
            </select>
        </div>
    
        <div class="form-group">
            <label  for="exampleFormControlSelect2">Seleccione el relleno segundo piso </label>
            <select  multiple class="form-control" name="relleno[]" id="exampleFormControlSelect2"></select>
        </div>
    </div>

    <div id="elemento3" style="padding: 25px 50px 0px 0px; background-color: rgb(249, 255, 254);">

        <div class="form-group">
            <label for="exampleFormControlSelect1">Seleccione el bizcocho <a href="nbizcocho.php" class="" hide>agregar</a></label>
            <select  class="form-control" name="bizcocho" id="exampleFormControlSelect1">
            
            </select>
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect2">Seleccione el relleno tercer piso</label>
            <select  multiple class="form-control" name="relleno[]" id="exampleFormControlSelect2"></select>
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
    

  

</div>-->

<?php 
            include("conexion.php");
            $con = DBconexion();
            $i=0; $x=0; $y=1;
            $sql = "SELECT * FROM dulce";
            $result=mysqli_query($con, $sql);
            while($mostrar=mysqli_fetch_array($result)) {
                if($y == 4){ $y=1;}     


                if($mostrar['vegano']==1){
                    $veg="<button type='button' class='btn btn-success' disabled>PRODUCTO VEGANO <i class='fa-solid fa-seedling'></i></button>";
                }else{
                    $veg="";
                }

                

                


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
                    
                    echo "<li class='list-group-item'>Relleno bizcocho N°".$y." ".$mostrar1['bizcocho'.$y]."</li>";$y++;
                    echo "<li class='list-group-item'>Relleno bizcocho N°".$y." ".$mostrar1['bizcocho'.$y]."</li>";$y++;
                    echo "<li class='list-group-item'>Relleno bizcocho N°".$y." ".$mostrar1['bizcocho'.$y]."</li>";$y++;
                    
                    
                    
                    }
                   
                echo"</ul>
                <div class='card-body'>
                ".$veg."
                   
                </div></div>


                </br></div>

                
                ";
                
                   
                $i++;
            }?>

<a 
id="b1"
tabindex="0" 
class="link-dark"
role="button" 
data-toggle="popover" 
data-trigger="focus" 
data-content="">Dismissible popover</a><br>


<script>
    
    $(function () {
        $('#b1').popover({
            placement: 'bottom',
            title: 'rellenos',
            content: '<?php 
            
           

            ?>',
            trigger: 'focus'
        });
    })
    $(function () {
        $('#b2').popover({
            placement: 'bottom',
            title: 'rellenos',
            content: '<?php 
            
            

            ?>',
            trigger: 'focus'
        });
    })
</script>

    


</body>
</html>