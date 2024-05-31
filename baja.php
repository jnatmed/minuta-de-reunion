<?php
require_once("utils.php");

if (get_params("REQUEST_METHOD") == "GET" && !is_null(get_params('id_meeting'))) {
    $id_meeting = htmlspecialchars(get_params('id_meeting'));

    // Establecer la conexión con la base de datos
    require("datos-conexion.php");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta SQL para eliminar la reunión
        $stmt = $conn->prepare("DELETE FROM minutas WHERE id = :id_meeting");
        $stmt->bindParam(':id_meeting', $id_meeting);
        $stmt->execute();

        // Redirigir a una página de confirmación o la lista de reuniones
        require("search_results.php");

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
} else {
    echo "ID de reunión no proporcionado.";
}
?>
