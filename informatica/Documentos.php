<?php
include './Corpo.php';
cabecalho();
?>
<section class="row" style="margin-top: 5vh; width: 100%; height: auto; margin-left: 5vw;">
    <article class="dropdown col-md-4 recebeBalao">
        <span class="balao" style="left: 15%;">Modelos base de C.I.'s em arquivos ".ott"</span>
        <button class="btn btn-primary dropdown-toggle recebeBalao" type="button" data-toggle="dropdown">C.I. - Modelos Gerais<span class="caret"></span></button>
        <ul class="dropdown-menu" style="max-width: 450px; overflow-x: scroll;">
            <li><a href="documentos/atareuni%C3%A3o.ott">Ata de Reunião</a></li>
            <li><a href="documentos/caixaconteudo.ott">Caixa de Conteúdo</a></li>
            <li><a href="documentos/espelhocaixa.ott">Espelho Caixa</a></li>
            <li><a href="documentos/SOLICITADOCFUNC.ott">Solicitação de Documentos Funcionais</a></li>
            <li><a href="documentos/solicitatestadobito.ott">Solicitação de cópias de Atestado de Óbito</a></li>
            <li><a href="documentos/ci/ci_cor_gabpref.ott">Gab. do Prefeito</a></li>
            <li><a href="documentos/ci/ci_cor_gabvice.ott">Gab. do vice Prefeito</a></li>
            <li><a href="documentos/ci/ci_cor_saj.ott">Secretaria de Assuntos Jurídicos</a></li>
            <li><a href="documentos/ci/ci_cor_sdscdh.ott">Secretaria de Desen. Social, Cidadania e Direitos Humanos</a></li>
            <li><a href="documentos/ci/ci_cor_secobras.ott">Secretaria de Obras</a></li>
            <li><a href="documentos/ci/ci_cor_secom.ott">Secretaria de Comunicação</a></li>
            <li><a href="documentos/ci/ci_cor_sedett.ott">Secretaria de Desen. Econômico, Tecnológico e Turismo</a></li>
            <li><a href="documentos/ci/ci_cor_seduc.ott">Secretaria de Educação</a></li>
            <li><a href="documentos/ci/ci_cor_sefad.ott">Secretaria de Fazenda e da Administração</a></li>
            <li><a href="documentos/ci/ci_cor_segov.ott">Secretaria de Governo</a></li>
            <li><a href="documentos/ci/ci_cor_sepac.ott">Secretaria de Patrimônio Cultural</a></li>
            <li><a href="documentos/ci/ci_cor_sepge.ott">Secretaria de Planejamento e Gestão de Estratégia</a></li>
            <li><a href="documentos/ci/ci_cor_seservpubl.ott">Secretaria de serviços Público</a></li>
            <li><a href="documentos/ci/ci_cor_sespju.ott">Secretaria de Esporte e Juventude</a></li>
            <li><a href="documentos/ci/ci_cor_setcua.ott">Secretaria de Transporte, Controle Urbano e Ambiental</a></li>
            <li><a href="documentos/ci/ci_cor_sopmadu.ott">Secretaria do Orcamento Part., Meio Ambiente e Desen. Urbano</a></li>
        </ul>
    </article>
    
    <article class="col-md-4">
        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="align-self: center;">Logo de Olinda<span class="caret"></span></button>
        <ul class="dropdown-menu" style="max-width: 140px;">
            <li><a href="documentos/download2.zip">em PDF</a></li>
            <li><a href="documentos/download1.zip">em documento Word</a></li>
        </ul>
    </article>

    <article class="col-md-4 recebeBalao">
        <span class="balao" style="left: 10%;">Consulte algumas leis municipais</span>
        <button class="btn btn-primary recebeBalao" onclick="window.location='anos.php'">Leis</button>
    </article>
    
</section>
<?php
rodape();
?>