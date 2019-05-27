<?php
function verificaLogin(){
    if(!isset($_SESSION['nome'])){
        header("Location: ../util/logout.php");
    }
}
