var slideIndex = 1;

function menuResponsivo() {
    var x = document.getElementById("myTopnav");
    if (x.className === "nav") {
        x.className += " responsive";
    } else {
        x.className = "nav";
    }
}

function nav(num) {
    var endereco = 0;
    switch (num) {
        case 1:
            endereco = 'http://informatica.olinda.pe.gov.br/atendimento';
            break;
        case 2:
            endereco = 'http://contracheque.olinda.pe.gov.br/';
            break;
        case 3:
            endereco = 'http://mail.olinda.pe.gov.br/';
            break;
        case 4:
            endereco = 'https://www.tinus.com.br/csp/OLINDA/siat.csp?764fviq7083VRMsK76287SHxs3872YC=ZRei24oQS302kmO10980lGhAm509QEpZu8612g1603345gTDA214';
            break;
        case 5:
            endereco = 'http://emprestimo.olinda.pe.gov.br/';
            break;
        case 6:
            endereco = 'https://www.tinus.com.br/csp/OLINDA/portal/index.csp?710sCdY5660iivWk50998LBYX8326yd=pYdR74hHT207yru51652cvcRX576ekXtN9278t0090605YQGT931';
            break;
        case 7:
            endereco = 'anos.php';
            break;
        case 8:
            endereco = 'http://protocolo.olinda.pe.gov.br/';
            break;
        case 9:
            endereco = 'https://nuvem.pronim.com.br/';
            break;
        default:
            endereco: 'www.google.com';
            break;
    }
    window.open(endereco);
}

function downloads(num) {
    var endereco = 0;
    var caso = num;
    switch (caso) {
        case 1:
            endereco = 'documentos/Pesquisa de satisfação - CGI.pdf';
            break;
        case 2:
            endereco = 'documentos/Questionário para aquisição de computador.pdf';
            break;
        case 3:
            endereco = 'documentos/PSI-_Política_de_Segurança_da_Informação.pdf';
            break;
        case 4:
            endereco = 'documentos/atareuni%C3%A3o.ott';
            break;
        case 5:
            endereco = 'documentos/caixaconteudo.ott';
            break;
        case 6:
            endereco = 'documentos/espelhocaixa.ott';
            break;
        case 7:
            endereco = 'documentos/SOLICITADOCFUNC.ott';
            break;
        case 8:
            endereco = 'documentos/solicitatestadobito.ott';
            break;
        case 9:
            endereco = 'documentos/ci/ci_cor_gabpref.ott';
            break;
        case 10:
            endereco = 'documentos/ci/ci_cor_gabvice.ott';
            break;
        case 11:
            endereco = 'documentos/ci/ci_cor_saj.ott';
            break;
        case 12:
            endereco = 'documentos/ci/ci_cor_sdscdh.ott';
            break;
        case 13:
            endereco = 'documentos/ci/ci_cor_secobras.ott';
            break;
        case 14:
            endereco = 'documentos/ci/ci_cor_secom.ott';
            break;
        case 15:
            endereco = 'documentos/ci/ci_cor_sedett.ott';
            break;
        case 16:
            endereco = 'documentos/ci/ci_cor_seduc.ott';
            break;
        case 17:
            endereco = 'documentos/ci/ci_cor_sefad.ott';
            break;
        case 18:
            endereco = 'documentos/ci/ci_cor_segov.ott';
            break;
        case 19:
            endereco = 'documentos/ci/ci_cor_sepac.ott';
            break;
        case 20:
            endereco = 'documentos/ci/ci_cor_sepge.ott';
            break;
        case 21:
            endereco = 'documentos/ci/ci_cor_seservpubl.ott';
            break;
        case 22:
            endereco = 'documentos/ci/ci_cor_sespju.ott';
            break;
        case 23:
            endereco = 'documentos/ci/ci_cor_setcua.ott';
            break;
        case 24:
            endereco = 'documentos/ci/ci_cor_sopmadu.ott';
            break;
        case 25:
            endereco = 'documentos/download2.zip';
            break;
        case 26:
            endereco = 'documentos/download1.doc';
            break;
        default:
            endereco: 'www.google.com';
            break;
    }
    window.open(endereco);
    /*window.location = endereco;*/
}

//Para o slideshow na página inicial
var indiceSlide = 1;
//mostraSlides(indiceSlide);

function passaSlides(n) {
  mostraSlides(indiceSlide += n);
}

function mostraSlides(n) {
    var i;
    //indiceSlide = 1;
    var slides = document.getElementsByClassName("slide");
    if (n > slides.length) {indiceSlide = 1;}    
    if (n < 1) {indiceSlide = slides.length;}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    slides[indiceSlide-1].style.display = "block";
}
//Fim slideshow

//Para o modal na página anos.php
function off() {
    var fundo = parent.document.getElementById("fundo");

    $("#baixar").remove();
    $("#fechar").remove();
    $(".linkEsquerdo").remove();
    $(".linkDireito").remove();
    $(".lei").remove();

    fundo.style.display = "none";
}

function on(endereco, numero, ano) {
    var fundo = parent.document.getElementById("fundo");
    var download = parent.document.createElement("a");
    var glyphicon = parent.document.createElement("i");
    var span = document.createElement("span");
    var figure = document.createElement("figure");
    var img = document.createElement("img");
    var figcaption = document.createElement("figcaption");

    span.setAttribute("id", "fechar");
    span.setAttribute("onclick", "off();");
    span.innerHTML = "&times;";

    download.setAttribute("href", "/informatica/" + endereco);
    download.setAttribute("download", "Lei de nº" + numero + " do ano de " + ano);
    download.setAttribute("id", "baixar");
    glyphicon.setAttribute("class", "fa fa-download");

    //"<a id='baixar' href='/Imgs/fotos/"+endereco+"' download><i class='fa fa-download'></i></a>"

    figure.setAttribute("class", "lei");
    img.src = endereco;
    figcaption.innerHTML = "Lei de nº" + numero + " do ano de " + ano;

    figure.appendChild(img);
    figure.appendChild(figcaption);
    download.appendChild(glyphicon);
    fundo.appendChild(download);
    fundo.appendChild(span);
    fundo.appendChild(figure);
    fundo.style.display = "block";
}

function on2(numero, ano) {
    var fundo = parent.document.getElementById("fundo");
    /*var download = parent.document.createElement("a");
    var glyphicon = parent.document.createElement("i");
    
    download.setAttribute("onclick", "downloadLeis(" + numero + ");");
    download.setAttribute("download", "Lei de nº" + numero + " do ano de " + ano);
    download.setAttribute("id", "baixar");
    glyphicon.setAttribute("class", "fa fa-download");*/

    if (numero === "") {
        fundo.innerHTML = "";
        return;
    }
    if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
    } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
    }
    xmlhttp.onreadystatechange = function () {
        if (this.readyState === 4 && this.status === 200) {
            fundo.innerHTML = "<span id='fechar' onclick='off();'>&times;</span>" + this.responseText;
            //download.appendChild(glyphicon);
            //fundo.appendChild(download);
        }
    };
    xmlhttp.open("GET", "lightBox.php?numero=" + numero + "&ano=" + ano, true);
    xmlhttp.send();
    
    fundo.style.display = "block";
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function showSlides(n) {
    var i;
    var slides = document.getElementsByClassName("lei");
    //document.innerHTML =  "<br /><span>"+typeof slides+"</span><br />";
    if (n > slides.length) {
        slideIndex = 1;
    }
    if (n < 1) {
        slideIndex = slides.length;
    }
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }

    slides[slideIndex - 1].style.display = "block";
}

//Para baixar as leis
function downloadLeis(numero) {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById("baixar").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "criaZip.php?numero="+numero, true);
  xhttp.send();   
}

function BaixarLeisTeste(){
var xhr = new XMLHttpRequest();
xhr.open('POST', url, true);
xhr.responseType = 'arraybuffer';
xhr.onload = function () {
    if (this.status === 200) {
        var filename = "";
        var disposition = xhr.getResponseHeader('Content-Disposition');
        if (disposition && disposition.indexOf('attachment') !== -1) {
            var filenameRegex = /filename[^;=\n]*=((['"]).*?\2|[^;\n]*)/;
            var matches = filenameRegex.exec(disposition);
            if (matches != null && matches[1]) filename = matches[1].replace(/['"]/g, '');
        }
        var type = xhr.getResponseHeader('Content-Type');

        var blob = typeof File === 'function'
            ? new File([this.response], filename, { type: type })
            : new Blob([this.response], { type: type });
        if (typeof window.navigator.msSaveBlob !== 'undefined') {
            // IE workaround for "HTML7007: One or more blob URLs were revoked by closing the blob for which they were created. These URLs will no longer resolve as the data backing the URL has been freed."
            window.navigator.msSaveBlob(blob, filename);
        } else {
            var URL = window.URL || window.webkitURL;
            var downloadUrl = URL.createObjectURL(blob);

            if (filename) {
                // use HTML5 a[download] attribute to specify filename
                var a = document.createElement("a");
                // safari doesn't support this yet
                if (typeof a.download === 'undefined') {
                    window.location = downloadUrl;
                } else {
                    a.href = downloadUrl;
                    a.download = filename;
                    document.body.appendChild(a);
                    a.click();
                }
            } else {
                window.location = downloadUrl;
            }

            setTimeout(function () { URL.revokeObjectURL(downloadUrl); }, 100); // cleanup
        }
    }
};
xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
xhr.send($.param(params));

}

function mudaFigura(){
    var figura = window.document.getElementsByClassName("img-siat")[0];
    figura.src = "Imgs/siat-invertido.png";
}

function voltaFigura(){
    var figura = window.document.getElementsByClassName("img-siat")[0];
    figura.src = "Imgs/siat.png";
}