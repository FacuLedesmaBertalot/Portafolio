<?php
// CORRECCIÓN: Apuntamos a la carpeta assets, no al propio script
$file = __DIR__ . '/assets/docs/Facundo_Ledesma_CV.pdf';

if (file_exists($file)) {
    
    // Limpiamos cualquier salida previa para evitar corrupción
    if (ob_get_level()) {
        ob_end_clean();
    }

    // Encabezados para forzar la descarga
    header('Content-Description: File Transfer');
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="Facundo_Ledesma_CV.pdf"');
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
    header('Pragma: public');
    header('Content-Length: ' . filesize($file));

    // Leemos el archivo real y lo enviamos
    readfile($file);
    exit;
} else {
    // Si falla, te dirá dónde lo está buscando exactamente
    die("Error crítico: El archivo PDF no se encuentra en la ruta: " . $file);
}