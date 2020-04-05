<?php
include "src/session_start.php";
include "config/conexion.php";
include "config/server.php";
?>

<!doctype html>
<!--[if lt IE 7]>
<html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>MyGeoStop/Crear camion - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include "src/Estilos.html"
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
                    <strong class="card-title">Añadir un nuevo camión</strong>


                </div>


                <div class="card-body">
                   <?php if(isset($_SESSION['success'])){
                       echo $_SESSION['success'];
                       unset ($_SESSION['success']);
                       
                   } ?>
                    <div class="fontawesome-icon-list">

                        <form method="POST">


                            <label class="camion">Marca:
                                <input type="text" required name="Marca"/>
                            </label>

                            <label class="camion">Matricula_camion
                                <input type="text" required name="Matricula_camion"/>
                            </label>

                            <br>

                            <label class="camion">Modelo:
                                <input type="text" required name="Modelo"/>
                            </label>
                            
                            <label id="Tipo_contenedor_id"  class="camion">Tipo contenedor:</label>
                            <label for="Tipo_contenedor"></label><select id="Tipo_contenedor" name="Tipo_contenedor">
                                <option value="" selected>Selecciona</option>

                                <?php


                                $sql = "SELECT * from Tipo_contenedor;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Tipo_contenedor]";


                                        echo "<option name='Tipo_contenedor' value='$row[idTipo]'>$row[Tipo_contenedor]</option>";
                                    }
                                }
                                ?>
                            </select>
                            <br>
                            <label class="camion">Latitud:
                                <input type="text" required name="Latitud"/>
                            </label>
                            <label class="camion">Longitud:
                                <input type="text" required name="Longitud"/>
                            </label>
                            
                            <br>
                            <a href="Camion.php" class="btn btn-success btn-flat m-b-30 m-t-30" id="Guardar">Atrás</a>
                            
                            <button type="Guardar" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar"
                                    id="Guardar">Guardar
                            </button>
                        </form>
                        <?php

                        //variables

                        $errors = array();

                        /*recibir id*/

                        if (isset($_POST['Guardar'])) {
                            $Marca = mysqli_real_escape_string($db, $_POST['Marca']);
                            $Matricula_camion = mysqli_real_escape_string($db, $_POST['Matricula_camion']);
                            $Modelo = mysqli_real_escape_string($db, $_POST['Modelo']);
                            $id_tipo_contenedor = mysqli_real_escape_string($db, $_POST['Tipo_contenedor']);
                            $Latitud = mysqli_real_escape_string($db, $_POST['Latitud']);
                            $Longitud = mysqli_real_escape_string($db, $_POST['Longitud']);
    
                            //Mostrar todo lo que devuelve el post


                            $query = "INSERT INTO Camion (Marca,Matricula_camion,Modelo,id_tipo_contenedor,Latitud,Longitud)
                            VALUES ('$Marca','$Matricula_camion','$Modelo','$id_tipo_contenedor','$Latitud',$Longitud)";
                            $result = utf8_encode(mysqli_query($db, $query));

                            if ($result == false) {
                                echo '<p>Error al modificar los campos en la tabla.</p>';
                            } else {
                                $_SESSION['success'] = '<p style =\'color:green\'>Camión creado correctamente</p>';
                                
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
    include "src/foot.html";
    ?>


</div><!-- /#right-panel -->


<!-- Script reducir el tamaño del menú de la izquierda -->
<?php
include "src/Reducir_menu.html";
?>


</body>
</html>