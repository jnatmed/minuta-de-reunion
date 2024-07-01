<?php

class ArchivoManejador {

    const UPLOADDIRECTORY = __DIR__ . "/minutas/";
    // Directorio donde se guardarán las minutas
    

    public function subirArchivoPDF($file) {
        // Verificar que es un archivo PDF
        $fileType = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
        if ($fileType !== "pdf") {
            throw new Exception("Solo se permiten archivos PDF.");
        }

        // Generar un nombre aleatorio único para el archivo PDF
        $randomName = uniqid("minuta_") . ".pdf";

        // Ruta completa del archivo a guardar
        $filePath = self::UPLOADDIRECTORY . $randomName;

        // Intentar mover el archivo cargado al directorio de minutas
        if (move_uploaded_file($file["tmp_name"], $filePath)) {
            return $randomName; // Devuelve el nombre del archivo generado
        } else {
            throw new Exception("Hubo un error al subir el archivo.");
        }
    }


    public function obtenerMinuta($documentPath) {
        // Construir la ruta completa del archivo PDF
        $fullPath = self::UPLOADDIRECTORY . $documentPath;

        // Verificar si el archivo existe
        if (!file_exists($fullPath)) {
            return false;
        }

        // Leer el contenido del archivo PDF
        return file_get_contents($fullPath);
    }

}

?>
