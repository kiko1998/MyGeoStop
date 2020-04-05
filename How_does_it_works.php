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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGeoStop/¿Como funciona? - Francisco Jurado Contreras</title>
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

        <div class="breadcrumbs">
            <div class="breadcrumbs-inner">
                <div class="row m-0">
                    <div class="col-sm-4">
                        <div class="page-header float-left">
                            <div class="page-title">
                                <h1>Inicio</h1>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="page-header float-right">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Inicio</a></li>
                                    <li class="active">¿Como funciona?</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            <div class="animated fadeIn">


                <div class="card">
                    <div class="card-header">
                        <i class="mr-2 fa fa-align-justify"></i>
                        <strong class="card-title">¿Como funciona?</strong>
                    </div>
                    <div class="card-body">

                        <div class="fontawesome-icon-list">

                            <div id="new">
                                <h2>1-¿Se actualiza con los contenedores nuevos que van apareciendo?</h2>
                                    <ul><h5 class="page-header"><li>Sí, está <strong>completamente actualizada</strong> y los nuevos contenedores no tardan en aparecer en nuestra web.</li></h5></ul> 
                                </div>

                            <section id="web-application">
                                <h2>2-¿Existe algún tipo de coste en que yo use esta página?</h2>
                                <ul><h5 class="page-header"><li>No, la página es totalmente <strong>gratuita</strong> solo necesitará registrarse y podrá acceder al 100% de la funcionalidad de la web.</li></h5> </ul>    
                               

                            </section>

                            <section id="web-application">
                                <h2>3-He visto un error/me gustaría que a demás de contenedores mostrara otro elemento ¿Como me pongo en contacto con vosotros?</h2>
                                <ul><h5 class="page-end"><li>En el mismo menú en el que está este apartado de "Preguntas frecuentes" hay otro llamado "Dudas y funciones para añadir" en el que podrás escribirnos en un tablón todas aquellas dudas y cuestiones que gustes</li></h5>
                                </ul>

                               
                            </section>

                          

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
