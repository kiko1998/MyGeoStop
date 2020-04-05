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
    <meta http-equiv="Content-type" content="text/html; charset=UTF-8">
    <title>MyGeoStop/Perfil - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <?php
        include "src/Estilos.html";
    ?>
    <script>
        function confirmDelete() {
            if (confirm("¿Estás seguro de que quieres eliminar este contenedor?") === true) {
                alert("Contenedor eliminado");
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
                    <strong class="card-title">Mi perfil</strong>

                </div>
                <div class="card-body">
                    <?php
                        if (isset($_SESSION['error_images'])) {
                            echo $_SESSION['error_images'];
                            unset ($_SESSION['error_images']);
                        }
                        if (isset($_SESSION['subida_correcta'])) {
                            echo $_SESSION['subida_correcta'];
                            unset ($_SESSION['subida_correcta']);
                        }
                    ?>
                    <div class="fontawesome-icon-list">
                        <div class="content">
                            <div class="animated fadeIn">
                                <div class="row">

                                    <div class="col-md-12">

                                        <div class="card">
                                            <div class="card-body">
                                                <?php
                                                    if (isset($_SESSION['error'])){
                                                    echo $_SESSION['error'];
                                                    unset($_SESSION['error']);
                                                    }
                                                   
                                                ?>
                                                <div class="mx-auto d-block">
                                                    <?php
                                                            $id_usuario = $_SESSION['id_usuario'];
                                                            
                                                            $sql = "Select * from Usuario where id_usuario = '$id_usuario'";
                                                            $result = mysqli_query($db, $sql);
                                                            
                                                            while($row = mysqli_fetch_assoc($result)){
                                                                $id_usuario = $row['id_usuario'];
                                                                $username = $row['username'];
                                                                $imagenes = $row['Imagenes'];
                                                                $Nombre = $row['Nombre_y_apellido'];
                                                                $Email = $row['email'];
                                                                echo "<img class='rounded-circle mx-auto d-block' id ='perfil' src='/assets/images/avatar/$imagenes' alt='Card image cap' width='510px' height='510px' '>";

                                                    echo "
                                                    <h5>
                                                        <div class='text-sm-center mt-2 mb-1'>$Nombre</div>
                                                    </h5>";

                                                    }
                                                    ?>

                                                </div>
                                                <hr>
                                                <!--
                                                <div class="card-text text-sm-center">
                                                    <a href="#"><i class="fa fa-facebook pr-1"></i></a>
                                                    <a href="#"><i class="fa fa-twitter pr-1"></i></a>
                                                    <a href="#"><i class="fa fa-linkedin pr-1"></i></a>
                                                    <a href="#"><i class="fa fa-pinterest pr-1"></i></a>
                                                </div>
                                                -->
                                            </div>
                                            <p>¡Bienvenido <strong><?php echo $Nombre; ?></strong> ! </p>
                                            <p>
                                                Aquí podrás editar tu contraseña para ello rellena el formulario de
                                                abajo.
                                            </p>

                                            <form method="POST" name="formulario-contraseña" action="Guardar_contraseña.php">

                                                <label class="formulario">Contraseña Antigua: <input type="password"
                                                                                                     class="formulario-perfil"
                                                                                                     placeholder="Antigua Contraseña"
                                                                                                     name="Contraseña_antigua"></label>

                                                <label class="formulario">Nueva Contraseña: <input type="password"
                                                                                                   class="formulario-perfil"
                                                                                                   placeholder="Nueva Contraseña"
                                                                                                   name="Contraseña_nueva"></label>

                                                <label class="formulario">Repetir Contraseña: <input type="password"
                                                                                                     class="formulario-perfil"
                                                                                                     placeholder="Repetir Contraseña"
                                                                                                     name="Contraseña_repetida"></label>

                                                <a href="cancelar_contraseña.php" class="btn btn-success btn-flat m-b-30 m-t-30">Cancelar</a>
                                                
                                                <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30"
                                                        name="Guardar">Actualizar Contraseña
                                                </button>
                                            </form>


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