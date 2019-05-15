<?php
function cabecalho(){
    
?>        
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Coordenadoria de Inform&aacute;tica</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link href="css/stylle.css" rel="stylesheet" type="text/css" />
<link href="css/painel.css" rel="stylesheet" type="text/css" />
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

<!-- jQuery library -->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script>
function mostrar(){
    $(".formularioLogin").fadeToggle();
}
</script>
</head>

<body onload="mostraSlides(1);">
<div class="rodateto">
    <button class="switchAmarelo" onclick="mostrar();"></button>
    <form class="formularioLogin" name="entrar" action="painel/login.php" method="POST">
        <label><span>Login:&nbsp;</span><input type="text" name="login"></label>
        <label><span>Senha:&nbsp;</span><input type="password" name="senha"></label>&nbsp;
        <button type="submit">Entrar</button>
    </form>

</div>
<header>
    <figure class="banner">
        <img alt="CGI" src="Imgs/logo.png" class="img-responsive"/>
    </figure>
    <nav class="nav" id="myTopnav">
    <a alt="Página inicial" href="index.php" style="background-color: #f8c92e; color: white; height:53px;"><i class="glyphicon glyphicon-home"></i></a>
    <a href="http://olinda.pe.gov.br">Portal de Olinda</a><span>|</span>
    <a href="cgi.php">Sobre a CGI</a><span>|</span>
    <div class="cairMenu">
        <button class="tituloMenu">Para o Servidor<span class="caret seta"></span></button>
        <ul class="menuCaido">
            <li class="menuCaidoItem" onclick="nav(1);">Abra um chamado</li>
            <li class="menuCaidoItem" onclick="nav(2);">Contracheque</li>
            <li class="menuCaidoItem" onclick="nav(3);">Email Corporativo</li>
            <li class="menuCaidoItem" onclick="nav(4);">Sistema Integrado de Arrecadação Tributária (SIAT)</li>
            <li class="menuCaidoItem" onclick="nav(5);">Empréstimo Consignado</li>
            <li class="menuCaidoItem" onclick="nav(6);">Portal do contribuinte</li>
            <li class="menuCaidoItem" onclick="nav(8);">Protocolo</li>
            <li class="menuCaidoItem" onclick="nav(9);">Portal Gov.br</li>
        </ul>
    </div><span>|</span>
    <div class="cairMenu">
        <button class="tituloMenu">Downloads<span class="caret seta"></span></button>
        <ul class="menuCaido">
            <li class="menuCaidoItem" onclick="downloads(1);">Pesquisa de satisfação</li>
            <li class="menuCaidoItem" onclick="downloads(2);">Pesquisa de perfil para aquisição de PC</li>
            <li class="menuCaidoItem" onclick="nav(7);">Consulta de leis municipais</li>
            <li class="menuCaidoItem" onclick="downloads(3);">Normas</li>
            <li class="menuCaidoItem" id="cairSubMenu">
                Modelos de documentos <i class="glyphicon glyphicon-chevron-right" style="float: right;"></i>
                <ul class="subMenuCaido">
                    <li class="menuCaidoItem" onclick="downloads(4);">Ata de Reunião</li>
                    <li class="menuCaidoItem" onclick="downloads(5);">Caixa de Conteúdo</li>
                    <li class="menuCaidoItem" onclick="downloads(6);">Espelho Caixa</li>
                    <li class="menuCaidoItem" onclick="downloads(7);">Solicitação de Documentos Funcionais</li>
                    <li class="menuCaidoItem" onclick="downloads(8);">Solicitação de cópias de Atestado de Óbito</li>
                    <li class="menuCaidoItem" onclick="downloads(9);">Gab. do Prefeito</li>
                    <li class="menuCaidoItem" onclick="downloads(10);">Gab. do vice Prefeito</li>
                    <li class="menuCaidoItem" onclick="downloads(11);">Secretaria de Assuntos Jurídicos</li>
                    <li class="menuCaidoItem" onclick="downloads(12);">Secretaria de Desen. Social, Cidadania e Direitos Humanos</li>
                    <li class="menuCaidoItem" onclick="downloads(13);">Secretaria de Obras</li>
                    <li class="menuCaidoItem" onclick="downloads(14);">Secretaria de Comunicação</li>
                    <li class="menuCaidoItem" onclick="downloads(15);">Secretaria de Desen. Econômico, Tecnológico e Turismo</li>
                    <li class="menuCaidoItem" onclick="downloads(16);">Secretaria de Educação</li>
                    <li class="menuCaidoItem" onclick="downloads(17);">Secretaria de Fazenda e da Administração</li>
                    <li class="menuCaidoItem" onclick="downloads(18);">Secretaria de Governo</li>
                    <li class="menuCaidoItem" onclick="downloads(19);">Secretaria de Patrimônio Cultural</li>
                    <li class="menuCaidoItem" onclick="downloads(20);">Secretaria de Planejamento e Gestão de Estratégia</li>
                    <li class="menuCaidoItem" onclick="downloads(21);">Secretaria de serviços Público</li>
                    <li class="menuCaidoItem" onclick="downloads(22);">Secretaria de Esporte e Juventude</li>
                    <li class="menuCaidoItem" onclick="downloads(23);">Secretaria de Transporte, Controle Urbano e Ambiental</li>
                    <li class="menuCaidoItem" onclick="downloads(24);">Secretaria do Orcamento Part., Meio Ambiente e Desen. Urbano</li>
                    <li class="menuCaidoItem" onclick="downloads(25);">Logo de Olinda (.pdf)</li>
                    <li class="menuCaidoItem" onclick="downloads(26);">Logo de Olinda (.doc)</li>
                </ul>
            </li>
        </ul>
    </div><span>|</span>
    <a href="../glpi">Área Restrita</a>
    <a style="font-size:15px;" class="icon" onclick="menuResponsivo();">&#9776;</a>
</nav>
</header>
<?php 
}

function rodape(){
    ?><footer> 
        <div class="floater01">
            <p class="textoRodape" style="margin-bottom:-3px;">Versão 2.0 © 2017-2018 - Todos Direitos Resevados  - Prefeitura de Olinda - <b>www.informatica.olinda.pe.gov.br</b></p>
        </div>
        <div class="floater02">
            <div class="contato">
                <i class="fa fa-phone"></i><span>(81) 3305-1075</span>
            </div>
        </div>
    </footer>
    </body>
    </html> <?php
}
?>