<?php
include './Corpo.php';
include_once './util/connection.php';

$conn = conecta();
$query = "SELECT * FROM noticias ORDER BY id DESC";
$sql = mysqli_query($conn, $query);
desconecta($conn);
if(is_null($sql) || is_bool($sql)){
    echo "<h1>ERROR</h1>";
}

cabecalho();
?>
<section>
    <div style="padding: 0 8%; margin-top: 1%;">
        <div class="tituloNoticias"><canvas></canvas>Notícias</div>
<?php while($noticia = mysqli_fetch_assoc($sql)){?>
    <article class="previewNoticia" onclick="window.location.replace('noticia.php?id=<?php echo $noticia['id'];?>');">
        <h4><?php echo utf8_encode($noticia['titulo']);?></h4><br>
        <p><?php echo utf8_encode(substr($noticia['texto'], 0, 140))."...";?></p>
    </article>
<?php }?>
    </div>
</section>
<?php
rodape();
?>