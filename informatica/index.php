<?php
include './Corpo.php';
include_once './util/connection.php';
$conn = conecta();
$query = "SELECT * FROM noticias ORDER BY id DESC LIMIT 3";
$sql = mysqli_query($conn, $query);
desconecta($conn);
if(is_null($sql) || is_bool($sql)){
    echo "<h1>ERROR</h1>";
}

cabecalho();
?>
<section>
    <div style="width: 100%; padding: 0 8%;">
        <div class="slideShow">
            <?php
            while($slides = mysqli_fetch_assoc($sql)){
            ?>
            <article class="slide">
                <div class="coluna">
                    <h2><?php echo utf8_encode($slides['titulo']);?></h2><br/>
                <p><?php echo utf8_encode(substr($slides['texto'], 0, 140))."...";?></p>
                <a href="noticia.php?id=<?php echo utf8_encode($slides['id'])?>">continue lendo...</a>
                </div>
                <div class="coluna">
                <?php
                if($slides['caminho'] === ""){
                    echo "<p style=\"font-size: 275px; color: #ddd; position: inherit;\" class='glyphicon glyphicon-file'></p>";
                }else{
                    echo "<figure>"
                    . "<img src=".utf8_encode($slides['caminho'])." class=\"img-responsive\">"
                    . "</figure>";
                }
                ?>
                </div>
            </article>
            <?php }?>
            <div class="passaSlides">
                <a class="glyphicon glyphicon-chevron-left slideAnterior" onclick="passaSlides(-1);"></a>
                <a class="glyphicon glyphicon-chevron-right slideProximo" onclick="passaSlides(1);"></a>
            </div>
        </div>
        <div class="acessoRapido">
            <canvas style="background-color: #f8c92e; float: left; height: 37px; width: 15px; margin: 0 !important;"></canvas>
            <h3 style="padding-left: 20px;">Acesso Rápido</h3>
            <div class="acessoRapidoIcones">
                <article onclick="nav(3);">
                    <p class="glyphicon glyphicon-envelope" style="position: inherit;"></p>
                    <h6>Email</h6>
                </article>
                <article onclick="nav(1);">
                    <p class="glyphicon glyphicon-bullhorn" style="position: inherit;"></p>
                    <h6>Abra um chamado</h6>
                </article>
                <article onclick="nav(6);">
                    <p class="glyphicon glyphicon-user" style="position: inherit;"></p>
                    <h6>Portal do contribuinte</h6>
                </article>
                <article onclick="nav(2);">
                    <p class="glyphicon glyphicon-usd" style="position: inherit"></p>
                    <h6>Contracheque</h6>
                </article>
                <article onclick="nav(9);">
                    <p class="glyphicon glyphicon-folder-close" style="position: inherit"></p>
                    <h6>GovBr</h6>
                </article>
                <article onclick="nav(4);" onmouseover="mudaFigura();" onmouseout="voltaFigura();">
                    <img class="img-siat" src="Imgs/siat.png" height="20">
                    <h6>SIAT</h6>
                </article>
            </div>
        </div>
    </div>
</section>

<?php
rodape();
?>