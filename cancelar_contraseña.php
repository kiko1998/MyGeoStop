<?php
    if (isset($_SESSION['error_images'])) {
        unset($_SESSION['error_images']);
    }
    header('location: perfil.php');
    return;