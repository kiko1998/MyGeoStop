<?php
require "config/conexion.php";
if (isset($_GET['id_estado'])) {
    $id_estado = $_GET['id_estado'];
    mysqli_query($db, "DELETE FROM Estado_contenedor WHERE id_estado=$id_estado");
    $_SESSION['message'] = "Address deleted!";
    header('location: Estado.php');
}
?>