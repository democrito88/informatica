<?php
include_once './util/connection.php';
if(is_null($_GET['numero'])){
    throw new Exception("<h4>Parâmetro não configurado</h4>");
}

$numero = intval($_GET['numero']);

//verifica se existe o caractere ';' na variável GET
$findme   = ';';
$flag = strpos($numero, $findme);

if($flag === true){
    throw new Exception("<h4>Parâmetro inválido</h4>");
}else{
    $conn = conecta();
    $query = "SELECT foto FROM leis WHERE numero = ".$numero." ORDER BY id";
    $fotos = mysqli_query($conn, $query);
    desconecta($conn);
    if(is_null($fotos) || is_bool($fotos)){
        echo "ERROR";
    }
    $destination = "//documentos";
    $overwrite = "";
    if(count($fotos)) {
        //create the archive
        $zip = new ZipArchive();
        if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true) {
                return false;
        }
        //add the files
        while($foto = mysqli_fetch_assoc($fotos)){
            $zip->addFile($file,$file);
        }
        //debug
        //echo 'The zip archive contains ',$zip->numFiles,' files with a status of ',$zip->status;

        //close the zip -- done!
        $zip->close();

        //check to make sure the file exists
        //return file_exists($destination);
        //return $zip;
        readfile($zip->filename);
    }
    else
    {
        return false;
    }
}

/*if(isset($_REQUEST["file"])){

    // Get parameters

    $file = urldecode($_REQUEST["file"]); // Decode URL-encoded string

    $filepath = "images/" . $file;

    

    // Process download

    if(file_exists($filepath)) {

        header('Content-Description: File Transfer');

        header('Content-Type: application/octet-stream');

        header('Content-Disposition: attachment; filename="'.basename($filepath).'"');

        header('Expires: 0');

        header('Cache-Control: must-revalidate');

        header('Pragma: public');

        header('Content-Length: ' . filesize($filepath));

        flush(); // Flush system output buffer

        readfile($filepath);

        exit;

    }

}*/