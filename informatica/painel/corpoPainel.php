<?php
session_start();
include_once 'verificaLogin.php';
function cabecalhoPainel(){
    verificaLogin();
?>        
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Coordenadoria de Inform&aacute;tica</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<link href="../css/painel.css" rel="stylesheet" type="text/css" />
<!-- Latest compiled and minified CSS -->
<!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"/>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons"/>

<!-- include libraries(jQuery, bootstrap) -->
<link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.css" rel="stylesheet"/>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script> 
<script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.js"></script> 

<!-- include summernote css/js -->
<link rel="stylesheet" href="../dist/summernote-lite.css" />
<script src="../dist/summernote-lite.js"></script>

<!-- jQuery library -->
<!-- Latest compiled JavaScript -->
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../js/script.js"></script>
<script type="text/javascript" src="../js/painel.js"></script>
</head>

    <body>
<header>
    <div class="rodateto">
        <span>Bem vindo, <?php echo $_SESSION['login'];?>!</span> <button class="btn btn-warning" onclick="sair();">Sair</button>
    </div>
</header>
<?php 
}

function fechaPainel(){
?>
</body>
</html>
    <?php
}