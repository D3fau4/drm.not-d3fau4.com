<?php
// Desactivar notificaciones de errores
error_reporting(0);

// Obtener los valores de los parámetros GET
$keyid = $_GET["keyid"] ?? '';
$key = $_GET["key"] ?? '';
$domain = $_GET["URL"] ?? "drm.not-d3fau4.com";

// Validación
if (empty($keyid) || empty($key)) {
    http_response_code(503);
    header("Content-Type: application/json");
    $errorjson = [
        "Status" => "503",
        "Content" => "Validation Failed!",
        "Reason" => "Did not provide Key ID | Key or Key ID | Key isn't complete."
    ];
    echo json_encode($errorjson);
    exit;
}

// Generar y mostrar la URL
die("$domain?&ck=" . base64_encode(json_encode([$keyid => $key])));
