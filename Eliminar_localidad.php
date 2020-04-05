<?php
require "config/conexion.php";
if (isset($_GET['id_localidad'])) {
    $id_localidad = $_GET['id_localidad'];
    mysqli_query($db, "DELETE FROM Localidad WHERE id_localidad=$id_localidad");
    $_SESSION['message'] = "Address deleted!";
    header('location: Localidad.php');
}

?>