<?php
namespace Clases;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Email {
    public $email;
    public $nombre;
    public $mensaje;

    public function __construct($email, $nombre, $mensaje) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->mensaje = $mensaje;
    }

    public function enviarMensaje() {
        $mail = new PHPMailer(true);

        try {
            // Configuración del servidor SMTP de Gmail
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = $_ENV['EMAIL_USER'];
            $mail->Password   = $_ENV['EMAIL_PASS'];    // La contraseña de aplicación de Google
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port       = 587;

            // Remitente y Destinatario
            $mail->setFrom($_ENV['EMAIL_USER'], 'Portfolio Facundo Ledesma');
            $mail->addAddress($_ENV['EMAIL_USER']); 
            $mail->addReplyTo($this->email, $this->nombre);

            // Contenido del correo
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Nuevo mensaje de contacto de: ' . $this->nombre;
            $mail->Body    = "
                <div style='font-family: Arial, sans-serif; padding: 20px; border: 1px solid #ddd; border-radius: 10px;'>
                    <h2 style='color: #0d6efd;'>Nuevo contacto desde tu Portafolio</h2>
                    <p><strong>Nombre:</strong> {$this->nombre}</p>
                    <p><strong>Email de contacto:</strong> {$this->email}</p>
                    <p><strong>Mensaje:</strong></p>
                    <p style='background-color: #f8f9fa; padding: 15px; border-radius: 5px; border-left: 4px solid #0d6efd;'>
                        " . nl2br($this->mensaje) . "
                    </p>
                </div>";

            $mail->send();
            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

?>