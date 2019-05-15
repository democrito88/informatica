<?php
include './corpoPainel.php';
cabecalhoPainel();
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
    <form onsubmit="validaImagem()" action="upload.php" method="post" enctype="multipart/form-data">
        <h1>Insira uma nova notícia</h1>
        <span class="aviso">*Campos obrigatórios</span><br/>
        <span class="label">Título*<br/><input type="text" name="titulo" required=""/></span><br/><br/>
        <span class="label">Texto*<!--textarea name="texto" rows="5" cols="40" required=""></textarea></span><br/--><br/>
        
            <textarea id="summernote" name="editordata"></textarea></span><br/><br/>
        
        <label><span class="label">Imagem</span><input id="colocaImagem" name="colocaImagem" type="checkbox" onclick="toggleImagem(this);" checked></label>
        <label class="input-group col-xs-12">
            <input id="imagem" type="file" name="imagem" class="file" style="display: none;">
            <span class="input-group-btn">
                <button id="botaoImagem" onblur="validaImagem()" class="browse btn btn-primary input-lg" type="button" style="float: left; border-radius: 5px 0 0 5px;">
                    <i class="glyphicon glyphicon-picture"></i> Selecione uma imagem
                </button>
            </span>
            <input type="text" id="nomeImagem" class="form-control input-lg" value="" style="float: left; border-radius: 0 5px 5px 0; font-size: 15px;" readonly>
        </label>
        <?php
        if(isset($_GET['m'])){
            echo "<div class=\"alert\">
            <span class=\"closebtn\" onclick=\"this.parentElement.style.display='none';\">&times;</span> 
            <strong>Aviso:</strong>".$_GET['m']."
        </div>";
        }
        ?>
        <br/>
        <span class="aviso" id="tipoImagem" style="display: none;">São permitidas apenas as extensões: ".jpg", ".jpeg", ".bmp", ".gif", ".png"</span>
        <br/><br/>
        
        <span class="label">Legenda da imagem<br/><input id="legenda" type="text" name="subtitulo" /></span><br/><br/>
        <input class="btn btn-success" type="submit" value="Publicar" name="Subir notícia" /><br/><br/>
        <span class="label"><a href="painelDeNoticias.php"><i class="glyphicon glyphicon-circle-arrow-left"></i>Voltar para o painel</a></span>
    </form>
</div>
<?php
fechaPainel();
?>