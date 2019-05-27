<?php
include './criaZip.php';
include_once './util/connection.php';
if(is_null($_GET['numero']) || is_null($_GET['ano'])){
    throw new Exception("<h4>Parâmetros não configurados</h4>");
}

$numero = intval($_GET['numero']);
$ano = intval($_GET['ano']);

//verifica se existe o caractere ';' na variável GET
$findme   = ';';
$flag1 = strpos($ano, $findme);
$flag2 = strpos($numero, $findme);

if($flag1 === true || $flag2 === true){
    throw new Exception("<h4>Parâmetros inválidos</h4>");
}else{

$conn = conecta();
$query = "SELECT id, foto FROM leis WHERE numero = ".$numero." ORDER BY id";
$sql = mysqli_query($conn, $query);
desconecta($conn);
if(is_null($sql) || is_bool($sql)){
    echo "ERROR";
}

$pagina = 1;
$arrei = '<a class="linkEsquerdo" onclick="plusSlides(-1);">&#10094;</a>';
while($usuario = mysqli_fetch_assoc($sql)){
    if($pagina == 1){
        $arrei .=  '<figure class="lei" style="display:block;"><img id="imagemDaLei" src="http://informatica.olinda.pe.gov.br/informatica/Imgs/fotos/'. $usuario['foto'] . '" /> ';
    } else {
        $arrei .=  '<figure class="lei" style="display:none;"><img id="imagemDaLei" src="http://informatica.olinda.pe.gov.br/informatica/Imgs/fotos/'. $usuario['foto'] . '" /> ';
    }
    if(mysqli_num_rows($sql) > 1){
        $arrei .= '<figcaption>Lei de n&deg;'.$numero.' do ano de '.$ano.' (pág. '.$pagina.')</figcaption></figure>';
    }else{
        $arrei .= '<figcaption>Lei de n&deg;'.$numero.' do ano de '.$ano.'</figcaption></figure>';
    }
    
    $pagina++;
}
$arrei .= '<a class="linkDireito" onclick="plusSlides(1);">&#10095;</a>';

mysqli_close($conn);
echo $arrei;

}

?>