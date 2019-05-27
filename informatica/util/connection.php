<?php

function conecta(){
    try{
        $conn  = mysqli_connect("localhost","root","","intranet");
    }catch(Exception $e){
        echo "Erro na conecção do banco: ".$e->getMessage();
    }
    
}

function desconecta($conn){
    mysqli_close($conn);
}