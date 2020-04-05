<?php
    require "config/conexion.php";
    if (isset($_GET['Id_camion'])) {
        $Id_camion = $_GET['Id_camion'];
        mysqli_query($db, "DELETE FROM Camion WHERE Id_camion=$Id_camion");
        header('location: Camion.php');
    }

