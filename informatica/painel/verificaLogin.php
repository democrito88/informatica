<?php
function verificaLogin(){
    if(!isset($_SESSION['login']) || $_SESSION['login'] != "admin"){
        $_SESSION['login'] = null;
        session_unset();
        unset($_SESSION['login']);
        header("Location: ../index.php");
    }
}
