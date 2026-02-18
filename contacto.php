<?php
require_once __DIR__ . '/vendor/autoload.php';

// Cargar variables de entorno
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();

require_once __DIR__ . '/Clases/Email.php';
use Clases\Email;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Limpiamos los datos por seguridad
    $nombre = htmlspecialchars($_POST['nombre']);
    $email_reclutador = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $mensaje = htmlspecialchars($_POST['mensaje']);

    $email = new Email($email_reclutador, $nombre, $mensaje);
    
    // Enviamos el correo
    $resultado = $email->enviarMensaje();

    if ($resultado) {
        header("Location: Views/index.php?status=success#contact");
    } else {
        header("Location: Views/index.php?status=error#contact");
    }
    exit;
} else {
    header("Location: Views/index.php");
    exit;
}