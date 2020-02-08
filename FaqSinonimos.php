<?php

/**
 * Busca sinonimos en una tabla que este generada con los campos
 * id
 * palabra = (palabra1,palabra2,palabra3)
 */
class FaqSinonimos
{

    private $link;
    private $words;
    private $database = 'portales';
    private $table = 'faq_sinonimos';
    private $id = 'id';
    private $field = 'palabra';

    function __construct($link,$words){
        $this->link = $link;
        $this->words = $words;
    }
    public function get(){
        $synonymous = [];
        foreach ($this->words as $word){
            $array_synonymous = $this->search($this->link,$word);
            $synonymous = array_merge($synonymous,$array_synonymous);
        }
        return array_unique($synonymous);
    }

    private function search($link, $word){
        $word = mysqli_real_escape_string($link, $word);
        $sql = "SELECT {$this->id} FROM {$this->database}.{$this->table} WHERE CONCAT(',',{$this->field},',') LIKE '%,$word,%'";
        $rs = mysqli_query($link,$sql);
        $res = [];
        while ($row = mysqli_fetch_assoc($rs)){
            array_push($res, $row['id']);
        }
        return $res;
    }
}