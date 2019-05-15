<?php
include './Corpo.php';
cabecalho();
?>

<div id="fundo"></div>
<div class="dropdown">
    <button class="btn btn-primary dropdown-toggle selecioneAno" type="button" data-toggle="dropdown">
        Selecione o ano <span class="caret"></span>
    </button>
    <ul class="dropdown-menu">
        <?php
            for($ano = 1965; $ano <= 2006; $ano+=1){
                echo "<li><a href=\"listaDeLeis.php?ano=".$ano."\" target=\"resposta\">".$ano."</a></li>";
            }
        ?>
    </ul>
    <iframe name="resposta" id="resposta" class="resposta"></iframe>
</div>

<?php
rodape();
?>
