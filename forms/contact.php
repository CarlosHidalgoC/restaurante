<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

$receiving_email_address = 'carloszxcw@gmail.com';

if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['subject']) && isset($_POST['message'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'carloszxcw@gmail.com';
        $mail->Password = 'tjgt ckzz gwwn luny';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('carloszxcw@gmail.com', 'Carlos');
        $mail->addAddress($receiving_email_address);

        $mail->isHTML(true);
        $mail->Subject = $subject;
        $mail->Body = "<p><strong>Nombre:</strong> $name</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Mensaje:</strong> $message</p>";

        $mail->send();
        echo 'Mensaje enviado con éxito!';
    } catch (Exception $e) {
        echo "Error al enviar el mensaje: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor, completa todos los campos obligatorios.";
}
?>
