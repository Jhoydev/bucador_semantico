<?php

function _env($key){
    $file = file_get_contents(__DIR__ . '/.env');
    $file = json_decode($file,1);
    return $file[$key];
}

function conectar(){
    $host = _env('DB_HOST');
    $user = _env('DB_USERNAME');
    $pass = _env('DB_PASSWORD');
    return  mysqli_connect($host,$user,$pass,null,null);
}