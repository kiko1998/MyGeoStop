<?php
    
    header('Content-Type: text/html; charset=UTF-8');
    $email = $_POST['email'];
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    
    require 'PHPMailer/Exception.php';
    require 'PHPMailer/PHPMailer.php';
    require 'PHPMailer/SMTP.php';
    
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'kikojurado9@gmail.com';                     // SMTP username
        $mail->Password   = 'Prueba123';                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above
        
        //Recipients
        $mail->setFrom('kikojurado9@gmail.com', 'kiko j');
        $mail->addAddress($email);     // Add a recipient
        
        
        
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = utf8_decode('Recuperar contraseña MyGeoStop');
        $mail->Body    = htmlentities('Su contraseña es tal');
        
        $mail->send();
        echo 'Mensaje enviado correctamente';
        header('Location: page-login.php');
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
?>