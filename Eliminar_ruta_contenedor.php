<?php
require "config/conexion.php";
if (isset($_GET['Id_ruta'])) {
    $Id_ruta = $_GET['Id_ruta'];
    $Contenedor_id = $_GET['Contenedor_id'];
    mysqli_query($db, "DELETE FROM Ruta_Contenedor WHERE Id_ruta=$Id_ruta and Contenedor_id=$Contenedor_id");
    header("location: Ruta_contenedor.php?Id_ruta=" . $Id_ruta);
}

?>