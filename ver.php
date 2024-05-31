<?php
require_once("utils.php");

if (get_params("REQUEST_METHOD") == "GET" && !is_null(get_params('id_meeting'))) {
    $id_meeting = htmlspecialchars(get_params('id_meeting'));

    // Establecer la conexión con la base de datos
    require("datos-conexion.php");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta SQL para obtener los detalles de la reunión
        $stmt = $conn->prepare("SELECT * FROM minutas WHERE id = :id_meeting");
        $stmt->bindParam(':id_meeting', $id_meeting);
        $stmt->execute();

        // Obtener los resultados de la consulta
        $meetingDetails = $stmt->fetch(PDO::FETCH_ASSOC);


        // Incluir la vista detalle-minuta.view.php
        require("./views/detalle-minuta.view.php");

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
} else {
    echo "ID de reunión no proporcionado.";
}
?>
