<?php

/**
 * Busca sinonimos en una tabla que este generada con los campos
 * id
 * palabra = (palabra1,palabra2,palabra3)
 */
class FaqSinonimos
{

    private $link;
    private $palabras;

    function __construct($link,$palabras){
        $this->link = $link;
        $this->palabras = $palabras;
    }
    public function get(){
        $sinonimos = [];
        foreach ($this->palabras as $palabra){
            $array_sinonimos = $this->search($this->link,$palabra);
            $sinonimos = array_merge($sinonimos,$array_sinonimos);
        }
        return array_unique($sinonimos);
    }

    private function search($link, $palabra){
        $palabra = mysqli_real_escape_string($link, $palabra);
        $sql = "SELECT id FROM portales.faq_sinonimos WHERE CONCAT(',',palabra,',') LIKE '%,$palabra,%'";
        $rs = mysqli_query($link,$sql);
        $res = [];
        while ($row = mysqli_fetch_assoc($rs)){
            array_push($res, $row['id']);
        }
        return $res;
    }
}