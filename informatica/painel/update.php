<?php
include_once '../util/connection.php';

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo = utf8_decode($_POST['titulo']);
    $texto = utf8_decode($_POST['editordata']);
    $subtitulo = isset($_POST['subtitulo'])? utf8_decode($_POST['subtitulo']) : "";
    $temImagem = isset($_POST['colocaImagem']);
    $publicado = (isset($_POST['publicado']) && $_POST['publicado'] === "sim")? "1" : "0";
    $id = $_POST['id'];
}else{
    throw new Exception("Erro: variável POST não foi configurada.");
}

$updateOk = 1;
$mensagem = "";
//Sobe imagem
if($temImagem && isset($_FILES["imagem"]["name"]) && $_FILES["imagem"]["name"] != ""){
    $diretorio = "Imgs/noticias/";
    $caminho = $diretorio . basename($_FILES["imagem"]["name"]);
    
    $tipoArquivoImagem = strtolower(pathinfo($caminho,PATHINFO_EXTENSION));
    
    //Checa se o arquivo é mesmo uma imagem ou tem extensão dupla
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if($check !== false) {
            echo "O arquivo é uma imagem - " . $check["mime"] . ".";
            $updateOk = 1;
        } else {
            $mensagem = $mensagem."O arquivo não é uma imagem.<br/>";
            $updateOk = 0;
        }
    }
    
    // Checa o tamanho do arquivo (max. 1MB)
    if ($_FILES["imagem"]["size"] > 1000000) {
        $mensagem = $mensagem."Seu arquivo ultrapassa o tamanho máximo (1MB).<br/>";
        $updateOk = 0;
    }
    
    //Permite certos formatos de arquivo
    if($tipoArquivoImagem != "jpg" && $tipoArquivoImagem != "png" && $tipoArquivoImagem != "jpeg"
    && $tipoArquivoImagem != "gif" ) {
        $mensagem = $mensagem."São permitidas as extensões JPG, JPEG, PNG e GIF.<br/> Você tentou subir um arquivo \"".$tipoArquivoImagem."\"";
        $updateOk = 0;
    }
    
    if($updateOk == 1){
        //Checa se a imagem passada já era a imagem que estava antes na notícia
        $jaEraAAnterior = false;
        $caminhoDaAnterior = "";
        $conn = conecta();
        $query = "SELECT `caminho` FROM noticias WHERE id='".$id."'";
        $sql = mysqli_query($conn, $query);
        desconecta($conn);
        while($noticia = mysqli_fetch_assoc($sql)){
            $caminhoDaAnterior = $noticia['caminho'];
            if($noticia['caminho'] == $caminho){
                $jaEraAAnterior = true;
            }
        }
        
        if(!$jaEraAAnterior){
            //Exclui do repositório a imagem antiga, se existir
            if($caminhoDaAnterior == "" || $caminhoDaAnterior == " "){
                unlink("/var/www/informatica/".$caminhoDaAnterior);
            }
            //Checa se já existe a nova imagem no repositório
            if (!file_exists($caminho)) {
                //sobe a nova
                move_uploaded_file($_FILES["imagem"]["tmp_name"], "../".$caminho);
                chmod("../".$caminho, 01777);
            }
        }
    }
}else{
    $caminho = "";
    $subtitulo = "";
}
//Fim subir imagem

//Insere no banco
if($updateOk == 1){
    $conn = conecta();

    $query = "UPDATE `noticias` SET `titulo`='".$titulo."',`texto`='".$texto."',`caminho`='".$caminho."',`subtitulo`='".$subtitulo."', `publicado`=".$publicado." WHERE `id` = ".$id;
    mysqli_query($conn, $query);
    desconecta($conn);
    header("Location: http://informatica.olinda.pe.gov.br/informatica/painel/painelDeNoticias.php");
}else{
    header("Location: http://informatica.olinda.pe.gov.br/informatica/painel/editaNoticia.php?id=".$id."&m=".$mensagem);
}
?>