<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario

$id_tipo_procesamiento = $_POST["id_tipo_procesamiento"];


$Tipo_procesamiento = $_POST["Tipo_procesamiento"];


$query = "UPDATE Tipo_procesamiento SET Tipo_procesamiento='$Tipo_procesamiento' WHERE id_tipo_procesamiento='$id_tipo_procesamiento'";
$result = mysqli_query($db, $query);

header('location: Procesamiento.php');
return;

