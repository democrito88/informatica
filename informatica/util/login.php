<?php
include_once './connection.php';
include_once './antiInjection.php';

session_start();
$login = isset($_POST['login'])? $_POST['login'] : "";
$senha = isset($_POST['senha'])? $_POST['senha'] : "";

try {
    valida($login);
    valida($senha);
} catch (Exception $exc) {
    echo $exc->getMessage();
}

$conn = conecta();
$query = "SELECT nome FROM usuarios WHERE login = '".$login."' AND senha = MD5(MD5('".$senha."'));";
$resultados = mysqli_query($conn, $query);
desconecta($conn);
if(mysqli_num_rows($resultados) == 1){
    while($resultado = mysqli_fetch_assoc($resultados)){
        $_SESSION['nome'] = $resultado['nome'];
    }
    header("Location: http://informatica.olinda.pe.gov.br/informatica/painel/painelDeNoticias.php");
    //header("Location: http://localhost/informatica/painel/painelDeNoticias.php");
}else{
    unset($_SESSION['nome']);
    session_unset();
    header("Location: http://informatica.olinda.pe.gov.br/informatica/index.php");
    //header("Location: http://localhost/informatica/index.php");
}