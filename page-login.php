<?php include('config/server.php') ?>

<!DOCTYPE html>
<html class="no-js" lang=""> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>MyGeoStop/Iniciar sesión - Francisco Jurado Contreras</title>
    <meta name="description" content="Ela Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php
    include "src/Estilos.html";
    ?>

    <!-- <script type="text/javascript" src="https://cdn.jsdelivr.net/html5shiv/3.7.3/html5shiv.min.js"></script> -->
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
                    <?php
                    if (isset($_SESSION['success'])){
                        echo $_SESSION['success'];
                        unset ($_SESSION['success']);
                    }

                    ?>
                        <form method="post" action="page-login.php">
                        <?php include('config/errors.php'); ?>
                        
                        <div class="form-group">
                            <label>Usuario</label>
                            <input type="text" class="form-control" placeholder="Username" name="username">
                        </div>
                        <div class="form-group">
                            <label>Contraseña</label>
                            <input type="password" class="form-control" placeholder="Password" name="password">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="remember" id="remember" checked > Recuérdame
                            </label>
                            <label class="pull-right">
                                <a href="pages-forget.php">Recordar contraseña</a>
                            </label>

                        </div>
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30" name="login_user">Iniciar sesión</button>
                        
                        <div class="register-link m-t-15 text-center">
                            <p>¿No tienes cuenta ? <a href="page-register.php">Regístrate aquí</a></p>
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
