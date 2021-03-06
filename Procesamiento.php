<?php
include "src/session_start.php";
include "config/conexion.php";
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
    <meta http-equiv="Content-type" content="text/html;">
    <title>MyGeoStop/Procesamiento - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include "src/Estilos.html";
    ?>
    <script>
        function confirmDelete() {
            if (confirm("¿Estás seguro de que quieres eliminar esta fila?") === true) {
                alert("Fila eliminada");
                return true;
            } else {
                alert("Operación cancelada");
                return false;
            }
        }
    </script>
</head>
<body>
<!-- Menú-->

<?php include "src/menu.php";
?>


<!-- Menú  -->

<!-- Right Panel -->

<div id="right-panel" class="right-panel">

    <!-- Header-->
    <?php
    include "head.php";
    ?>


    <div class="content">
        <div class="animated fadeIn">


            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title">Procesamiento</strong>

                    <button type="añadir" class='button2' name="añadir" id="Añadir"><a href="Crear_procesamiento.php"
                                                                                       id="Añadir"> Añadir</a></button>
                </div>
                <div class="card-body">

                    <div class="fontawesome-icon-list">
                        <div class="content">
                            <div class="animated fadeIn">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <table id="bootstrap-data-table"
                                                       class="table table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Procesamiento</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                    </thead>

                                                    <?php

                                                    //Mostrar contenedores

                                                    $sql = "SELECT * from Tipo_procesamiento;";
                                                    $result = mysqli_query($db, $sql);
                                                    $resultCheck = mysqli_num_rows($result);

                                                    if ($resultCheck > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                            echo "<tr>";
                                                            echo "<td>$row[Tipo_procesamiento]</td>";

                                                            echo "<td>
                                       <button type='editar' class='button' name='editar'><a href=Editar_procesamiento.php?id_tipo_procesamiento=$row[id_tipo_procesamiento] id='Editar'>Editar</a></button>
                                 </td>
                                 ";


                                                            echo "
                                <td> <button type='submit' class='button1' name='eliminar' ><a href=Eliminar_procesamiento.php?id_tipo_procesamiento=$row[id_tipo_procesamiento] id = 'Eliminar' onclick='return confirmDelete()'> Eliminar</a></td>";


                                                        }

                                                    }


                                                    ?>
                                                </table>


                                            </div>
                                        </div>
                                    </div>


                                </div>
                            </div><!-- .animated -->
                        </div><!-- .content -->
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