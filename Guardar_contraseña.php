<?php
    
    include "src/session_start.php";
    include "config/conexion.php";
    
    $Contraseña_antigua = $_POST['Contraseña_antigua'];
    $Contraseña_nueva = $_POST['Contraseña_nueva'];
    $Contraseña_repetida = $_POST['Contraseña_repetida'];
    
    
    
    
    if (isset($_POST['Guardar'])) {
        if (empty($Contraseña_antigua) | empty($Contraseña_nueva) | empty($Contraseña_repetida)) {
            $_SESSION['error'] = "<p style ='color:red'>Rellena todos los campos por favor</p>";
            header('location:perfil-contraseña.php');
            return;
            
        } else {
            $id_usuario = $_SESSION['id_usuario'];
            $query = "Select * from Usuario where id_usuario = $id_usuario";
            $result = mysqli_query($db, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                
                $contraseña = $row['password'];
                $Contraseña_antigua = md5($_POST['Contraseña_antigua']);
                $Contraseña_nueva = md5($_POST['Contraseña_nueva']);
                $Contraseña_repetida = md5($_POST['Contraseña_repetida']);
    
            }
            
            if ($contraseña !== $Contraseña_antigua) {
                
                $_SESSION['error'] = "<p style ='color:red'>Las contraseña introducida anteriormente es incorrecta</p>";
                header('location:perfil-contraseña.php');
                return;
                
            } else if ($Contraseña_nueva !== $Contraseña_repetida) {
                
                $_SESSION['error'] = "<p style ='color:red'>No coinciden las contraseñas</p>";
                header('location:perfil-contraseña.php');
                return;
            } else {
                
                $query = "Update Usuario SET password= '$Contraseña_nueva' where id_usuario='$id_usuario'";
                $result = mysqli_query($db, $query);
                
                if ($result === true) {
                    $_SESSION['subida_correcta'] = "<p style ='color:green'>Contraseña actualizada correctamente</p>";
                    header('location:perfil-contraseña.php');
                    return;
                }
                
                
            }
            
        }
        
        
    } else {
        echo "Fallo al cambiar la contraseña";
    }
        
    
