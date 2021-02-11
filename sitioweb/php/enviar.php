<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer.php';
require 'SMTP.php';
require 'Exception.php';
require 'OAuth.php';

// Instantiation and passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    //Declaration of variables
    $nombre = $_POST['validarNombre'];
    $apellido = $_POST['validarApellido'];
    $correo = $_POST['validarEmail'];
    $telefono = $_POST['validarTelefono'];
    $tema = $_POST['validarTema'];
    $asunto = $_POST['validarAsunto'];
    $mensaje = $_POST['validarMensaje'];
    //Server settings
    $mail->SMTPDebug = 0;                      // Enable verbose debug output
    $mail->isSMTP();                                            // Send using SMTP
    $mail->Host       = 'smtp.gmail.com';                       // Set the SMTP server to send through
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'rpmtallergt@gmail.com';                // SMTP username
    $mail->Password   = 'mecanicodemotocicletas1366';                               // SMTP password
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
    $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

    //Recipients
    $mail->setFrom('rpmtallergt@gmail.com', 'RPM Taller');
    $mail->addAddress('rpmtallergt@gmail.com', 'RPM Taller');     // Add a recipient    
    $mail->addAddress('chocrandy@gmail.com', 'Randy Choc');     // Add a recipient    

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'Correo Sitio Web - ' . $asunto;

    $fullMessage = 'Mensaje enviado desde el Sitio Web RPM Taller. <br><br>';    
    $fullMessage .= 'Nombre: ' . $nombre . '<br>';
    $fullMessage .= 'Apellido: ' . $apellido . '<br>';
    $fullMessage .= 'Correo: ' . $correo . '<br>';
    $fullMessage .= 'Teléfono: ' . $telefono . '<br>';
    $fullMessage .= 'Tema: ' . $tema . '<br>';
    $fullMessage .= 'Asunto: ' . $asunto . '<br>';
    $fullMessage .= 'Mensaje: ' . $mensaje . '<br>'; 

    $mail->Body    = $fullMessage;

    $mail->send();
    header("Location: ../contactenosSi.html");    
    } catch (Exception $e) {
    // echo "Ocurrió un error al enviar el correo: {$mail->ErrorInfo}";
    header("Location: ../contactenosSi.html");
    }

?>