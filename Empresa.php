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
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>MyGeoStop/Empresa - Francisco Jurado Contreras</title>
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

<?php include "src/menu.php"
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
                    <strong class="card-title">Empresa</strong>

                    <button type="añadir" class='button2' name="añadir" id="Añadir"><a href="Crear_empresa.php"
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
                                                        <th>Nombre</th>
                                                        <th>Localidad</th>
                                                        <th>Procesamiento</th>
                                                        <th>Latitud</th>
                                                        <th>Longitud</th>
                                                        <th>Latitud y longitud</th>
                                                        <th>Teléfono</th>
                                                        <th>Editar</th>
                                                        <th>Eliminar</th>
                                                    </tr>
                                                    </thead>
    
                                                    <?php
                                                    
                                                    $sql = "SELECT id_empresa,e.id_localidad,Localidad,e.id_tipo_procesamiento,Tipo_procesamiento,Nombre, Latitud, Longitud,Telefono  from Empresa e,Localidad l,Tipo_procesamiento t where e.id_localidad = l.id_localidad and e.id_tipo_procesamiento = t.id_tipo_procesamiento ";
                                                    $result = mysqli_query($db, $sql);
                                                    $resultCheck = mysqli_num_rows($result);
                                                    if ($resultCheck > 0) {
                                                        while ($row = mysqli_fetch_assoc($result)) {


                                                            echo "<tr>";

                                                            echo "<td>$row[Nombre]</td>
                                      <td>$row[Localidad]</td>
                                      <td>$row[Tipo_procesamiento]</td>
                                      <td>$row[Latitud]</td>
                                      <td>$row[Longitud]</td>
                                      <td>$row[Latitud] $row[Longitud]</td>
                                      <td>$row[Telefono]</td>
                                      ";


                                                            //Por Get
                                                            //      echo "<td> <button type='editar' class='button' name='editar'><a href=editar_contenedor.php?Id_contenedor=$row[Id_contenedor]&Nombre=$row[Nombre]&Latitud=$row[Latitud]&Longitud=$row[Longitud] id='Editar'>Editar</a></button>        </td>
                                                            //Por Post
                                                            echo "<td> 
                               <button type='editar' class='button' name='editar'><a href=Editar_empresa.php?id_empresa=$row[id_empresa] id='Editar'>Editar</a></button>        </td> ";

                                                            /* Por Post
                                                             echo"  <td>
                                                                    <form name='formulario' method='post' action='editar_contenedor.php'>
                                                                    <input type='hidden' name='Nombre' value=$row[Nombre]>
                                                                    <input type='hidden' name='Id_contenedor' value=$row[Id_contenedor]>
                                                                    <input type='hidden' name='Latitud' value=$row[Latitud]>
                                                                    <input type='hidden' name='Longitud' value=$row[Longitud]>
                                                                    <input type='hidden' name='id_tipo_contenedor' value=$row[id_tipo_contenedor]>
                                                                    <input type='hidden' name='Tipo_contenedor' value='$row[Tipo_contenedor]'>

                                                                    <button type='submit' class='button' name='editar' id='editar'>Editar</button>
                                                                     </form>
                                                                     </td>
                                                                     ";
                                                                */

                                                            echo "    <td> <button type='submit' class='button1' name='eliminar' ><a 
                                    href=Eliminar_empresa.php?id_empresa=$row[id_empresa] id = 'Eliminar'
                                    onclick='return confirmDelete()'> Eliminar</a></td>";

                                                            echo "</tr>";
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