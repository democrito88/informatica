<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $titulo = utf8_decode($_POST['titulo']);
    $texto = utf8_decode($_POST['editordata']);
    $subtitulo = isset($_POST['subtitulo'])? utf8_decode($_POST['subtitulo']) : "";
    $temImagem = isset($_POST['colocaImagem']);
    $publicado = 1;
}else{
    throw new Exception("Erro: variável POST não foi configurada.");
}

$uploadOk = 1;
$menssagem = "";
//Sobe imagem
if($temImagem && isset($_FILES["imagem"]["name"])){
    $diretorio = "Imgs/noticias/";
    $caminho = $diretorio . basename($_FILES["imagem"]["name"]);
    $tipoArquivoImagem = strtolower(pathinfo($caminho,PATHINFO_EXTENSION));
    
    //Checa se o arquivo é mesmo uma imagem ou tem extensão dupla
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["imagem"]["tmp_name"]);
        if($check !== false) {
            echo "O arquivo é uma imagem - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            $menssagem = $menssagem."O arquivo não é uma imagem.<br/>";
            $uploadOk = 0;
        }
    }
    //Checa se o arquivo já existe no repositório
    if (file_exists($caminho)) {
        $menssagem = $menssagem."Desculpe, um arquivo já existe com esse nome no repositório.<br/>";
        $uploadOk = 0;
    }
    // Check file size
    if ($_FILES["imagem"]["size"] > 1000000) {
        $menssagem = $menssagem."Seu arquivo ultrapassa o tamanho máximo (1MB).<br/>";
        $uploadOk = 0;
    }
    //Permite certos formatos de arquivo
    if($tipoArquivoImagem != "jpg" && $tipoArquivoImagem != "png" && $tipoArquivoImagem != "jpeg"
    && $tipoArquivoImagem != "gif" ) {
        $menssagem = $menssagem."São permitidas as extensões JPG, JPEG, PNG e GIF.<br/>";
        $uploadOk = 0;
    }
    
    //Checa se uploadOk tem valor 0 (erro)
    if ($uploadOk == 0) {
        $menssagem = $menssagem."Desculpe, seu arquivo não pode ser subido.<br/>";
    //Em caso de sucesso, tente subir o arquivo
    } else {
        //Esta barra / é necessária no caminho para a função encontrar o repositório. Mas desnecessária no banco.
        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], "../".$caminho)) {
            chmod("../".$caminho, 01777);
            //echo "O arquivo ". basename( $_FILES["imagem"]["name"]). " foi subido.";
        } else {
            echo "Desculpe, houve um erro ao subir o arquivo.";
        }
    }
}else{
    $caminho = "";
    $subtitulo = "";
}
//Fim subir imagem

//Insere no banco

try{
    if($uploadOk == 1){
        $conn = mysqli_connect("localhost", "root", "B@nc0NEW", "intranet");
        // Check connection
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }

        $query = "INSERT INTO `noticias`(`titulo`, `texto`, `caminho`, `subtitulo`, `publicado`) VALUES ('".$titulo."','".$texto."','".$caminho."','".$subtitulo."','".$publicado."')";
        mysqli_query($conn, $query);
        mysqli_close($conn);
        header("Location: http://informatica.olinda.pe.gov.br/informatica/painel/painelDeNoticias.php");
    }else{
        header("Location: http://informatica.olinda.pe.gov.br/informatica/painel/novaNoticia.php?m=".$menssagem);
    }
}catch(Exception $e) {
  echo 'Message: ' .$e->getMessage();
}
?>