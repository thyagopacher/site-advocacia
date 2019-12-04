<?php
include("../model/Conexao.php");
$conexao = new Conexao();
$site = $conexao->comandoArray("select * from site");
if (isset($_REQUEST["codconteudo"])) {
    $and = " and codconteudo = '{$_REQUEST["codconteudo"]}'";
    $noticia = $conexao->comandoArray("select * from conteudo where codcategoria = 10 {$and}");
}else{
    die("<script>alert('Não pode acessar página sem definir qual conteúdo!');window.history.back();</script>");
}

function mascara_string($string, $mascara = "(##)####-####") {
    $string = str_replace(" ", "", $string);
    for ($i = 0; $i < strlen($string); $i++) {
        $mascara[strpos($mascara, "#")] = $string[$i];
    }
    return $mascara;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
        <meta name="google-site-verification" content="TwtLT8iDdQjXFaGOis0wMRiKPo6roIzqhfAIopIzpyk" />
        <meta name="msvalidate.01" content="8A3E7CF584BFEC94ED0F8E6945BFD433" />
        <meta name="description" content="<?= $noticia["descricao"] ?>"/>
        <meta name="keywords" content="<?= $noticia["palavrachave"] ?>"/>        
        <title>
            Escritório de Advocacia | <?= $site["nome"] ?>        
        </title>
        <?php include("scripts.php"); ?>
        <script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>
    </head>
    <body class="none">
        <div class="geral">
            <?php include("header.php"); ?>
            <div style="background: white; width: 100%">
                <div class="cont">
                    <h2 style="padding: 25px;font-size: 20px;">Notícia - <?= $noticia["nome"] ?></h2>
                    <div style="line-height: 20px !important; font-family: arial !important; font-size: 11px !important;">
                        <?php
                        echo $noticia["texto"];
                        ?>
                    </div>
                    <div>
                        <div style="float: left;">
                            <iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fronaldarruda.com.br/noticia/<?= $_GET["codconteudo"] ?>%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>        
                        </div>
                        <div style="float: left; margin-left: 10px;">
                            <g:plusone size="tall"></g:plusone>
                        </div>
                        <div style="float: left; margin-left: 10px;">
                            <script type="text/javascript">
                                //carregamento assincrono google +
                                (function () {
                                    var po = document.createElement('script');
                                    po.type = 'text/javascript';
                                    po.async = true;
                                    po.src = 'https://apis.google.com/js/plusone.js';
                                    var s = document.getElementsByTagName('script')[0];
                                    s.parentNode.insertBefore(po, s);
                                })();
                            </script>                  
                            <script src="http://platform.linkedin.com/in.js" type="text/javascript">
                                lang: pt_BR;
                            </script>
                            <script type="IN/Share" data-counter="right"></script> 
                        </div>
                        <div style="float: left; margin-left: 10px">
                            <a href="https://twitter.com/share" class="twitter-share-button" data-lang="pt" data-related="thyagopacher">Tweetar</a>
                            <script>
                                !function (d, s, id) {
                                    var js, fjs = d.getElementsByTagName(s)[0], p = /^http:/.test(d.location) ? 'http' : 'https';
                                    if (!d.getElementById(id)) {
                                        js = d.createElement(s);
                                        js.id = id;
                                        js.src = p + '://platform.twitter.com/widgets.js';
                                        fjs.parentNode.insertBefore(js, fjs);
                                    }
                                }(document, 'script', 'twitter-wjs');
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="clear"></div>
        <div class="clear"></div>
        <?php include("footer.php"); ?>
    </body>
</html>
