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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGeoStop/Home - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
<?php
        include "src/Estilos.html";
?>
    


</head>

<body>
<!-- Left Panel -->
<?php
    include("src/menu.php")
?>

<div id="right-panel" class="right-panel">
    <?php include("head.php")
    ?>

    <div class="content">
        <div class="animated fadeIn">


            <div class="card">
                
                <div class="card-body">

                    <div class="fontawesome-icon-list">
                        <div class="content">
                            <div class="animated fadeIn">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <p>MyGeoStop es un software el cual trata problemas relacionados con los contenedores
                                                    y el reciclaje.
                                                </p>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col-md-4 -->
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>

            </div>
        </div>
    </div>
<!-- /#add-category -->
<!-- .animated -->
<!-- /.content -->
<div class="clearfix"></div>
<!-- Footer -->

<?php
    include('src/foot.html');
?>
</div>

<!-- Scripts -->
<?php
    include "src/Reducir_menu.html";
?>


<!--Local Stuff-->

</body>
</html>
