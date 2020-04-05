<?php 
 include "src/session_start.php";
 include "config/conexion.php";
 include "config/server.php";
?>

<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>MyGeoStop/Crear procesamiento - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include "src/Estilos.html";
    ?>

</head>
<body>
    <!-- Menú-->

     <?php include("src/menu.php")
   ?>


    <!-- Menú  -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include("head.php")
        ?>
        <!-- Header-->
        
      

        <div class="content">
            <div class="animated fadeIn">


                <div class="card">
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title">Añadir una nueva procesamiento</strong>

                         
                    </div>
                

                                                 
                              <div class="card-body">

                        <div class="fontawesome-icon-list">

                        <form method="POST" >
                       <label class="label">
                       Nombre del tipo procesamiento:        
                         <input type="text" required name="Tipo_procesamiento"/>
                       </label>
                         <br>
                     
                    
                        
                         <br>
                            <a href="Procesamiento.php" class="btn btn-success btn-flat m-b-30 m-t-30" id="Guardar">Atrás</a>
                            <button type="Guardar" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar" id ="Guardar">Guardar</button>
                        <br>
                        </form>

                       
                        <?php 


                           //variables
                            
                        $Tipo_procesamiento = "";
                        $errors = array(); 

                         //recibir id

                        if (isset($_POST['Guardar'])) {
                           $Tipo_procesamiento = mysqli_real_escape_string($db, $_POST['Tipo_procesamiento']);

                           //Mostrar (t)odo lo que devuelve el post


                              $query ="INSERT INTO Tipo_procesamiento (Tipo_procesamiento) VALUES ('$Tipo_procesamiento')";
                              $result = utf8_encode(mysqli_query($db, $query));

                        if($result == false) {
                                echo '<p>Error al modificar los campos en la tabla.</p>';
                        }else{
                                echo '<p>Los datos se han modificado correctamente.</p>';
                            }
               }





                         ?>



                        
                        </div>

                    </div>
                </div>



            </div><!-- .animated -->
        </div><!-- .content -->
    <div class="clearfix"></div>

    <?php
    include"src/foot.html";
    ?> 


    </div><!-- /#right-panel -->

   

    <!-- Script reducir el tamaño del menú de la izquierda -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="assets/js/main.js"></script>


</body>
</html>