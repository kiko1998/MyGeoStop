<?php
    include "src/session_start.php";
    include "config/conexion.php";
    include "config/server.php";
    
    $nombre = $_FILES['Ruta']['name'];
    $guardado = $_FILES['Ruta']['tmp_name'];
    
    
    if (isset($_POST["Id_ruta"])) {
        $Id_ruta = $_POST["Id_ruta"];
    }
    
    function ActualizarRuta($nombre, $Id_ruta, $db)
    {
        $query = "UPDATE `Ruta` SET `Nombre_archivo`='$nombre' WHERE `Id_ruta`=$Id_ruta";
        $result = mysqli_query($db, $query);
        $user = mysqli_fetch_assoc($result);
        
        
    }
    
    
    if (!file_exists('Rutas')) {
        mkdir('Rutas', 0777, true);
        if (file_exists('Rutas')) {
            if (move_uploaded_file($guardado, 'Rutas' . $nombre)) {
                
                ActualizarRuta($nombre, $Id_ruta, $db);
                
                
                $_SESSION['subida_correcta'] = "<p style ='color:green'>Archivo guardado correctamente</p>";
                header('location: Ruta.php');
            } else {
                $_SESSION['error'] = "<p style = 'color:red'>El archivo no se pudo guardar</p>";
                header('location: Ruta.php');
                
            }
        }
    } else {
        if (move_uploaded_file($guardado, 'Rutas/' . $nombre)) {
            
            ActualizarRuta($nombre, $Id_ruta, $db);
            
            $_SESSION['subida_correcta'] = "<p style = 'color:green'>Archivo guardado correctamente</p>";
            header('location: Ruta.php');
            
        } else {
            $_SESSION['error'] = "<p style = 'color:red'>El archivo no se pudo guardar</p>";
            header('location: Ruta.php');
            
        }
    }
?>
    
    
