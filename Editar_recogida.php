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
    <title>MyGeoStop/Editar recogida - Francisco Jurado Contreras</title>
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
                    <strong class="card-title">Editar recogida</strong>

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
                                                        <th>Nombre servicio</th>
                                                        <th>Contenedor</th>
                                                        <th>Fecha recogida</th>
                                                        <th>Horario recogida</th>
                                                    </tr>
                                                    </thead>

                                                    <form method="POST" action="Guardar_recogida.php" name="formulario">

                                                        <?php
                         

                         //recibir valores del anterior formulario
                         $Id_recogida = $_GET["Id_recogida"];
                      
                        
                           //Consulta
                            $sql ="SELECT r.Id_recogida,s.Nombre_servicio,c.Id_contenedor,r.Fecha_recogida ,r.Horario_recogida,r.id_servicio from Recogida r,Servicio s,Contenedor c where s.id_servicio=r.id_servicio and c.Id_contenedor=r.Id_contenedor and Id_recogida= $Id_recogida;" ;
                        
                            $result = mysqli_query($db, $sql);
                         
                            $resultCheck = mysqli_num_rows($result);
                              


                                
                          //Consulta para el estado
                          while ($row = mysqli_fetch_assoc($result)){
                         echo "<tr>";

                                                        $id_servicio=$row['id_servicio'];

                                                        $id_contenedor=$row['Id_contenedor'];

                                                        $Fecha_recogida=$row['Fecha_recogida'];

                                                        $Horario_recogida=$row['Horario_recogida'];

                                                        $Id_recogida=$row['Id_recogida'];

                                                        echo "
                                                        <td>
                                                            <label name='Servicio'>

                                                                <select id='id_servicio' name='Servicio_id' selected>";

                                                                    $sql ="SELECT * from Servicio;";

                                                                    $result = mysqli_query($db, $sql);

                                                                    $resultCheck = mysqli_num_rows($result);

                                                                    if ($resultCheck > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                    $Id_servicio = $row['id_servicio'];
                                                                    if ($Id_servicio == $id_servicio){

                                                                    echo"
                                                                    <option name='id_servicio' value='$row[id_servicio]'
                                                                            selected>$row[Nombre_servicio]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    else{
                                                                    echo"
                                                                    <option name='id_servicio'
                                                                            value='$row[id_servicio]'>
                                                                        $row[Nombre_servicio]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    }

                                                                    }
                                                                    echo "</td>";


                                                        echo"
                                                        <td>
                                                            <label name='Contenedor'>

                                                                <select id='Id_contenedor' name='Contenedor_id'
                                                                        selected>";

                                                                    $sql ="SELECT * from Contenedor;";

                                                                    $result = mysqli_query($db, $sql);

                                                                    $resultCheck = mysqli_num_rows($result);

                                                                    if ($resultCheck > 0) {
                                                                    while ($row = mysqli_fetch_assoc($result)){

                                                                    $Id_contenedor = $row['Id_contenedor'];
                                                                    if ($Id_contenedor == $id_contenedor){

                                                                    echo"
                                                                    <option name='id_contenedor'
                                                                            value='$row[Id_contenedor]' selected>
                                                                        $row[Nombre]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    else{
                                                                    echo"
                                                                    <option name='id_contenedor'
                                                                            value='$row[Id_contenedor]'>$row[Nombre]
                                                                    </option>
                                                                    ";
                                                                    }


                                                                    }

                                                                    }
                                                                    echo "</td>";


                                                        echo "
                                                        <td>
                                                            <input type='date'  name='Fecha_recogida' required
                                                                   value='$Fecha_recogida'/>
                                                                                                                        <br>";
                                                            echo"
                                                        </td>
                                                        <td>
                                                            <input type='time' name='Horario_recogida' required
                                                                   value='$Horario_recogida'/>
                                                        </form>
                                                            <br>
                                                        </td>
                                                        ";
                                                        
                                                        echo "</tr>";
                                                        }
                                                        ?>

                                                </table>


                                                <br>

                                                <input type="hidden" name="Id_recogida"
                                                       value="<?php echo $Id_recogida ?>"/>
                                                <br>
                                                <a href="Recogida.php" class="btn btn-success btn-flat m-b-30 m-t-30">Atrás</a>

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