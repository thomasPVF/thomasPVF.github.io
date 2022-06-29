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
        <title>Document</title>
    </head>
    <body>
        <style>
            div#info{
                margin-top:60px;
                margin-left:auto;
                margin-right:auto;
                padding-top:5px;
                padding-bottom:5px;
                padding-left:15px;
                padding-right:15px;
                background-color:white;
                border-radius:4px;
            }
            div#cot{

                margin-top:20px;
                margin-left:auto;
                margin-right:auto;
                padding-top:5px;
                padding-bottom:5px;
                padding-left:15px;
                padding-right:15px;
                background-color:white;
                border-radius:4px;

            }
            .btn-primary{
            width: 100%;
            }
            
        </style>
    
        <div class="container"><br>
            <div id="cot" disabled>
             <form  method="post" action="ncotizacion.php" enctype="multipart/form-data" id="formc">
                    <h3 align="center"><u>Cotizacion</u></h3>
                    <div class="row">
                        <div class="col-6">

                            <div class="mb-3">
                                <label for="" class="form-label">Pisos para la torta</label required>
                                <select class="form-select" name="piso" id="selp" aria-label="City" style="height: 36px;">
                                    <option>1 piso</option>
                                    <option>2 pisos</option>
                                    <option>3 pisos</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label for="" class="form-label">Cantidad de porciones</label>
                                <input type="number" name="porciones" id="porciones" class="form-control" required>
                            </div><br>
                        </div>
                    </div>

                    <div class="mb-3">
                    <label for="" class="form-label">Detalles (max 800 caracteres)</label>
                    <textarea class="form-control" name="detalle" id="detalle"  rows="3" maxlength="800" placeholder="aqui puede explayarse, especificar con mas detalles lo que busca en su torta" required></textarea>  
                    </div>


                    <div class="row">
                        

                        <?php
                        $año = date('Y');
                        $mes = date('m');
                        $dia = date('d');
                        $actual = $año."-".$mes."-".$dia;                
                        ?>


                        <div class="col-12">
                            <div class="form-group">
                                <label for="" class="form-label">calendarizar</label>
                                <input type="date" name="fecha" id="fecha" class="form-control" min="<?php echo $actual; ?>" required>
                            </div><br>
                        </div>
                    </div>

                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                <input class="form-control" type="file" name="foto" id="archivo" accept="image/png, image/gif, image/jpeg">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="links" id="te" aria-describedby="helpId" placeholder="pegar 'aqui' el link de la imagen" >
                                    <small id="helpId" class="form-text text-muted">(Opcional)</small>
                                </div>
                            </div>
                        </div>


                    <div class="row">
                        
                        <div class="col-6">
                            <input name="" id="mos" class="btn btn-primary" role="button" value="mostrar imagen del LINK" disabled></input>
                        </div>
                        <div class="col-6">
                            <input id="cam" class="btn btn-primary" id="clink" role="button" value="cambiar LINK"></input>
                        </div>
                    </div><br>
                    
                    
                    
                    <button type="" id="enviar" class="btn btn-primary">Submit</button>
                </form>

               

            
            <div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        
                    <div class="img"></div>
                        
                    </div>
                </div>
            </div>
            


        </div>
         

            <input  id="cots" value=<?php echo $_SESSION['data']['cot']; ?> hidden>
    </body>
    <br</br></br></br></br> <br</br></br></br>
    <div class="row">
        <?php include("estructura/footer.php"); ?><!-- pie de pagina -->
    </div>
   
    
</html>
<script>

$(document).ready(function() {

       var vals = $("#cots").val();



        if(vals==1){
            $("#selp").prop('disabled', true);
            $("#cam").prop('disabled', true);
            $("#enviar").prop('disabled', true);
            var form = document.getElementById("formc");
            var elements = form.elements;
            for (var i = 0, len = elements.length; i < len; ++i) {
                elements[i].readOnly = true;
            }

            let timerInterval
            Swal.fire({
            title: '!!!ATENCION!!!',
            html: 'nuestra data indica que ya cuenta con una cotizacion realizada, se debe de concretar esta cotizacion para realizar una nueva.<br>MUCHAS GRACIAS<br><br> <a href="index.php">VOLVER A L MENU</a> <br><b></b>.',
            timer: 30000,
            timerProgressBar: true,
            didOpen: () => {
                Swal.showLoading()
                const b = Swal.getHtmlContainer().querySelector('b')
                timerInterval = setInterval(() => {
                b.textContent = Swal.getTimerLeft()
                }, 100)
            },
            willClose: () => {
                clearInterval(timerInterval)
            }
            }).then((result) => {
            /* Read more about handling dismissals below */
            if (result.dismiss === Swal.DismissReason.timer) {
                console.log('I was closed by the timer')
            }
            }) 
        }
        });

    
    $("#archivo").change(function(){   
        
        $("#te").prop('disabled', true);
        $("#cam").prop('disabled', true);
        $("#te").prop("disabled", this.files.length != 0);
        $("#cam").prop("disabled", this.files.length != 0);
        
    });


    $( "#te" ).change(function() {

        var $inp = $("#te").val();
        console.log($inp);

        if($inp!=""){
            
            $("#archivo").prop('disabled', true);
            $( ".img" ).append( "<img id='ni' src='"+$inp+"' width=100%' height='100%'></img>" );
            $("#te").prop('disabled', true);
            $("#mos").prop('disabled', false);
        }

    });

    $( "#enviar" ).click(function() {

        Swal.fire({
        title: 'Segur@ que desea continuar?',
        showDenyButton: true,
        confirmButtonText: 'Confirmar',
        denyButtonText: `Volver`,
        }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) { 
            
            var p = $("#porciones").val();
            var d = $("#detalle").val();
            var f = $("#fecha").val();
            console.log(p);
            if(p=="" || d=="" || f==""){
                Swal.fire('Complete todos los campos')
            }else{
                Swal.fire('Cotizacion realizada!', '', 'success')
                $("#te").prop('disabled', false);
                $("#archivo").prop('disabled', false);
                $("#formc").submit();
            }

        } else if (result.isDenied) {
            Swal.fire('Tome se su tiempo :D', '', 'info')
        }
        })

    });


    $( "#mos" ).click(function() {

        $("#miModal").modal("show");

    });

    $( "#cam" ).click(function() {

        $( "#ni" ).remove();
        $("#te").prop('disabled', false);
        $("#te").val("");
        $("#mos").prop('disabled', true);
        $("#archivo").prop('disabled', false);

    });
</script>