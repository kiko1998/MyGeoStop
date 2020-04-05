<?php include('config/server.php') ?>

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
    <title>MyGeoStop/Registro - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include "src/Estilos.html";
    ?>
</head>
<body class="bg-dark">

<div class="sufee-login d-flex align-content-center flex-wrap">
    <div class="container">
        <div class="login-content">
            <div class="login-logo">
                <a href="index.php">
                    <img class="align-content" src="assets/images/logo.png" alt="">
                </a>
            </div>
            <div class="login-form">
                <form method="post" action="page-register.php">
                    <?php include('config/errors.php'); ?>
                    <div class="form-group">

                        <label>Nombre y apellido
                            <input type="text" name="Nombre_y_apellido" class="form-control" placeholder="Nombre y apellido" id="Input_register"
                                   >
                        </label>
                    </div>
                    <div class="form-group">

                        <label>Usuario
                            <input type="text" name="username" class="form-control" placeholder="Usuario" id="Input_register"
                                   >
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Correo electrónico
                        <input type="email" class="form-control" placeholder="Email" name="email" id="Input_register"
                               >
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Contraseña
                        <input type="password" class="form-control" placeholder="Contraseña" name="password_1" id="Input_register">
                        </label>
                    </div>
                    <div class="form-group">
                        <label>Repetir Contraseña
                        <input type="password" class="form-control" placeholder="Contraseña" name="password_2" id="Input_register">
                        </label>
                    </div>

                    <div class="checkbox">
                        <label>
                            <input type="checkbox"> Acepto términos y políticas
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-flat m-b-30 m-t-30" name="reg_user">Registrar
                    </button>

                    <div class="register-link m-t-15 text-center">
                        <p>¿Tienes una cuenta ? <a href="page-login.php"> Iniciar sesión</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include "src/Reducir_menu.html";
?>

</body>
</html>
