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
    <title>MyGeoStop/Container types - Francisco Jurado Contreras</title>
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
                        <strong class="card-title">Añadir un nuevo tipo de contenedor</strong>

                    </div>
                

                                                 
                              <div class="card-body">

                        <div class="fontawesome-icon-list">

                        <form method="Post" >
                        <label class="label">
                        Añadir nuevo tipo de contenedor:        
                         <input type="text" required name="Añadir_tipo_contenedor"/>
                        </label>

                            <label class="label">Color:</label>
                            <label for="Color_id"></label><select id="Color_id" name="Color">
                                <option value="" selected>Selecciona</option>
        
                                <?php
            
                                    $sql = "SELECT * from Color;";
                                    
                                    $result = mysqli_query($db, $sql);
                                    
                                    $resultCheck = mysqli_num_rows($result);
            
                                    if ($resultCheck > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "$row[Color]";
                    
                                            //Consulta
                    
                                            echo "<option name='Color' value='$row[idColor]'>$row[Color]</option>";
                                        }
                                    }
                                ?>
                            </select>
                        <br>
                        <a href="Tipos_contenedores.php" class="btn btn-success btn-flat m-b-30 m-t-30" id="Guardar">Atrás</a>
                        <button type="Guardar" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar" id ="Guardar">Guardar</button>
                        <br>
                        <?php 

                           //variables
                        $errors = array();

                         //recibir id

                        if (isset($_POST['Guardar'])) {
                           $Añadir_tipo_contenedor = mysqli_real_escape_string($db, $_POST['Añadir_tipo_contenedor']);
                           $Color = mysqli_real_escape_string($db, $_POST['Color']);
                            
                            if (empty($Añadir_tipo_contenedor )) {
                            array_push($errors, "Ingrese un nombre para el contenedor"); 
                        }


                              $query ="INSERT INTO Tipo_contenedor (Tipo_contenedor,Color_id) VALUES ('$Añadir_tipo_contenedor','$Color')";
                              $result = utf8_encode(mysqli_query($db, $query));
                              $user = mysqli_fetch_assoc($result);

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
    <?php
    include "src/Reducir_menu.html";
    ?>


</body>
</html>