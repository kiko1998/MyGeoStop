<?php
require "config/conexion.php";
if (isset($_GET['id_empresa'])) {
    $id_empresa = $_GET['id_empresa'];
    mysqli_query($db, "DELETE FROM Empresa WHERE id_empresa=$id_empresa");
    $_SESSION['message'] = "Address deleted!";
    header('location: Empresa.php');
}

?>