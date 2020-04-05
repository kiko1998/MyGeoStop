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
    <meta charset="utf-8">
    <meta http-equiv="Content-type" content="text/html; charset=utf-8"/>
    <title>MyGeoStop/Crear estado - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include "src/Estilos.html";
    ?>
    <link rel="stylesheet" href="assets/css/tipo_cont.css">


    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->

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
                    <strong class="card-title">Añadir un nuevo estado</strong>

                </div>


                <div class="card-body">

                    <div class="fontawesome-icon-list">

                        <form method="Post">
                            <label class="label">
                            Añadir nuevo estado:
                                <input type="text" required name="Estado"/>
                            </label>
                            
                            <label class="label">
                            Operativo:
                            <input type="text" required name="Operativo"/>
                            </label>
                            <br>
                            <a href="Estado.php" class="btn btn-success btn-flat m-b-30 m-t-30"
                                    id="Guardar">Atrás
                            </a>
                            <button type="Guardar" class="btn btn-success btn-flat m-b-30 m-t-30" name="Guardar"
                                    id="Guardar">Guardar
                            </button>
                            <br>
                            <?php
                            header('Content-Type: text/html; charset=ISO-8859-1');

                            //variables
                            $errors = array();

                            //recibir id

                            if (isset($_POST['Guardar'])) {
                                $Estado = mysqli_real_escape_string($db, $_POST['Estado']);
                                $Operativo = mysqli_real_escape_string($db, $_POST['Operativo']);

                                if (empty($Estado)) {
                                    array_push($errors, "Ingrese un estado");
                                }
                                if (empty($Operativo)) {
                                    array_push($errors, "Por favor diga si está operativo");
                                }


                                $query = "INSERT INTO Estado_contenedor (Estado,Operativo) VALUES ('$Estado','$Operativo')";
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