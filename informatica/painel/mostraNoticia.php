<?php
include_once '../util/connection.php';

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    //verifica se existe o caractere ';' na variável GET
    $findme   = ';';
    $flag = strpos($id, $findme);
    
    if($flag === true){
        throw new Exception("<h4>Parâmetros inválidos</h4>");
    }else{
        $conn = conecta();
        $query = "SELECT * FROM noticias WHERE `id` = ".$id." LIMIT 1";
        $sql = mysqli_query($conn, $query);
        desconecta($conn);
        if(is_null($sql) || is_bool($sql)){
            echo "ERROR";
        }else{
            $retorno = "<span id='fechar' onclick='fechar();'>&times;</span>";
            while($noticia = mysqli_fetch_assoc($sql)){
                $retorno .= "<article id='noticia'>"
                        ."<h1>".utf8_encode($noticia['titulo'])."</h1>";
                        if(!($noticia['caminho'] == "" && $noticia['caminho'] == " ")){
                            $retorno .= "<figure><img src='../".$noticia['caminho']."'><figcaption>".utf8_encode($noticia['subtitulo'])."</figcaption></figure>";
                        }
                        $retorno .= "<p>".utf8_encode($noticia['texto'])."</p>"
                        . "</article>";
            }
            
            echo $retorno;
        }
    }
}else{
    throw new Exception("<h4>Parâmetros não especificados</h4>");
}
