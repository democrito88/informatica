<?php

$login = isset($_POST['login'])? $_POST['login'] : "";
$senha = isset($_POST['senha'])? $_POST['senha'] : "";

try {
    valida($login);
    valida($senha);
} catch (Exception $exc) {
    echo $exc->getMessage();
}


if($login == "admin" && $senha == "1nf0rm@11c@"){
    header("Location: http://informatica.olinda.pe.gov.br/informatica/painel/painelDeNoticias.php");
}else{
    header("Location: http://informatica.olinda.pe.gov.br/informatica/index.php");
}

function valida($string){
    $array1 = explode(";", $string);
    $array2 = explode("<script>", $string);
    if(sizeof($array1) > 1 || sizeof($array2) > 1){
        throw new Exception("<h4>Parâmetros inválidos</h4>");
    }
}