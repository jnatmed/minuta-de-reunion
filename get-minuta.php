<?php

require_once("datos-conexion.php");
require_once('ArchivoManejador.php');
require_once("utils.php");

if (get_params("REQUEST_METHOD") == "GET" && !empty(get_params('id_meeting'))) {

    $id_meeting = htmlspecialchars(get_params('id_meeting'));

    var_dump($id_meeting);

    if ($id_meeting <= 0) {
        http_response_code(400);
        echo 'ID inválido';
        exit;
    }

    // Conectar a la base de datos
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        http_response_code(500);
        echo 'Error al conectar a la base de datos: ' . $e->getMessage();
        exit;
    }

    // Consultar la base de datos
    $sql = 'SELECT documentPath FROM minutas WHERE id = :id';
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id_meeting, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$result) {
        http_response_code(404);
        echo 'Minuta no encontrada';
        exit;
    }

    $documentPath = $result['documentPath'];

    // Incluir y utilizar la clase ArchivoManejador
    require_once 'ArchivoManejador.php';

    $archivoManejador = new ArchivoManejador();
    $pdfContent = $archivoManejador->obtenerMinuta($documentPath);

    if (!$pdfContent) {
        http_response_code(500);
        echo 'Error al obtener el PDF';
        exit;
    }

    // Enviar el PDF como respuesta
    header('Content-Type: application/pdf');
    echo $pdfContent;

}

?>
