<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario

$id_empresa = $_POST["id_empresa"];

$Nombre = $_POST["Nombre"];

$Latitud = $_POST["Latitud"];

$Longitud = $_POST["Longitud"];

$Telefono = $_POST["Telefono"];

$id_tipo_procesamiento = $_POST["id_tipo_procesamiento"];

$id_localidad = $_POST["id_localidad"];


$query = "UPDATE Empresa SET Nombre='$Nombre',Latitud='$Latitud', Longitud = '$Longitud', id_tipo_procesamiento='$id_tipo_procesamiento', id_localidad='$id_localidad'  WHERE id_empresa='$id_empresa' ";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

header('location: Empresa.php');


?>
                                                                         
                            