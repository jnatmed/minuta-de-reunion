<?php
require_once("utils.php");

if (get_params("REQUEST_METHOD") == "POST") {
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

    // Establecer la conexión con la base de datos
    require("datos-conexion.php");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la sentencia SQL
        $stmt = $conn->prepare("INSERT INTO minutas (orgName, meetingTitle, meetingDate, meetingTime, meetingPlace, facilitator, secretary, attendees, absentees, guests, agenda, discussion, newTopics, nextMeeting, closingTime, closingRemarks) 
                                VALUES (:orgName, :meetingTitle, :meetingDate, :meetingTime, :meetingPlace, :facilitator, :secretary, :attendees, :absentees, :guests, :agenda, :discussion, :newTopics, :nextMeeting, :closingTime, :closingRemarks)");

        // Bind parameters
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
