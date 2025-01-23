<?php
// Incluye los archivos de PHPMailer
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'src/PHPMailer.php';
require 'src/SMTP.php';
require 'src/Exception.php';

$receiving_email_address = 'carloszxcw@gmail.com';

if(isset($_POST['name']) && isset($_POST['email'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'] ?? 'No proporcionado';
    $date = $_POST['date'] ?? 'No especificado';
    $time = $_POST['time'] ?? 'No especificado';
    $people = $_POST['people'] ?? 'No especificado';
    $message = $_POST['message'] ?? 'No especificado';

    $mail = new PHPMailer(true);

    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'carloszxcw@gmail.com';
        $mail->Password = 'tjgt ckzz gwwn luny';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Configuración del correo
        $mail->setFrom('carloszxcw@gmail.com', 'Carlos');
        $mail->addAddress($receiving_email_address);

        $mail->isHTML(true);
        $mail->Subject = 'Nueva reserva de mesa';
        $mail->Body = "<p><strong>Nombre:</strong> $name</p>
                       <p><strong>Email:</strong> $email</p>
                       <p><strong>Teléfono:</strong> $phone</p>
                       <p><strong>Fecha:</strong> $date</p>
                       <p><strong>Hora:</strong> $time</p>
                       <p><strong>Número de personas:</strong> $people</p>
                       <p><strong>Mensaje:</strong> $message</p>";

        $mail->send();
        echo 'Reserva enviada con éxito!';
    } catch (Exception $e) {
        echo " al enviar la reserva: {$mail->ErrorInfo}";
    }
} else {
    echo "Por favor, completa todos los campos obligatorios.";
}
?>

