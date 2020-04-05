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
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>MyGeoStop/Contenedores - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<?php
    include "src/Estilos.html"
?>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
    <!--<script type="text/javascript" src="jquery-3.4.1.min.js"></script>-->
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

<?php
    include "src/menu.php";
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
                        <strong class="card-title">Contenedores</strong>

                         <button type="añadir" class='button2' name="añadir" id = "Añadir" ><a href="Crear_contenedor.php" id ="Añadir"> Añadir</a></button>
                    </div>
                    <div class="card-body">

                        <div class="fontawesome-icon-list">
                            <div class="content">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                              
        <table id="bootstrap-data-table" class="table table-striped table-bordered"> 
                <thead>
                    <tr>
                                            <th>Nombre</th>
                                            <th>Latitud </th>
                                            <th>Longitud</th>
                                            <th>Latitud y longitud</th>
                                            <th>Color</th>
                                            <th>Tipo</th>
                                            <th>Estado</th>
                                            <th>Operativo</th>
                                            <th>Novedoso</th>
                                            <th>Editar</th>
                                            <th>Eliminar</th>
                                        </tr>
                                    </thead>

                                <?php
                                        //Mostrar contenedores

                                        //if (Operativo = 1 'Passed', 'Failed')as

                                $sql = "SELECT Id_contenedor,e.id_estado, Nombre, Color, Latitud, Longitud,Tipo_contenedor, id_tipo_contenedor, Estado,IF(Novedoso=1, 'Sí','No') Novedoso , IF(Operativo=1, 'Sí','No') Operativo from Contenedor c , Tipo_contenedor , Color, Estado_contenedor e, Novedoso n WHERE idTipo=id_tipo_contenedor and Color_idColor = idColor and c.id_estado = e.id_estado and Novedoso_id_Novedoso=id_Novedoso";
                                $result = mysqli_query($db, $sql);
                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {


                                        echo "<tr>";


                                        echo "<td>$row[Nombre]</td>
                                              <td>$row[Latitud]</td>
                                              <td>$row[Longitud]</td>
                                              <td>$row[Latitud] $row[Longitud]</td>
                                              <td>$row[Color]</td>
                                              <td>$row[Tipo_contenedor]</td>
                                              <td>$row[Estado]</td>
                                              <td>$row[Operativo]</td>
                                              <td>$row[Novedoso]</td>
        
                                              ";


                                        //Por Get
                                        //      echo "<td> <button type='editar' class='button' name='editar'><a href=editar_contenedor.php?Id_contenedor=$row[Id_contenedor]&Nombre=$row[Nombre]&Latitud=$row[Latitud]&Longitud=$row[Longitud] id='Editar'>Editar</a></button>        </td>
                                        //Por Post
                                        echo "<td> 
                                       <button type='editar' class='button' name='editar'><a href=Editar_contenedor.php?Id_contenedor=$row[Id_contenedor]&id_estado=$row[id_estado] id='Editar'>Editar</a></button>        </td> ";


                                        echo "    <td> <button type='submit' class='button1' name='eliminar' ><a 
                                            href=eliminar_contenedor.php?Id_contenedor=$row[Id_contenedor] id = 'Eliminar'
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
    include"src/foot.html";
    ?> 


    </div><!-- /#right-panel -->

   

    <!-- Script reducir el tamaño del menú de la izquierda -->
    <?php
    include "src/Reducir_menu.html";
    ?>


</body>
</html>