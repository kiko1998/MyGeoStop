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
    <title>MyGeoStop/Crear empresa - Francisco Jurado Contreras</title>
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
                    <strong class="card-title">Añadir una nueva empresa</strong>


                </div>


                <div class="card-body">

                    <div class="fontawesome-icon-list">

                        <form method="POST">


                            <label class="label"> Nombre:
                                <input type="text" required name="Nombre"/>
                            </label>
                         
                            <label class="label">Latitud:
                                <input name="Latitud" required type="text"/>
                            </label>

                            
                            <label class="label">
                            Longitud:
                            <input type="text" required name="Longitud"/>
                            </label>
                          <br>
                            <label class="label">
                            Teléfono:
                            <input type="text" required name="Telefono"/>
                            </label>
                            
                            <label id="Localidad_id" name="Localidad" class="label">Localidad:</label>
                            <label for="Localidad_id"></label><select id="Localidad_id" name="Localidad">
                                <option value="" selected>Selecciona</option>

                                <?php

                                $sql = "SELECT * from Localidad;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Localidad]";


                                        echo "<option name='Localidad' value='$row[id_localidad]'>$row[Localidad]</option>";
                                    }
                                }
                                ?>
                            </select>

                            <label id="Procesamiento_id" name="Tipo_procesamiento" class="label">Procesamiento:</label>
                            <label for="Tipo_procesamiento"></label><select id="Tipo_procesamiento" name="Tipo_procesamiento">
                                <option value="" selected>Selecciona</option>

                                <?php


                                $sql = "SELECT * from Tipo_procesamiento;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Tipo_procesamiento]";


                                        echo "<option name='Tipo_procesamiento' value='$row[id_tipo_procesamiento]'>$row[Tipo_procesamiento]</option>";
                                    }
                                }
                                ?>
                            </select>


                            <br>
                            <a href="Empresa.php" class="btn btn-success btn-flat m-b-30 m-t-30" id="Guardar">Atras</a>
                            <button type="Guardar" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar"
                                    id="Guardar">Guardar
                            </button>
                            <br>


                            <?php


                            //variables

                            $errors = array();

                            //recibir id

                            if (isset($_POST['Guardar'])) {
                                $id_localidad = mysqli_real_escape_string($db, $_POST['Localidad']);
                                $id_tipo_procesamiento = mysqli_real_escape_string($db, $_POST['Tipo_procesamiento']);
                                $Nombre = mysqli_real_escape_string($db, $_POST['Nombre']);
                                $Telefono = mysqli_real_escape_string($db, $_POST['Telefono']);
                                $Latitud = mysqli_real_escape_string($db, $_POST['Latitud']);
                                $Longitud = mysqli_real_escape_string($db, $_POST['Longitud']);
                                //Mostrar (t)odo lo que devuelve el post


                                $query = "INSERT INTO Empresa (id_localidad,id_tipo_procesamiento,Nombre,Telefono,Latitud,Longitud) 
            VALUES ('$id_localidad','$id_tipo_procesamiento','$Nombre','$Telefono','$Latitud','$Longitud')";
                                $result = utf8_encode(mysqli_query($db, $query));

                                if ($result == false) {
                                    echo '<p>Error al modificar los campos en la tabla.</p>';
                                } else {
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
    include "src/foot.html";
    ?>


</div><!-- /#right-panel -->


<!-- Script reducir el tamaño del menú de la izquierda -->
<?php
include "src/Reducir_menu.html";
?>


</body>
</html>