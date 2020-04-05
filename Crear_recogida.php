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
    <title>MyGeoStop/Crear recogida - Francisco Jurado Contreras</title>
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
                    <strong class="card-title">Añadir recogida</strong>


                </div>


                <div class="card-body">

                    <div class="fontawesome-icon-list">

                        <form method="POST">


                            <label id="Servicio_id"  class="label">Servicio:</label>
                            <label for="Servicio_id"></label><select id="Servicio_id" name="id_servicio">
                                <option value="" selected>Selecciona</option>

                                //language=php
                                <?php
                                    
                                    //language=php
                                    /**@lang php */
                                    
                                    $sql = "SELECT * from Servicio;";
                                    
                                    $result = mysqli_query($db, $sql);
                                    
                                    $resultCheck = mysqli_num_rows($result);
                                    
                                    if ($resultCheck > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "$row[Nombre_servicio]";
                                            
                                            
                                            echo "<option name='Nombre_servicio' value='$row[id_servicio]'>$row[Nombre_servicio]</option>";
                                        }
                                    }
                                ?>
                            </select>

                            <label id="Contenedor_id" class="label">Contenedor:</label>
                            <label for="Id_contenedor"></label><select id="Id_contenedor" name="Id_contenedor">
                                <option value="" selected>Selecciona</option>
                                
                                <?php
                                    
                                    /**@lang php */
                                    
                                    $sql = "SELECT * from Contenedor;";
                                    
                                    $result = mysqli_query($db, $sql);
                                    
                                    $resultCheck = mysqli_num_rows($result);
                                    
                                    if ($resultCheck > 0) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo "$row[Nombre]";
                                            
                                            
                                            echo "<option name='Contenedor_nombre' value='$row[Id_contenedor]'>$row[Nombre]</option>";
                                        }
                                    }
                                ?>
                            </select>
                            <br>
                            <label class="label">
                                Fecha recogida:
                                <input type="date" required name="Fecha_recogida"/>
                            </label>
                            <label class="label">
                                Horario recogida:
                                <input type="time" name="Horario_recogida">
                            </label>
                            <br>
                            <a href="Recogida.php" class="btn btn-success btn-flat m-b-30 m-t-30" id="Guardar">Atrás</a>

                            <button type="Guardar" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar"
                                    id="Guardar">Guardar
                            </button>
                            <br>
                            
                            
                            <?php
                                
                                
                                //variables
                                
                                $errors = array();
                                
                                //recibir id
                                
                                if (isset($_POST['Guardar'])) {
                                    $id_servicio = mysqli_real_escape_string($db, $_POST['id_servicio']);
                                    
                                    $Id_contenedor = mysqli_real_escape_string($db, $_POST['Id_contenedor']);
                                    
                                    $Fecha_recogida = mysqli_real_escape_string($db, $_POST['Fecha_recogida']);
                                    
                                    $Horario_recogida = mysqli_real_escape_string($db, $_POST['Horario_recogida']);
                                    //Mostrar (t)odo lo que devuelve el post
                                    
                                    
                                    $query = "INSERT INTO Recogida (id_servicio,Id_contenedor,Fecha_recogida,Horario_recogida)
            VALUES ('$id_servicio','$Id_contenedor','$Fecha_recogida','$Horario_recogida')";
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