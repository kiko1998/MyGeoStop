<?php
require "config/conexion.php";
if (isset($_GET['Id_recogida'])) {
    $Id_recogida = $_GET['Id_recogida'];
    mysqli_query($db, "DELETE FROM Recogida WHERE Id_recogida=$Id_recogida");
    header('location: Recogida.php');
}

?>