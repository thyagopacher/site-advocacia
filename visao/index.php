<?php
header ('Content-type: text/html; charset=UTF-8'); 
ini_set("zlib.output_compression", "On");
include("../model/Conexao.php");
$conexao = new Conexao();
$site = $conexao->comandoArray("select * from site");
$resslide = $conexao->comando("select * from slideshow order by rand()");
$qtdslide = mysql_num_rows($resslide);
$sobre = $conexao->comandoArray("select * from conteudo where codconteudo = '1'");
function mascara_string($string, $mascara = "(##)####-####") {
    $string = str_replace(" ", "", $string);
    for ($i = 0; $i < strlen($string); $i++) { $mascara[strpos($mascara, "#")] = $string[$i];}
    return $mascara;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta name="google-site-verification" content="TwtLT8iDdQjXFaGOis0wMRiKPo6roIzqhfAIopIzpyk" />
        <meta name="msvalidate.01" content="8A3E7CF584BFEC94ED0F8E6945BFD433" />
        <meta name="description" content="<?= $site["descricao"] ?>"/>
        <meta name="keywords" content="<?= $site["palavrachave"] ?>"/>
        <title>Escritório de Advocacia | <?= $site["nome"] ?></title>
        <?php include("scripts.php"); ?>
    </head>
    <body class="none">
        <div class="geral">
            <?php include("header.php"); ?>
            <div style="background: white; width: 100%">
                <div class="cont">
                    <div class="flash" id="examples">
                        <span id="banner_mask">&nbsp;</span>
                        <div id="slideshow" class="examples" style="position: relative; width: 885px; height: 239px;">
                            <?php
                            $linha = 1;
                            while ($slide = mysql_fetch_array($resslide)) {
                                ?>
                                <a href="<?= $slide["link"] ?>" target="_self" onclick="trocaTexto(<?= $linha ?>)" style="position: absolute; width: 885px;">
                                   <img src="/arquivos/<?= $slide["imagem"] ?>" alt="<?= $site["nome"] ?>" style="max-width: 700px" width="561" height="235"/>
                                   <p><?= addslashes($slide["descricao"]) ?></p>  
                                </a>
                                <?php
                                $linha++;
                            }
                            ?>
                        </div>
                        <div id="nav"></div>
                    </div>
                    <div class="acontece">
                        <h2>Notícias</h2>
                        <ul>
                            <?php
                            $resconteudo = $conexao->comando("select conteudo.*, DATE_FORMAT(data, '%d . %m . %Y') as data2 from conteudo where codcategoria = 10 order by codconteudo desc limit " . $site["qtdnoticia"]);
                            $qtdconteudo = mysql_num_rows($resconteudo);
                            if ($qtdconteudo > 0) {
                                while ($noticia = mysql_fetch_array($resconteudo)) {
                                    ?>
                                    <li>
                                        <div class="data"><?= $noticia["data2"] ?></div>
                                        <div class="descricao">
                                            <h3><a href="/noticia/<?= $noticia["codconteudo"] ?>"><?= $noticia["nome"] ?></a></h3>
                                            <p>
                                                <a href="/noticia/<?= $noticia["codconteudo"] ?>">
                                                    <?php
                                                    if (strlen(trim($noticia["texto"])) > 180) {echo substr(strip_tags($noticia["texto"]), 0, 180) . '...';} 
                                                    else { echo trim(strip_tags($noticia["texto"]));}
                                                    ?>
                                                </a>
                                            </p>
                                        </div>
                                    </li>
                                    <?php
                                }
                            } else {
                                echo "<li>Nada encontrado</li>";
                            }
                            ?>
                            <li><a href="/noticias" class="todo">VER TODAS</a></li>
                        </ul>
                    </div>
                    <div class="bts">
                        <?php
                        $sql = "select * from banner order by rand() limit 4";
                        $resbanner = $conexao->comando($sql);
                        $qtdbanner = mysql_num_rows($resbanner);
                        if ($qtdbanner > 0) {
                            while ($banner = mysql_fetch_array($resbanner)) {
                                $separacao = explode(".", $banner["imagem"]);
                                echo '<a href="', $banner["link"], '">';
                                if($separacao[1] == "jpg" || $separacao[1] == "png" || $separacao[1] == "gif"){
                                    echo '<img style="min-width: 85px;max-width: 124px;height: 86px;border-radius: 0px 0px 0px 25px;" src="/arquivos/', $banner["imagem"], '" alt="Banner site de advocacia Ronald Arruda"/>';
                                }
                                echo '<p style="text-align: left;font-size: 12px;width: 125px;float: left;padding: 10px;">', $banner["descricao"], '</p>';
                                echo '</a>';
                            }
                        } else {
                            echo "Nenhum banner encontrado!";
                        }
                        ?>
                    </div>            
                </div>
            </div>
        </div>
        <div class="clear"></div><div class="clear"></div>
        <?php include("footer.php"); ?>
    </body>
</html>
