<?php
require_once __DIR__ .'/../funciones.php';
require_once __DIR__ .'/../FaqSinonimos.php';
$link = conectar();
$faq_id = 1;
$sql = "SELECT * FROM portales.faqs WHERE id = $faq_id";
$rs = mysqli_query($link,$sql);
while ($row = mysqli_fetch_assoc($rs)){
    $sinonimos_id = analizaFaq($link,$row['respuesta']);
    $faqs_sinonimos_id = trim($row['faq_sinonimos_id'],',');
    $faqs_sinonimos_id = explode(',',$faqs_sinonimos_id);
    $faqs_sinonimos_id = array_merge($faqs_sinonimos_id,$sinonimos_id);
    $faqs_sinonimos_id = array_unique($faqs_sinonimos_id);
    $faqs_sinonimos_id = implode(',',$faqs_sinonimos_id);
    if ($faqs_sinonimos_id != $row['faqs_sinonimos_id']){
        $sql = "UPDATE portales.faqs SET faq_sinonimos_id = '$faqs_sinonimos_id' WHERE id = $row[id]";
        $rs = mysqli_query($link,$sql);
    }
}


function analizaFaq($link,$texto){
    $texto = strip_tags($texto);
    $texto = explode(' ', $texto);
    $texto = array_unique($texto);
    $sinonimos = new FaqSinonimos($link,$texto);
    return $sinonimos->get();
}