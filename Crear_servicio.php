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
    <title>MyGeoStop/Crear servicio - Francisco Jurado Contreras</title>
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
    <!--Header-->


    <div class="content">
        <div class="animated fadeIn">


            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title">Añadir un nuevo servicio</strong>

                </div>


                <div class="card-body">

                    <div class="fontawesome-icon-list">

                        <form method="POST">


                            <label id="Usuario_id" name="Nombre_y_apellido" class="label">Usuario:</label>
                            <label for="Nombre_y_apellido"><select id="Nombre_y_apellido"
                                                                           name="Nombre_y_apellido">
                                <option value="" selected>Selecciona</option>

                                <?php


                                $sql = "SELECT * from Usuario where id_tipo_usuario=3;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Nombre_y_apellido]";


                                        echo "<option name='Nombre_y_apellido' value='$row[id_usuario]'>$row[Nombre_y_apellido]</option>";
                                    }
                                }
                                ?>
                            </select>
                            </label>
                            
                            
                            <label name="Camion" class="label">Matrícula del camión que conduce:</label>
                            <label for="Camion_id"><select id="Camion_id" name="Camion">
                                <option value="" selected>Selecciona</option>

                                <?php

                                $sql = "SELECT * from Camion;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Matricula_camion]";

                                        //Consulta

                                        echo "<option name='Camion' value='$row[Id_camion]'>$row[Matricula_camion]</option>";
                                    }
                                }
                                ?>
                            </select>
                            </label>
                            
                            <label name="Ruta" class="label">Ruta:</label>
                            <label for="Ruta_id"><select id="Ruta_id" name="Ruta">
                                <option value="" selected>Selecciona</option>

                                <?php

                                $sql = "SELECT * from Ruta;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Nombre_ruta]";

                                        //Consulta

                                        echo "<option name='Ruta' value='$row[Id_ruta]'>$row[Nombre_ruta]</option>";
                                    }
                                }
                                ?>
                            </select>
                            </label>
                            <br>
                            <label class = "label">
                                Fecha de inicio:
                                <input type="date" required name="Fecha_inicio"/>
                            </label>
                            
                            <label class="label">
                                Fecha de fin:
                                <input type="date" required name="Fecha_fin"/>
                            </label>
                            
                            <label class="label">
                                Nombre del servicio:
                                <input type="text" name="Nombre_servicio" required/>
                            </label>
                            <?php

                            $errors = array();

                            //recibir id

                            if (isset($_POST['Guardar'])) {
                                $Id_usuario = mysqli_real_escape_string($db, $_POST['Nombre_y_apellido']);

                                $Id_camion = mysqli_real_escape_string($db, $_POST['Camion']);

                                $Ruta = mysqli_real_escape_string($db, $_POST['Ruta']);

                                $Fecha_inicio = mysqli_real_escape_string($db, $_POST['Fecha_inicio']);

                                $Fecha_fin = mysqli_real_escape_string($db, $_POST['Fecha_fin']);

                                $Nombre_servicio = mysqli_real_escape_string($db, $_POST['Nombre_servicio']);
                                
                                //Mostrar (t)odo lo que devuelve el post
                                $query = "INSERT INTO Servicio (Id_usuario,Id_camion,Id_ruta,Fecha_inicio,Fecha_fin,Nombre_servicio) VALUES ('$Id_usuario','$Id_camion','$Ruta','$Fecha_inicio','$Fecha_fin','$Nombre_servicio')";
                                $result = utf8_encode(mysqli_query($db, $query));

                                if ($result == false) {
                                    echo '<p>Error al modificar los campos en la tabla.</p>';
                                } else {
                                    echo '<p>Los datos se han modificado correctamente.</p>';
                                }
                            }


                            ?>


                            <br>
                            <a href="Servicio.php" class="btn btn-success btn-flat m-b-30 m-t-30" id="Guardar">Atrás</a>
    
                            <button type="Guardar" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar"
                                    id="Guardar">Guardar
                            </button>
                            <br>
                        </form>


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