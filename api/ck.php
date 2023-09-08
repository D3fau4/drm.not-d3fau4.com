<?php 
// disable error
error_reporting(0);
$error = 2;

$keyid = $_GET["keyid"];
$key = $_GET["key"];

die(json_decode(json_encode(Array($keyid => $key))));