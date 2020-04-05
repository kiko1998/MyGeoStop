<?php
require "config/conexion.php";
if (isset($_GET['Id_contenedor'])) {
    $Id_contenedor = $_GET['Id_contenedor'];
    mysqli_query($db, "DELETE FROM Contenedor WHERE Id_contenedor=$Id_contenedor");
    $_SESSION['message'] = "Address deleted!";
    header('location: Contenedores.php');
}

?>