<?php

function valida($string){
    $array1 = explode(";", $string);
    $array2 = explode("<script>", $string);
    if(sizeof($array1) > 1 || sizeof($array2) > 1){
        throw new Exception("<h4>Parâmetros inválidos</h4>");
    }
}