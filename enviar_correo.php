<?php
// Incluye los archivos de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carga el archivo autoload.php para cargar las clases de PHPMailer automáticamente
require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

// Crear una instancia de PHPMailer
$mail = new PHPMailer(true);

try {
    // Configuración del servidor SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'carloszxcw@gmail.com'; // Tu correo de Gmail
    $mail->Password = 'tjgt ckzz gwwn luny'; // Contraseña de aplicación de Gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port = 587;

    // Configuración del correo
    $mail->setFrom('carloszxcw@gmail.com', 'Carlos');
    $mail->addAddress('saul12345w@gmail.com', 'Saúl'); // Correo y nombre del destinatario

    // Contenido del correo
    $mail->isHTML(true);
    $mail->Subject = 'Prueba de envío de correo con PHPMailer y XAMPP';
    $mail->Body = '<p>¡Hola, Saúl! Este es un mensaje de prueba enviado desde un servidor local con XAMPP usando PHPMailer.</p>';

    // Enviar el correo
    $mail->send();
    echo 'Correo enviado con éxito a saul12345w@gmail.com';
} catch (Exception $e) {
    echo "Error al enviar el correo. Mailer  {$mail->ErrorInfo}";
}
?>
