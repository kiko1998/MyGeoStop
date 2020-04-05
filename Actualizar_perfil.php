<?php
    
    include "src/session_start.php";
    include "config/conexion.php";
    include "config/server.php";
    
    //recibir valores del anterior formulario
    
    if (!empty($_POST["Nombre"])) {
        $Nombre = $_POST["Nombre"];
    } else {
        $_SESSION['error_images'] = '<p style = \'color:red\'>Inserta tu nombre y apellido.</p>';
        header('location: perfil.php');
        return;
    }
    if (!empty($_POST["Username"])) {
        $Username = $_POST["Username"];
    } else {
        $_SESSION['error_images'] = '<p style = \'color:red\'>Inserta tu usuario.</p>';
        header('location: perfil.php');
        return;
    }
    if (!empty($_POST["E-mail"])) {
        $Email = $_POST["E-mail"];
    } else {
        $_SESSION['error_images'] = '<p style = \'color:red\'>Inserta tu email.</p>';
        header('location: perfil.php');
        return;
    }
    
    $Id_usuario = $_POST["id_usuario"];
    
    $foto_perfil = $_FILES['foto_perfil']['name'];
    
    $guardado = $_FILES['foto_perfil']['tmp_name'];
    
    $rest = substr($foto_perfil, -3);
    
    $query = "UPDATE Usuario SET Nombre_y_apellido='$Nombre',username='$Username', email='$Email' WHERE id_usuario='$Id_usuario'";
    
    $result = mysqli_query($db, $query);
    
    if ($result === true) {
        $_SESSION['subida_correcta'] = "<p style ='color:green'>Información del perfil actualizada correctamente</p>";
    }
    
    
    if ($rest !== 'png' && $rest !== 'jpg' && $rest !== 'peg') {
        if (!empty($rest)) {
            $_SESSION['error_images'] = '<p style = \'color:red\'>El fichero adjuntado tiene que tener la extension .png, .jpg o .jpeg</p>';
        }
            header('location: perfil.php');
            return;
      
        
    } else {
        
        function ActualizarImagen($Nombre, $Id_usuario, $db)
        {
            $query = "UPDATE `Usuario` SET `Imagenes`='$Nombre' WHERE `Id_usuario`=$Id_usuario";
            $result = mysqli_query($db, $query);
            if ($result === true) {
                $_SESSION['subida_correcta'] = "<p style = 'color:green'>Archivo guardado correctamente</p>";
                
            }
        }
    }
    if (!file_exists('assets/images/avatar')) {
        mkdir('mkdir assets/images/avatar', 0777, true);
        if (file_exists('avatar')) {
            if (move_uploaded_file($guardado, 'assets/images/avatar' . $foto_perfil)) {
                
                ActualizarImagen($foto_perfil, $Id_usuario, $db);
                $_SESSION['subida_correcta'] = "<p style ='color:green'>Archivo guardado correctamente</p>";
                header('location: perfil.php');
                return;
            } else {
                // $_SESSION['error'] = "<p style = 'color:red'>El archivo no se pudo guardar</p>";
                header('location: perfil.php');
                return;
            }
        }
    } else {
        if (move_uploaded_file($guardado, 'assets/images/avatar/' . $foto_perfil)) {
            
            ActualizarImagen($foto_perfil, $Id_usuario, $db);
            
            header('location: perfil.php');
            return;
            
        } else {
            //$_SESSION['error'] = "<p style = 'color:red'>El archivo no se pudo guardar</p>";
            header('location: perfil.php');
            return;
        }
    }
  
 
