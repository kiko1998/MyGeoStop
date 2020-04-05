<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario

$id_estado = $_POST["id_estado"];

$Estado = $_POST["Estado"];

$Operativo = $_POST["Operativo"];


$query = "UPDATE Estado_contenedor SET Estado='$Estado',id_estado='$id_estado', Operativo = '$Operativo' WHERE id_estado='$id_estado'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

header('location: Estado.php');


?>