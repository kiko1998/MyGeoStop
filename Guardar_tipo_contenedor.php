<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario

$idTipo = $_POST["idTipo"];

$Tipo_contenedor = $_POST["Tipo_contenedor"];

$Color = $_POST["Color"];

$query = "UPDATE Tipo_contenedor SET idTipo='$idTipo',Tipo_contenedor='$Tipo_contenedor', Color_id = '$Color'  WHERE idTipo='$idTipo'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

header('location: Tipos_contenedores.php');


?>
                                                        