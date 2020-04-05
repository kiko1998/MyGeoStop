<?php
include "src/session_start.php";
include "config/conexion.php";


//recibir valores del anterior formulario

$Id_contenedor = $_POST["Id_contenedor"];

$Nombre = $_POST["Nombre"];

$Latitud = $_POST["Latitud"];

$Longitud = $_POST["Longitud"];

$id_tipo_contenedor = $_POST["Tipo_contenedor"];

$Color_idColor = $_POST["Color"];

$id_estado = $_POST["Estado"];

$Novedoso_id_Novedoso = $_POST["Novedoso"];

echo $id_estado;


$query = "UPDATE Contenedor SET Nombre='$Nombre',Latitud='$Latitud', Longitud = '$Longitud',id_tipo_contenedor='$id_tipo_contenedor', Color_idColor='$Color_idColor', id_estado='$id_estado',Novedoso_id_Novedoso=$Novedoso_id_Novedoso  WHERE Id_contenedor='$Id_contenedor'";
$result = mysqli_query($db, $query);
$user = mysqli_fetch_assoc($result);

header('location: Contenedores.php');


?>
                                                                         
                            