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
    <title>MyGeoStop/Editar estado - Francisco Jurado Contreras</title>
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
                    <strong class="card-title">Editar estado</strong>


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
                                                        <th>Estado</th>
                                                        <th>Operativo</th>
                                                    </tr>
                                                    </thead>

                                                    <form method="post" action="Guardar_estado.php" name="formulario">

                                                        <?php
                         
                           //variables
                         //recibir id
                         $id_estado = $_GET["id_estado"];


                         $sql = "SELECT * FROM Estado_contenedor where id_estado=$id_estado;"; 
                     


                         $result = mysqli_query($db, $sql);
                                  
                         $resultCheck = mysqli_num_rows($result);


                         while ($row = mysqli_fetch_assoc($result)){
                         
                         
                         echo "<tr>";


                                                        echo "
                                                        <td><input type='text' name='Estado' required
                                                                   value='$row[Estado]'></td>";

                                                        $Operativo=$row[Operativo];


                                                        }

                                                        echo"
                                                        <td>
                                                            <label name='Operativo' class='label'>
                                                                <select id='Operativo_id' name='Operativo'>";

                                                                    if ($Operativo==1){

                                                                    echo "
                                                                    <option value='1' selected>Sí</option>
                                                                    <option value='0'>No</option>
                                                                    ";
                                                                    }
                                                                    if ($Operativo==0){
                                                                    echo "
                                                                    <option value='1'>Sí</option>
                                                                    <option value='0' selected>No</option>
                                                                    ";
                                                                    }


                                                                    echo "</td>";

                                                        echo "</tr>";


                                                        ?>
                                                </table>


                                                <br>

                                                <input type="hidden" name="id_estado"
                                                       value="<?php echo $id_estado ?>"/>
                                                <br>
                                                <a href="Estado.php" class="btn btn-success btn-flat m-b-30 m-t-30">Atrás</a>

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