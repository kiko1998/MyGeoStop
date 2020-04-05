<?php
    if (!isset($_SESSION)) {
        session_start();
    }

// initializing variables
    
    $errors = array();

// connect to the database
    require 'conexion.php';

// REGISTER USER
    if (isset($_POST['reg_user'])) {
        // receive all input values from the form
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $email = mysqli_real_escape_string($db, $_POST['email']);
        $Nombre_y_apellido = mysqli_real_escape_string($db, $_POST['Nombre_y_apellido']);
        $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
        
        // form validation: ensure that the form is correctly filled ...
        // by adding (array_push()) corresponding error unto $errors array
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($email)) {
            array_push($errors, "Email is required");
        }
        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }
        if (empty($Nombre_y_apellido)) {
            array_push($errors, "Name is required");
        }
        
        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }
        
        // first check the database to make sure
        // a user does not already exist with the same username and/or email
        $user_check_query = "SELECT * FROM Usuario WHERE username='$username' OR email='$email' LIMIT 1";
        $result = mysqli_query($db, $user_check_query);
        $user = mysqli_fetch_assoc($result);
        
        if ($user) { // if user exists
            if ($user['username'] === $username) {
                array_push($errors, "Username already exists");
            }
            
            if ($user['email'] === $email) {
                array_push($errors, "email already exists");
            }
        }
        
        // Finally, register user if there are no errors in the form
        if (count($errors) == 0) {
            $password = md5($password_1);//encrypt the password before saving in the database
            
            $query = "INSERT INTO Usuario (username, email, password, Nombre_y_apellido)
  			  VALUES('$username', '$email', '$password','$Nombre_y_apellido')";
            mysqli_query($db, $query);
            $_SESSION['username'] = $username;
            $_SESSION['success'] = "<p style ='color:green'>Te has registrado correctamente, inicia sesión para continuar.</p>";
            header('location: page-login.php');
        }
        
    }

// LOGIN USER
    if (isset($_POST['login_user'])) {
        $username = mysqli_real_escape_string($db, $_POST['username']);
        $password = mysqli_real_escape_string($db, $_POST['password']);
        
        if (empty($username)) {
            array_push($errors, "Username is required");
        }
        if (empty($password)) {
            array_push($errors, "Password is required");
        }
        
        if (count($errors) == 0) {
            $password = md5($password);
            $query = "SELECT * FROM Usuario WHERE username='$username' AND password='$password'";
            $results = mysqli_query($db, $query);
            if (mysqli_num_rows($results) == 1) {
                while ($row = $results->fetch_assoc()) {
                    $_SESSION['username'] = $row[username];
                    $_SESSION['id_usuario'] = $row[id_usuario];
                }
                // $_SESSION['id_usuario'] = $id_usuario;
                header('location: index.php');
                
                
                if ($_SESSION['username'] = $username) {
                    if (!empty($_POST["remember"])) {
                        
                        setcookie("username", $_POST["username"], time() + (10 * 365 * 24 * 60 * 60));
                        setcookie("password", $_POST["password"], time() + (10 * 365 * 24 * 60 * 60));
                    } else {
                        setcookie("username", "");
                        setcookie("password", "");
                    }
                    /*
                    $userDetails = mysqli_fetch_assoc($resultSet);
                    $_SESSION["user"] = $userDetails['username'];*/
                } else {
                    $errorMessage = "Invalid login!";
                }
                
                
            } else {
                array_push($errors, "Wrong username/password combination");
                
            }
            
        }
    }