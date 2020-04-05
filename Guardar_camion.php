<?php
    include "src/session_start.php";
    include "config/conexion.php";


//recibir valores del anterior formulario
    
    $Id_camion = $_POST["Id_camion"];
    $Matricula_camion = $_POST["Matricula_camion"];
    $Marca = $_POST["Marca"];
    $Modelo = $_POST["Modelo"];
    $Latitud = $_POST["Latitud"];
    $Longitud = $_POST["Longitud"];
    
    $id_tipo_contenedor = $_POST["Tipo_contenedor"];
    
    $query = "UPDATE Camion SET Marca='$Marca',Modelo='$Modelo',Matricula_camion='$Matricula_camion', id_tipo_contenedor=$id_tipo_contenedor, Latitud=$Latitud, Longitud=$Longitud WHERE Id_camion='$Id_camion'";
    $result = mysqli_query($db, $query);
    if ($result == 1) {
        $_SESSION['success'] = '<p style =\'color:green\'>Actualización completada correctamente</p>';
        header('location: Camion.php');
        return;
    } else {
        $_SESSION['error'] = '<p style =\'color:red\'>Actualización erronea vuelva a intentarlo</p>';
        header('location: Camion.php');
        return;
    }


