<!DOCTYPE html>
<?php
include_once './util/connection.php';
$numero = 0;?>
<html>
<head>
    <link rel="stylesheet" href="css/stylle.css" />
    <script src="js/script.js"></script>
    </head>
    <body>
<?php
//procurando se a string possui ';'
$ano = isset($_GET['ano'])? $_GET['ano'] : null;
$findme   = ';';
$pos = strpos($ano, $findme);

// Se a string não possuir ';'
if ($pos === false) {
    // Seleciona todos os usuários
    if(!is_null($ano)){
        $conn = conecta();
        $sql = mysqli_query($conn, "SELECT IF(COUNT(id) > 1, 'true', 'false') AS flag, COUNT(id) AS paginas, ano, numero FROM leis WHERE ano = ".$ano." GROUP BY numero");
        desconecta($conn);
        if(is_null($sql) || !$sql){
            echo 'Falha na consulta.';
        }else{
            $contador = 0;
            echo "
                <link rel=\"stylesheet\" href=\"css/stylle.css\"/>
                <link rel=\"stylesheet\" href=\"https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css\"/>
                <style>
                .divresposta {
                    width: 100%;
                    -webkit-column-count: auto; /* Chrome, Safari, Opera */
                    -moz-column-count: auto; /* Firefox */
                    column-count: auto;
                    -webkit-column-width: 205px; /* Chrome, Safari, Opera */
                    -moz-column-width: 205px; /* Firefox */
                    column-width: 205px;
                    }

                ul{
                    list-style-type: none;
                    line-height: 9vh;
                }
                li {
                    max-width: 205px;
                    margin: 4px -4px 0 -4px;
                }
                </style>";
            echo "<div class='divresposta'> <ul id=\"lista\">";
            while ($usuario = mysqli_fetch_assoc($sql)) {
                //se a lei tiver mais de uma página
                if($usuario['flag'] == "true"){
                    echo '<li>'
                            .'<button class=\'btn btn-primary dropdown-toggle\' type=\'button\' name=\'submit\' type=\'submit\' onclick="on2(\''.$usuario['numero'] .'\' ,\''. $usuario['ano'].'\');">'
                            . 'Lei n&deg; '.$usuario['numero'] .' do ano de '. $usuario['ano'].
                            '</button>'.
                        '</li>';

                    $contador += 1;
                }else{
                    echo "<li>
                            <button class='btn btn-primary dropdown-toggle' type='button' name='submit' type='submit' onclick=\"on2('".$usuario['numero'] ."' ,'". $usuario['ano']."')\">"
                            . "Lei n&deg; ".$usuario['numero'] ." do ano de ". $usuario['ano']."
                            </button>
                        </li>";

                    $contador += 1;
                }
            }
            echo "</ul></div>";

        }
    }else{
        echo "Vari&aacute;vel de ano n&atilde;o configurada";
    }
} else {
    echo "<h1>Erro:</h1><br/><h4>Parâmetro na URL inválido</h4>";
}
?>
    </body>
</html>
<?php
function retornaArrayPaginas($numero){
    $conn = conecta();
    $query = "SELECT id, foto FROM leis WHERE numero = ".$numero." ORDER BY id";
    $sql = mysqli_query($conn, $query);
    desconecta($conn);
    if(is_null($sql) || is_bool($sql)){
        return "ERROR";
    }
    $arrei = '[';
    while($usuario = mysqli_fetch_assoc($sql)){
        $arrei .=  '"Imgs/foto/'. $usuario['foto'] . '", ';
    }
    $arrei .=  ' ""]';
    
    return $arrei;
}
?>