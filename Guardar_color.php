<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario

$idColor = $_POST["idColor"];

$Color = $_POST["Color"];


$query = "UPDATE Color SET Color='$Color' WHERE idColor='$idColor'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

header('location: Color.php');


?>