<?php
include './Corpo.php';

if(is_null($_GET['id'])){
    throw new Exception("<h4>Parâmetros não configurados</h4>");
}

$id = intval($_GET['id']);

$findme   = ';';
$flag = strpos($id, $findme);

if($flag === true){
    throw new Exception("<h4>Parâmetros inválidos</h4>");
}else{
    
$conn = mysqli_connect("localhost", "root", "B@nc0NEW", "intranet");
$query = "SELECT * FROM noticias WHERE id = ".$id;
$sql = mysqli_query($conn, $query);
if(is_null($sql) || is_bool($sql)){
    echo "<h1>ERROR</h1>";
}

cabecalho();

while($noticia = mysqli_fetch_assoc($sql)){
?>
<section style="width: 100%; padding: 0 8%;">
    <article class="noticia">
        <h2><?php echo utf8_encode($noticia['titulo']);?></h2>
        <?php if($noticia['caminho'] != ""){?>
        <figure>
            <img src="<?php echo utf8_encode($noticia['caminho']);?>" width="403" height="250">
            <figcaption><?php echo utf8_encode($noticia['subtitulo']);?></figcaption>
        </figure>
        <?php } echo utf8_encode($noticia['texto']);?>
        <br />
    </article>
    <aside class="barraNoticias">
        <div>
            <canvas style="background-color: #f8c92e; float: left; height: 50px; width: 15px; margin: 0 !important;"></canvas>
            <h5 style="font-size: 25px; margin: 0 0 0 20px; padding: 8px;">Mais notícias</h5>
        </div>
        
        <canvas style="width: 100%; margin: 0; height: 3px;"></canvas>
        <?php
        $query = "SELECT id, titulo FROM noticias ORDER BY id DESC LIMIT 4";
        $sql = mysqli_query($conn, $query);
        while($noticia = mysqli_fetch_assoc($sql)){
            ?>
        <article onclick="window.location.replace('noticia.php?id=<?php echo $noticia['id'];?>')">
            <h6><?php echo utf8_encode(substr($noticia['titulo'], 0, 50))."...";?></h6>
        </article>
        <canvas></canvas>
            <?php
        }
        ?>
        <h5><a href="noticias.php">mais notícias...</a></h5>
    </aside>
</section>
<?php
}

}
rodape();
?>