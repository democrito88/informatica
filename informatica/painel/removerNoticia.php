<?php
include_once '../util/connection.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $findme   = ';';
    $flag = strpos($id, $findme);
    if($flag === true){
        throw new Exception("<h4>Parâmetros inválidos</h4>");
    }
}else{
    throw new Exception("<h4>Parâmetros não configurados</h4>");
}

$conn = conecta();

$query = "SELECT * FROM `noticias` WHERE id='".$id."'";
$sql = mysqli_query($conn, $query);
while($noticia = mysqli_fetch_assoc($sql)){
    if(!($noticia['caminho'] == "" || $noticia['caminho'] == " ")){
        unlink("C:\\xampp\htdocs\informatica\\".$noticia['caminho']);
    }
}


$query = "DELETE FROM `noticias` WHERE id='".$id."'";
mysqli_query($conn, $query);
desconecta($conn);

header("Location: http://informatica.olinda.pe.gov.br/informatica/painel/painelDeNoticias.php");
?>
