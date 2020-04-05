<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario

$id_localidad = $_POST["id_localidad"];

$Localidad = $_POST["Localidad"];


$query = "UPDATE Localidad SET Localidad='$Localidad' WHERE id_localidad='$id_localidad'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

header('location: Localidad.php');


?>