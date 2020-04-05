<?php
include "src/session_start.php";
include "config/conexion.php";
include "config/server.php";
?>

<!DOCTYPE html>
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
    <title>MyGeoStop/Crear contenedor - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/normalize.css@8.0.0/normalize.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/font-awesome@4.7.0/css/font-awesome.min.css">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/lykmapipo/themify-icons@0.1.2/css/themify-icons.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/pixeden-stroke-7-icon@1.2.3/pe-icon-7-stroke/dist/pe-icon-7-stroke.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.2.0/css/flag-icon.min.css">

    <link rel="stylesheet" href="assets/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

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
    <!--Header-->


    <div class="content">
        <div class="animated fadeIn">


            <div class="card">
                <div class="card-header">
                    <i class="mr-2 fa fa-align-justify"></i>
                    <strong class="card-title">Añadir un nuevo contenedor</strong>
                </div>


                <div class="card-body">

                    <div class="fontawesome-icon-list">

                        <form method="POST">

                            <label class="label">Nombre del contenedor:
                                <input class='label' type="text" required name="Nombre"/>
                            </label>
                            <label class="label">
                                Latitud:
                                <input class='label' type="text" placeholder="Ejemplo:34.234" required name="Latitud">
                            </label>
                            <label class="label">Longitud:
                                <input class='label' type="text" placeholder="Ejemplo:-23.563" required name="Longitud">
                            </label>

                            <br>
                            <label id="Tipo_contenedor_id" class="label">Tipo:</label>
                            <label for="Tipo_contenedor"><select id="Tipo_contenedor" name="Tipo_contenedor">
                                <option value="" selected>Selecciona</option>

                                <?php


                                $sql = "SELECT * from Tipo_contenedor;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Tipo_contenedor]";


                                        echo "<option name='Tipo_contenedor' value='$row[idTipo]'>$row[Tipo_contenedor]</option>";
                                    }
                                }
                                ?>
                            </select>
                            </label>
                            
                            <label class="label">Color:</label>
                            <label for="Color_id"><select id="Color_id" name="Color">
                                <option value="" selected>Selecciona</option>

                                <?php

                                $sql = "SELECT * from Color;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Color]";

                                        //Consulta

                                        echo "<option name='Color' value='$row[idColor]'>$row[Color]</option>";
                                    }
                                }
                                ?>
                            </select>
                            </label>
                            
                            <label class="label">Estado:</label>
                            <label for="Estado_id"><select id="Estado_id" name="Estado">
                                <option value="" selected>Selecciona</option>

                                <?php

                                $sql = "SELECT * from Estado_contenedor;";

                                $result = mysqli_query($db, $sql);

                                $resultCheck = mysqli_num_rows($result);

                                if ($resultCheck > 0) {
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "$row[Estado]";

                                        //Consulta

                                        echo "<option name='Estado' value='$row[id_estado]'>$row[Estado]</option>";
                                    }
                                }
                                ?>
                            </select>
                            </label>

                            <?php

                            //variables
                            $Nombre = "";

                            $Latitud = "";

                            $Longitud = "";

                            $Tipo_contenedor = "";


                            $errors = array();

                            //recibir id

                            if (isset($_POST['Guardar'])) {
                                $Nombre = mysqli_real_escape_string($db, $_POST['Nombre']);

                                $Latitud = mysqli_real_escape_string($db, $_POST['Latitud']);

                                $Longitud = mysqli_real_escape_string($db, $_POST['Longitud']);

                                $Tipo_contenedor = mysqli_real_escape_string($db, $_POST['Tipo_contenedor']);

                                $Color = mysqli_real_escape_string($db, $_POST['Color']);

                                $id_estado = mysqli_escape_string($db, $_POST['Estado']);


                                //Mostrar (t)odo lo que devuelve el post
                                $query = "INSERT INTO Contenedor (Nombre,Latitud,Longitud,id_tipo_contenedor,Color_idColor,id_estado,Novedoso_id_Novedoso) VALUES ('$Nombre','$Latitud','$Longitud','$Tipo_contenedor','$Color','$id_estado',1)";
                                $result = utf8_encode(mysqli_query($db, $query));

                                if ($result == false) {
                                    echo '<p>Error al modificar los campos en la tabla.</p>';
                                } else {
                                    echo '<p>Los datos se han modificado correctamente.</p>';
                                }
                            }


                            ?>
                            <br>
                            <a href="Contenedores.php" class="btn btn-success btn-flat m-b-30 m-t-30" id="Guardar">Atrás</a>
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