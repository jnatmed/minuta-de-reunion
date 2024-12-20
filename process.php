<?php
require_once("utils.php");
require_once('ArchivoManejador.php');

require 'vendor/autoload.php';

use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Level;

// Crea un nuevo logger
$log = new Logger('minutas_log');

// Añade un handler para escribir registros en un archivo
$log->pushHandler(new StreamHandler('logs/app.log', Level::Debug));


// $log->info("upload: ", [$uploadDir]);

// Crear una instancia del manejador de archivos
$archivoManejador = new ArchivoManejador();


if (get_params("REQUEST_METHOD") == "POST") {
    $id_meeting = htmlspecialchars(get_params('id_meeting'));
    $orgName = htmlspecialchars(get_params('orgName'));
    $meetingTitle = htmlspecialchars(get_params('meetingTitle'));
    $meetingDate = htmlspecialchars(get_params('meetingDate'));
    $meetingTime = htmlspecialchars(get_params('meetingTime'));
    $meetingPlace = htmlspecialchars(get_params('meetingPlace'));
    $facilitator = htmlspecialchars(get_params('facilitator'));
    $secretary = htmlspecialchars(get_params('secretary'));
    $attendees = htmlspecialchars(get_params('attendees'));
    $absentees = htmlspecialchars(get_params('absentees'));
    $guests = htmlspecialchars(get_params('guests'));
    $agenda = htmlspecialchars(get_params('agenda'));
    $discussion = htmlspecialchars(get_params('discussion'));
    $newTopics = htmlspecialchars(get_params('newTopics'));
    $nextMeeting = htmlspecialchars(get_params('nextMeeting'));
    $closingTime = htmlspecialchars(get_params('closingTime'));
    $closingRemarks = htmlspecialchars(get_params('closingRemarks'));
    $action = htmlspecialchars(get_params('action'));

    // Establecer la conexión con la base de datos
    require("datos-conexion.php");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        if ($action == 'update') {

            $log->info("file: ", [$_FILES]);

            if(isset($_FILES["file"])){
                $file = $_FILES["file"];

                try {
                    // Intentar subir el archivo PDF usando la instancia de ArchivoManejador
                    $documentPath = $archivoManejador->subirArchivoPDF($file);
                    $log->info("El archivo ha sido subido correctamente como '$nombreArchivo'.");
                } catch (Exception $e) {
                    $log->error("Error: " . $e->getMessage());
                }
            }

            // Preparar la sentencia SQL para actualizar
            $stmt = $conn->prepare("UPDATE minutas SET orgName = :orgName, meetingTitle = :meetingTitle, meetingDate = :meetingDate, 
                                    meetingTime = :meetingTime, meetingPlace = :meetingPlace, facilitator = :facilitator, 
                                    secretary = :secretary, attendees = :attendees, absentees = :absentees, guests = :guests, 
                                    agenda = :agenda, discussion = :discussion, newTopics = :newTopics, nextMeeting = :nextMeeting, 
                                    closingTime = :closingTime, closingRemarks = :closingRemarks, documentPath = :documentPath WHERE id = :id_meeting");

            // Bind parameters para la actualización
            $stmt->bindParam(':id_meeting', $id_meeting);
            $stmt->bindParam(':documentPath', $documentPath);
        } else {
            // Preparar la sentencia SQL para insertar
            $stmt = $conn->prepare("INSERT INTO minutas (orgName, meetingTitle, meetingDate, meetingTime, meetingPlace, facilitator, secretary, 
                                    attendees, absentees, guests, agenda, discussion, newTopics, nextMeeting, closingTime, closingRemarks, documentPath) 
                                    VALUES (:orgName, :meetingTitle, :meetingDate, :meetingTime, :meetingPlace, :facilitator, :secretary, 
                                    :attendees, :absentees, :guests, :agenda, :discussion, :newTopics, :nextMeeting, :closingTime, :closingRemarks, :documentPath)");
            // Bind parameters para la inserción
            $stmt->bindParam(':documentPath', $documentPath);
        }

        /**
         * script que lee el archivo y devuelve un nombre de archivo si es que todo va bien. 
         */

        // Bind parameters comunes
        $stmt->bindParam(':orgName', $orgName);
        $stmt->bindParam(':meetingTitle', $meetingTitle);
        $stmt->bindParam(':meetingDate', $meetingDate);
        $stmt->bindParam(':meetingTime', $meetingTime);
        $stmt->bindParam(':meetingPlace', $meetingPlace);
        $stmt->bindParam(':facilitator', $facilitator);
        $stmt->bindParam(':secretary', $secretary);
        $stmt->bindParam(':attendees', $attendees);
        $stmt->bindParam(':absentees', $absentees);
        $stmt->bindParam(':guests', $guests);
        $stmt->bindParam(':agenda', $agenda);
        $stmt->bindParam(':discussion', $discussion);
        $stmt->bindParam(':newTopics', $newTopics);
        $stmt->bindParam(':nextMeeting', $nextMeeting);
        $stmt->bindParam(':closingTime', $closingTime);
        $stmt->bindParam(':closingRemarks', $closingRemarks);

        // Ejecutar la sentencia
        $stmt->execute();

        // Redirigir o mostrar mensaje de éxito
        require("./views/informe.view.php");

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
}
?>
