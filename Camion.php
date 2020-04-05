<?php
include "src/session_start.php";
include "config/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>MyGeoStop/Camion - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php
    include "src/Estilos.html"
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
                    <strong class="card-title">Camión</strong>

                    <button type="añadir" class='button2' name="añadir" id="Añadir"><a href="Crear_camion.php"
                                                                                       id="Añadir"> Añadir</a></button>
                </div>
                <div class="card-body">
                    <?php
                     if (isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                     
                     }
                     if (isset($_SESSION['error'])){
                         echo $_SESSION['error'];
                         unset ($_SESSION['error']);
                         
                     }
                     
                     
                     ?>
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
                                                        <th>Tipo de contenedor que recoge</th>
                                                        <th>Matrícula_camión</th>
                                                        <th>Marca</th>
                                                        <th>Modelo</th>
                                                        <th>Latitud</th>
                                                        <th>Longitud</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                    </thead>


                                          <?php

                                                    //Mostrar contenedores

                                                    $sql = "SELECT t.Tipo_contenedor,c.Matricula_camion,Marca,Modelo,c.Id_camion,c.Latitud,c.Longitud from Camion c,Tipo_contenedor t where id_tipo_contenedor = idTipo;";
                                                    $result = mysqli_query($db, $sql);
                                                    $resultCheck = mysqli_num_rows($result);

                                                    if ($resultCheck > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {

                                                            echo "<tr>";
                                                            echo "<td>$row[Tipo_contenedor]</td>";
                                                            echo "<td>$row[Matricula_camion]</td>";
                                                            echo "<td>$row[Marca]</td>";
                                                            echo "<td>$row[Modelo]</td>";
                                                            echo "<td>$row[Latitud]</td>";
                                                            echo "<td>$row[Longitud]</td>";
                                                            echo "<td>
                                       <button type='editar' class='button' name='editar'><a href=Editar_camion.php?Id_camion=$row[Id_camion] id='Editar'>Editar</a></button>
                                 </td>
                                 ";


                                                            echo "
                                <td> <button type='submit' class='button1' name='eliminar' ><a href=Eliminar_camion.php?Id_camion=$row[Id_camion] id = 'Eliminar' onclick='return confirmDelete()'> Eliminar</a></td>";


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