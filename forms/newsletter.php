<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

$receiving_email_address = 'carloszxcw@gmail.com';

if(isset($_POST['email'])) {
    $email = $_POST['email'];

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
        $mail->Subject = "Nueva suscripción al boletín";
        $mail->Body = "<p><strong>Email:</strong> $email</p>";

        $mail->send();
        echo 'Suscripción exitosa!';
    } catch (Exception $e) {
        echo "Error al enviar la suscripción: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor, ingresa un correo válido.";
}
?>
