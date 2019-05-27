<?php
include './corpoPainel.php';
include_once '../util/connection.php';

cabecalhoPainel();

$conn = conecta();
$query = "SELECT * FROM noticias ORDER BY id";
$sql = mysqli_query($conn, $query);
desconecta($conn);
?>
<script>
function mostraNoticia(id) {
  var xhttp;
  if (isNaN(id)) {
    return;
  }
  xhttp = new XMLHttpRequest();
  
  xhttp.open("GET", "./mostraNoticia.php?id="+id, true);
  
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) {
      document.getElementById("modalNoticia").style = "display: block;";
      document.getElementById("modalNoticia").innerHTML = this.responseText;
    }
  };
  
  xhttp.send();
}

function fechar(){
    var modalNoticia = document.getElementById("modalNoticia");
    
    $("#fechar").remove();
    $("#noticia").remove();

    modalNoticia.style.display = "none";
}
</script>
<section id="modalNoticia">
</section>
<section style="padding: 2% 8%; background-color: #ddd;">
    <div style="padding: 5%; background-color: white; box-shadow: 2px 2px 5px #555;">
        <h1>Painel de notícias</h1>
        <table>
            <thead>
                <tr>
                    <th colspan="4"><span onclick="window.location = 'novaNoticia.php';"><i class="glyphicon glyphicon-plus-sign"></i>Adicione uma nova notícia</span></th>
                </tr>
                <tr>
                    <th>Títulos</th><th>Publicada</th><th colspan="2"></th>
                </tr>
            </thead>
            <tbody>
            <?php
            while($noticia = mysqli_fetch_assoc($sql)){
                echo "<tr><td style=\"width: 95%;\" onclick=\"mostraNoticia(".$noticia['id'].");\">". utf8_encode($noticia['titulo'])."</td>"
                        ."<td>".($noticia['publicado'] == 1 ? "Sim" : "Não"). "</td>"
                        . "<td class=\"glyphicon glyphicon-pencil\" onclick=\"window.location = 'editaNoticia.php?id=".$noticia['id']."';\"></td>"
                        . "<td id=\"".$noticia['id']."\" class=\"glyphicon glyphicon-trash lixeira\">"
                        . "<div class=\"tooltiptext\">
                            <span>deseja mesmo excluir?</span><br/><br/>
                            <button onclick=\"window.location = 'removerNoticia.php?id=".$noticia['id']."';\" class=\"btn btn-danger\">Sim</button>
                            </div>"
                        . "</td></tr>";
            }
            ?>
            </tbody>
            <tfoot>
                <tr>
                    <td></td><td></td><td></td><td></td>
                </tr>
            </tfoot>
        </table>
    </div>
</section>
<?php
fechaPainel();
?>