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
    <title>MyGeoStop/Editar contenedor - Francisco Jurado Contreras</title>
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
                    <strong class="card-title">Editar empresa</strong>

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
                                                        <th>Latitud</th>
                                                        <th>Longitud</th>
                                                        <th>Teléfono</th>
                                                        <th>Localidad</th>
                                                        <th>Procesamiento</th>

                                                    </tr>
                                                    </thead>

                                                    <form method="post" action="Guardar_empresa.php" name="formulario">

                                                        <?php
                         

                         //recibir valores del anterior formulario
                         $id_empresa = $_GET["id_empresa"];
                         
                        
                           //Consulta
                            $sql ="SELECT id_empresa,e.id_localidad,e.id_tipo_procesamiento,Nombre,Telefono, Latitud, Longitud,Localidad,Tipo_procesamiento from Empresa e,Tipo_procesamiento t,Localidad l WHERE e.id_empresa =$id_empresa  and e.id_localidad = l.id_localidad and e.id_tipo_procesamiento = t.id_tipo_procesamiento" ;
                                  $result = mysqli_query($db, $sql);
                                  $resultCheck = mysqli_num_rows($result);
                              


                                


                  while ($row = mysqli_fetch_assoc($result)){
                                $Nombre=$row['Nombre'];
                                $Latitud=$row['Latitud'];
                                $Longitud=$row['Longitud'];
                                $Telefono=$row['Telefono'];

                         echo "<tr>";


                                                        echo "
                                                        <td><input type='text' name='Nombre' required
                                                                   value='$row[Nombre]'></td>
                                                        <td><input type='text' name='Latitud' required
                                                                   value='$row[Latitud]'></td>
                                                        <td><input type='text' name='Longitud' required
                                                                   value='$row[Longitud]'></td>
                                                        <td><input type='text' name='Telefono' required
                                                                   value='$row[Telefono]'></td>

                                                        ";
                                                        }
                                                        //Consulta para el estado
                                                        echo"
                                                        <td>
                                                            <label name='id_localidad'>

                                                                <select id='Localidad_id' name='id_localidad' selected>";


                                                                    $sql ="SELECT * from Localidad;";

                                                                    $result = mysqli_query($db, $sql);

                                                                    $resultCheck = mysqli_num_rows($result);

                                                                    if ($resultCheck > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                    $id_localidad = $row['id_localidad'];
                                                                    if ($id_localidad == $id_localidad){

                                                                    echo"
                                                                    <option name='id_localidad'
                                                                            value='$row[id_localidad]' selected>
                                                                        $row[Localidad]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    else{
                                                                    echo"
                                                                    <option name='id_localidad'
                                                                            value='$row[id_localidad]'>$row[Localidad]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    }

                                                                    }
                                                                    echo "</td>";


                                                        //Procesamiento
                                                        echo"
                                                        <td>
                                                            <label name='id_tipo_procesamiento'>

                                                                <select id='Procesamiento_id'
                                                                        name='id_tipo_procesamiento' selected>";


                                                                    $sql ="SELECT * from Tipo_procesamiento;";

                                                                    $result = mysqli_query($db, $sql);

                                                                    $resultCheck = mysqli_num_rows($result);

                                                                    if ($resultCheck > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                    $id_tipo_procesamiento =
                                                                    $row['id_tipo_procesamiento'];
                                                                    if ($id_tipo_procesamiento ==
                                                                    $id_tipo_procesamiento){

                                                                    echo"
                                                                    <option name='id_tipo_procesamiento'
                                                                            value='$row[id_tipo_procesamiento]'
                                                                            selected>$row[Tipo_procesamiento]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    else{
                                                                    echo"
                                                                    <option name='id_tipo_procesamiento'
                                                                            value='$row[id_tipo_procesamiento]'>
                                                                        $row[Tipo_procesamiento]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    }

                                                                    }
                                                                    echo "</td>";


                                                        echo "</tr>";


                                                        ?>
                                                </table>


                                                <br>

                                                <input type="hidden" name="id_empresa"
                                                       value="<?php echo $id_empresa ?>"/>
                                                <br>
                                                <a href="Empresa.php" class="btn btn-success btn-flat m-b-30 m-t-30">Atrás</a>
                                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"
                                                        name="Guardar" id="Guardar">Guardar</a></button>
                                                <br>

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