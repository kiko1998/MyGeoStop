<?php
require "config/conexion.php";
if (isset($_GET['id_tipo_procesamiento'])) {
    $id_tipo_procesamiento = $_GET['id_tipo_procesamiento'];
    mysqli_query($db, "DELETE FROM Tipo_procesamiento WHERE id_tipo_procesamiento=$id_tipo_procesamiento");
    $_SESSION['message'] = "Address deleted!";
    header('location: Procesamiento.php');
}

?>