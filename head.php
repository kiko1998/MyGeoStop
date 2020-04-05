<header id="header" class="header">
    <div class="top-left">
        <div class="navbar-header">
            <a class="navbar-brand" href="./"><img src="assets/images/logo.png" alt="Logo"></a>
            <a class="navbar-brand hidden" href="./"><img src="assets/images/logo2.png" alt="Logo"></a>
            <a id="menuToggle" class="menutoggle"><i class="fa fa-bars"></i></a>
        </div>
    </div>
    <div class="top-right">
        <div class="header-menu">
            <div class="header-left">
                <button class="search-trigger"><i class="fa fa-search"></i></button>
                <div class="form-inline">
                    <form class="search-form">
                        <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                        <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                    </form>
                </div>


            </div>

            <div class="user-area dropdown float-right">
                <a href="#" class="dropdown-toggle active" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <?php
                     
                     if (isset($_SESSION['id_usuario'])) {
                         $id_usuario = $_SESSION['id_usuario'];
    
                         $sql = "Select * from Usuario where id_usuario = '$id_usuario'";
    
                         $result = mysqli_query($db, $sql);
    
                         while ($row = mysqli_fetch_assoc($result)) {
        
                             $username = $row['username'];
                             $imagenes = $row['Imagenes'];
        
                             echo "<img class='user-avatar rounded-circle' src='assets/images/avatar/$imagenes' alt='User Avatar'>";
                         }
                     }
                    ?>
                </a>

                <div class="user-menu dropdown-menu">
                    <a class="nav-link" href="#">
                        
                        
                        <?php if (isset($username)) : ?>
                            <p>Bienvenido <strong><?php echo $username; ?></strong></p>
                        <?php endif ?>
                        <?php if (!isset($_SESSION['username'])) : ?>
                            <p>no funciona</p>
                        <?php endif ?>

                    </a>
                    <a class="nav-link" href="perfil.php"><i class="fa fa-user"></i>Mi perfil</a>
                    

                    <a class="nav-link" href="index.php?logout='1'"><i class="fa fa-power-off"></i>Cerrar sesión</a>
                </div>
            </div>

        </div>
    </div>
</header>
       