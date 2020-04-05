<?php
require "config/conexion.php";
if (isset($_GET['Id_ruta'])) {
    $Id_ruta = $_GET['Id_ruta'];
    mysqli_query($db, "DELETE FROM Ruta WHERE Id_ruta=$Id_ruta");
    $_SESSION['message'] = "Address deleted!";
    header('location: Ruta.php');
}

?>