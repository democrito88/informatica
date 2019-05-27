function sair(){
    window.location = "../util/logout.php";
}

//Para ativar ou desativar a opção de subir uma imagem
function toggleImagem(input){
    var upload = document.getElementById("imagem");
    var botao = document.getElementById("botaoImagem");
    var legenda = document.getElementById("legenda")
    if(input.checked === true){
        upload.disabled = false;
        botao.style = "background-color: #006eb4; border: 1px #006eb4 solid;";
        legenda.disabled = false;
    }else{
        upload.disabled = true;
        botao.style = "background-color: gray; border: 1px gray solid;";
        legenda.style = "background-color: gray border: 1px gray solid;";
        legenda.disabled = true;
    }
}

//Checa se a imagem tem um formato válido
var extensoesValidas = [".jpg", ".jpeg", ".bmp", ".gif", ".png"];    
function validaImagem() {
    var nomeDoArquivo = document.getElementById("nomeImagem").value;
    if (nomeDoArquivo.length > 0) {
        var extensaoValida = false;
        for (var j = 0; j < extensoesValidas.length; j++) {
            var extensao = extensoesValidas[j];
            if (nomeDoArquivo.substr(nomeDoArquivo.length - extensao.length, extensao.length).toLowerCase() === extensao.toLowerCase()) {
                extensaoValida = true;
                break;
            }
        }

        if (!extensaoValida) {
            document.getElementById("tipoImagem").style.display = "block";
            return false;
        }else{
            document.getElementById("tipoImagem").style.display = "none";
        }
    }
    return true;
}