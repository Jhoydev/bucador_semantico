<?php
require_once __DIR__ . '/funciones.php';
include_once 'FaqSinonimos.php';
header('Content-Type: application/json');

$texto = $_GET['query'];

$link = conectar();
$buscar = '';
if ($texto == '') {
    die(json_encode(['status' => 'error', 'message' => 'Texto requerido']));
}

$palabras = explode(' ', $texto);
$sinonimos = new FaqSinonimos($link,$palabras);
$arr_sinonimos = $sinonimos->get();

die(json_encode(['status'=>'success','data' => $arr_sinonimos,'total' => count($arr_sinonimos)]));




