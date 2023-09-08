<?php
error_reporting(0);

function encodeHexToBase64($hex)
{
    return str_replace('=', '', base64_encode(hex2bin($hex)));
}

$keyid = $_GET["keyid"] ?? '';
$key = $_GET["key"] ?? '';

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

$finalkeyid64 = encodeHexToBase64($keyid);
$finalkey64 = encodeHexToBase64($key);

// Establecer el encabezado "Content-Type" y devolver la respuesta JSON
?>


{  
    "keys":[  
       {  
          "kty":"oct",
          "k":"<?php echo $finalkey64;?>",
          "kid":"<?php echo $finalkeyid64;?>"
       }
    ],
    "type":"temporary"
 }