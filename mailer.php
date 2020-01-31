<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

$mail = new PHPMailer(true);

$name = $_POST["name"];
$emailAddress = $_POST["email"];
$message = $_POST["message"];
$myEmail = $_POST["myemail"];

if ( trim($myEmail) !== "" || trim($name) === "" || trim($message) === "" || trim($emailAddress) === "" ) {
    echo "error";
} else {
    try {
        //Server settings
        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.zoho.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = 'contacto@agrisolucion.com';                     // SMTP username
        $mail->Password   = 'Hid.algo88';                               // SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
        $mail->Port       = 587;                                    // TCP port to connect to
    
        //Recipients
        $mail->setFrom('contacto@agrisolucion.com', 'Agrisolución');
        $mail->addAddress('contacto@agrisolucion.com', 'Agrisolución');     // Add a recipient
        //$mail->addAddress('ellen@example.com');               // Name is optional
        //$mail->addReplyTo('info@example.com', 'Information');
        //$mail->addCC('cc@example.com');
        //$mail->addBCC('bcc@example.com');
    
        // Attachments
        //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
    
        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = 'Mensaje desde el sitio web';
        $mail->Body    = 'Nombre: ' . $name . '<br>' .
                         'Correo: ' . $emailAddress . '<br>' .
                         'Mensaje: ' . $message;
        $mail->AltBody = 'Nombre: ' . $name . '; Email: ' . $emailAddress . '; Mensaje: ' . $message;

        $mail->CharSet = 'UTF-8';
    
        $mail->send();
        return 'success';
    } catch (Exception $e) {
        echo "error";
    }
}