<?php
include './corpoPainel.php';
include_once '../util/connection.php';

cabecalhoPainel();

if( !is_null($_GET['id']) ){
    $id = $_GET['id'];
}else{
    throw new Exception("id não cofigurado corretamente.");
}

$conn = conecta();
$query = "SELECT * FROM noticias WHERE id = ".$id;
$sql = mysqli_query($conn, $query);
desconecta($conn);
mysqli_close($conn);

?>
<script>
    $(document).on('click', '.browse', function(){
        var file = $(this).parent().parent().parent().find('.file');
        file.trigger('click');
    });
    $(document).on('change', '.file', function(){
        $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
    
    $(document).ready(function() {
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
            });
    });
</script>
<div style="width: 100%; height: 100%; background-color: #eee; padding: 3%;">
    <form action="update.php" method="post" enctype="multipart/form-data">
        <?php while($noticia = mysqli_fetch_assoc($sql)){?>
        <h1>Edição de notícia</h1>
        <label class="container">
            <input type="checkbox" name="publicado" <?php echo $noticia['publicado'] == 1? "checked=\"checked\"" : "\"\"";?> value="1">Publicar<br/>
            <span class="checkmark"></span>
        </label>
        <span class="aviso">*Campos obrigatórios</span><br/>
        
        <span>Título*<input type="text" name="titulo" value="<?php echo utf8_encode($noticia['titulo']);?>" required=""/></span><br/><br/>
        <span>Texto*<!--textarea name="texto" rows="5" cols="40" required=""></textarea-->
        
        <textarea id="summernote" name="editordata"><?php echo utf8_encode($noticia['texto']);?></textarea></span><br/><br/>
        
        <label><span>Imagem</span><?php
        $check = $noticia['caminho'] == " "? "" : "checked";
        echo "<input id=\"colocaImagem\" name=\"colocaImagem\" type=\"checkbox\" onclick=\"toggleImagem(this);\" ".$check.">";
        ?></label>
        <label class="input-group col-xs-12">
            <input id="imagem" type="file" name="imagem" class="file" style="display: none;">
            <span class="input-group-btn">
                <button id="botaoImagem" class="browse btn btn-primary input-lg" type="button" style="float: left; border-radius: 5px 0 0 5px;">
                    <i class="glyphicon glyphicon-picture"></i> Selecione uma imagem
                </button>
            </span>
            <input id="nomeImagem" type="text" class="form-control input-lg" disabled style="float: left; border-radius: 0 5px 5px 0; font-size: 15px;" value="<?php echo utf8_encode($noticia['caminho']);?>" />
        </label>
        <br/><br/>
        
        <span>Legenda da imagem<input id="legenda" type="text" name="subtitulo" value="<?php echo utf8_encode($noticia['subtitulo']);?>"/></span><br/><br/>
        <input name="id" value="<?php echo $noticia['id'];?>" style="display: none;" readonly/>
        <?php }
        if(isset($_GET['m'])){
            echo "<div class=\"alert\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            <strong>Aviso:</strong>".$_GET['m']."
        </div>";
        }
        ?>
        
        <input class="btn btn-success" type="submit" value="Publicar" name="Subir notícia" style="width: 69%; float: left; margin-right: 1%"/>
        <button class="btn btn-primary" type="button" onclick="window.location = 'editaNoticia.php?id=<?php echo $id;?>';" style="width: 30%; float: left; height: 50px;">
            Desfazer alterações
        </button><br/><br/>
        <span><a href="painelDeNoticias.php"><i class="glyphicon glyphicon-circle-arrow-left"></i>Voltar para o painel</a></span>
        
    </form>
</div>
<?php
fechaPainel();
?>