<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario

$id_servicio = $_POST["id_servicio"];

$Nombre_servicio = $_POST["Nombre_servicio"];

$Id_usuario = $_POST["Id_usuario"];


$Id_camion = $_POST["Id_camion"];


$Id_ruta = $_POST["Id_ruta"];


$Fecha_inicio = $_POST["Fecha_inicio"];


$Fecha_fin = $_POST["Fecha_fin"];


$query = "UPDATE Servicio SET Id_usuario='$Id_usuario',Nombre_servicio='$Nombre_servicio',Id_camion='$Id_camion',	Id_ruta='$Id_ruta', Fecha_inicio='$Fecha_inicio', Fecha_fin='$Fecha_fin' WHERE id_servicio='$id_servicio'";
$result = mysqli_query($db, $query);

header('location: Servicio.php');
return;

?>