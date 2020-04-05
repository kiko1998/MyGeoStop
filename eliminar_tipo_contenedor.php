<?php
require "config/conexion.php";
if (isset($_GET['idTipo'])) {
    $idTipo = $_GET['idTipo'];
    mysqli_query($db, "DELETE FROM Tipo_contenedor WHERE idTipo=$idTipo");
    $_SESSION['message'] = "Address deleted!";
    header('location: Tipos_contenedores.php');
}

?>