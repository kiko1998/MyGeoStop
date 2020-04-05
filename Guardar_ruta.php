<?php
    include "src/session_start.php";
    include "config/conexion.php";
    include "config/server.php";


//recibir valores del anterior formulario
    
    if (isset($_POST["Id_ruta"])) {
        $Id_ruta = $_POST["Id_ruta"];
    }
    $Tipo_id_cont = $_POST["Id_tipo_contenedor"];
    $Nombre_ruta = $_POST["Nombre_ruta"];
    $nombre = $_FILES['Ruta']['name'];
    $guardado = $_FILES['Ruta']['tmp_name'];
    $rest = substr($nombre, -3);
    /*
    echo "nombre " . $nombre;
    echo " guardado " . $guardado;
    echo " rest " . $rest;
    */
    if (isset($Nombre_ruta) && isset($Tipo_id_cont)) {
        $query = "UPDATE Ruta SET Nombre_ruta='$Nombre_ruta',Tipo_id_cont='$Tipo_id_cont' WHERE Id_ruta='$Id_ruta'";
        $result = mysqli_query($db, $query);
        
    }
    if ($rest !== 'gpx') {
        if (!empty($rest)){
            $_SESSION['error_gpx'] = 'El fichero adjuntado no tiene la extension .gpx';
            header('location: Ruta.php');
            return;
        }
        else{
            $_SESSION['subida_correcta']= '<p style = \'color:green\'>Nombre y tipo guardado correctamente</p>';
            header('location: Ruta.php');
            return;
        }
    } else {
        
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
                    // header('location: Ruta.php');
                    return;
                } else {
                    // $_SESSION['error'] = "<p style = 'color:red'>El archivo no se pudo guardar</p>";
                    header('location: Ruta.php');
                    return;
                }
            }
        } else {
            if (move_uploaded_file($guardado, 'Rutas/' . $nombre)) {
                
                ActualizarRuta($nombre, $Id_ruta, $db);
                
                $_SESSION['subida_correcta'] = "<p style = 'color:green'>Archivo guardado correctamente</p>";
                header('location: Ruta.php');
                return;
            } else {
                //$_SESSION['error'] = "<p style = 'color:red'>El archivo no se pudo guardar</p>";
                header('location: Ruta.php');
                return;
            }
        }
    }

