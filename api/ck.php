<?php 
// disable error
error_reporting(0);
$error = 2;

$keyid = $_GET["keyid"];
$key = $_GET["key"];
$domain = (isset($_GET["URL"])) ? $_GET["URL"] : "drm.not-d3fau4.com";

die("$domain?&ck=".base64_encode(json_encode(Array($keyid => $key))));