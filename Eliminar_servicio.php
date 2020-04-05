<?php
    require "config/conexion.php";
    if (isset($_GET['id_servicio'])) {
        $id_servicio = $_GET['id_servicio'];
        mysqli_query($db, "DELETE FROM Servicio WHERE id_servicio=$id_servicio");
        header('location: Servicio.php');
    }

?>