<?php

require_once("utils.php");

if (get_params("REQUEST_METHOD") == "GET") {
    $search_query = get_params("search_query") !== null ? htmlspecialchars(get_params("search_query")) : "";

    // Establecer la conexión con la base de datos
    require("datos-conexion.php");

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Preparar la consulta SQL para buscar minutas por palabras clave en el campo meetingTitle
        $stmt = $conn->prepare("SELECT * FROM minutas WHERE meetingTitle LIKE :search_query OR orgName LIKE :search_query");
        $stmt->bindValue(':search_query', '%' . $search_query . '%', PDO::PARAM_STR);
        $stmt->execute();

        require("./views/lista-minutas.view.php");

    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    // Cerrar la conexión
    $conn = null;
}
?>
