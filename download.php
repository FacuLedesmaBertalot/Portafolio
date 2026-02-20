<?php
$file = __DIR__ . '/download.php';

// Verificamos si el archivo existe físicamente en el servidor
if (file_exists($file)) {
    
    // Limpiamos cualquier espacio o salida previa que pueda corromper el PDF
    if (ob_get_level()) {
        ob_end_clean();
    }

    // Configuramos los encabezados para forzar la descarga del navegador
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Facundo_Ledesma_CV.pdf"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Leemos el archivo y lo enviamos al flujo de salida
    readfile($file);
    exit;
} else {
    // Si falla, te mostrará la ruta exacta que está fallando para que podamos corregirla
    die("Error: El archivo no existe en: " . realpath(__DIR__ . '/../') . '/assets/docs/Facundo_Ledesma_CV.pdf');
}