<?php
// Ruta al archivo
$file = __DIR__ . '/assets/docs/Facundo_Ledesma_CV.pdf';

if (file_exists($file)) {
    // Limpiamos cualquier salida previa para evitar corrupción
    ob_clean();
    flush();

    // Encabezados para forzar la descarga
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Facundo_Ledesma_CV.pdf"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Leemos el archivo y lo enviamos al navegador
    readfile($file);
    exit;
} else {
    die("Error: El archivo no existe en la ruta especificada: " . $file);
}