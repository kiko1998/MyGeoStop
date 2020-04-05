<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario
$Id_recogida = $_POST["Id_recogida"];
$id_servicio = $_POST["Servicio_id"];
$Id_contenedor = $_POST["Contenedor_id"];
$Fecha_recogida = $_POST["Fecha_recogida"];
$Horario_recogida = $_POST["Horario_recogida"];


$query = "UPDATE Recogida SET id_servicio='$id_servicio',Id_contenedor='$Id_contenedor',Fecha_recogida = '$Fecha_recogida', Horario_recogida='$Horario_recogida' WHERE Id_recogida='$Id_recogida' ";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

header('location: Recogida.php');


?>