<?php

function conecta(){
    try{
        $conn  = mysqli_connect("127.0.0.1","root","B@nc0NEW","intranet");
    }catch(Exception $e){
        echo "Erro na conecção do banco: ".$e->getMessage();
    }
    return $conn;
}

function desconecta($conn){
    mysqli_close($conn);
}