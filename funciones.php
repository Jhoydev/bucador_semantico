<?php

function conectar(){
    return  mysqli_connect('localhost','root','root',null,null);
}