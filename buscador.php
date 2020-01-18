<?php
include_once 'FaqSinonimos.php';
$texto = "crear propiedad";
$link = conectar();
$buscar = '';
if ($texto == '') { die('nada que buscar'); }

$palabras = explode(' ', $texto);
$sinonimos = new FaqSinonimos($link,$palabras);
$arr_sinonimos = $sinonimos->get();

$buscar = '';
foreach ($palabras as $palabra){
    $buscar .= " OR respuesta LIKE '%$palabra%' ";
}
foreach ($arr_sinonimos as $el_sinonimo){
    $buscar .= " OR CONCAT(',',respuesta,',') LIKE '%,$el_sinonimo,%'";
}

$sql = "SELECT * FROM portales.faqs WHERE 1=1 $buscar";
echo $sql;

function conectar(){
    return  mysqli_connect('localhost','root','root',null,null);
}

