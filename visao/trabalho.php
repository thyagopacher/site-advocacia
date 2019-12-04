<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    ob_start('ob_gzhandler');
    include("../model/Conexao.php");
    $conexao = new Conexao();
    $conexao->conectar();
    $and = "";
    if(isset($_GET["nome"])){
        $and .= " and nome like '%". addslashes($_GET["nome"])."%'";
    }
    if(isset($_GET["tipo"])){
        $and .= " and tipo = '{$_GET["tipo"]}'";
    }
    if(isset($_GET["codtrabalho"])){
        $and .= " and codtrabalho = '{$_GET["codtrabalho"]}'";
    }else{
        if(isset($_GET["tipo"])){
            $descricao    = "Meus trabalho de desenvolvimento de {$_GET["tipo"]}";
            $palavrachave = "desenvolvimento de {$_GET["tipo"]}, {$_GET["tipo"]} da melhor qualidade, {$_GET["tipo"]} rápidos e a pronta entrega";
            $trabalho["nome"] = "Trabalhos de {$_GET["tipo"]}";
        }else{
            $descricao = "Nossos desenvolvimentos de sites e sistemas em Ponta Grossa e Região";
            $palavrachave = "desenvolvimento de sites, desenvolvimento de sistemas, sistemas java, sistemas PHP, sistemas financeiros, sistemas com relatórios, extrator de dados, sistemas rápidos";
            $trabalho["nome"] = "Trabalhos de sites e sistemas";
        }
    }
    $restrabalho = $conexao->comando("select * from trabalho where 1 = 1". $and);
    if(isset($_GET["codtrabalho"])){
        $trabalho = $conexao->iteraResultadoArray($restrabalho);
        $descricao = $trabalho["descricao"];
        $palavrachave = $trabalho["palavrachave"];
    }
    $site = $conexao->iteraResultadoArray($conexao->comando("select * from site where codsite = '1'"));
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="<?=$descricao?>">
        <meta name="keywords" content="<?=$palavrachave?>" />
        <meta name="author" content="Thyago Henrique Pacher - thyago.pacher@gmail.com">     
        <link rel="stylesheet" href="/visao/css/lightbox.min.css">
        <link rel="stylesheet" type="text/css" media="screen" href="/visao/css/style.min.css" />
        <title><?=$trabalho["nome"]?> - feito por <?=$site["nome"]?></title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>  
    </head>
    <body>
        <?php include("cabecalho.php");?>
        <div id="content-wrap-home">
            <h3><?=$trabalho["nome"]?></h3>
            <?php 
            if(isset($_GET["codtrabalho"])){
                echo $trabalho["texto"];
                echo '<a href="/visao/img/',$trabalho["tipo"],'/',$trabalho["imagem"],'"  data-lightbox="roadtrip">';
                if(isset($trabalho["imagem"]) && !empty($trabalho["imagem"])){
                    echo '<img width="300" class="imgTrabalho" src="/visao/img/',$trabalho["tipo"],'/',$trabalho["imagem"],'" alt="Imagem do trabalho ',$trabalho["nome"],'"/>';
                }
                echo '</a>'; 
            }else{
                $qtdtrabalho = mysql_num_rows($restrabalho);
                if($qtdtrabalho > 0){
                    echo '<ul>';
                    while($trabalho = mysql_fetch_array($restrabalho)){
                        echo '<li><a href="/trabalho/',$trabalho["tipo"],'/',$trabalho["codtrabalho"],'">',$trabalho["nome"],'</a></li>';
                    }
                    echo '</ul>';
                }else{
                    echo 'Nada encontrado de trabalhos cadastrados!<br>';
                }
            }
            ?>
            <iframe src="//www.facebook.com/plugins/like.php?href=http%3A%2F%2Fsitesesistemaspg.com/<?=$_GET["tipo"]?>%2F&amp;width&amp;layout=standard&amp;action=like&amp;show_faces=true&amp;share=true&amp;height=80" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:80px;" allowTransparency="true"></iframe>        
        </div>
        <?php include("footer.php");?>
        <script type="text/javascript" src="/visao/js/lightbox.min.js"></script>     
    </body>
</html>

<?php
    $html = ob_get_clean (); 
    echo preg_replace('/\s+/', ' ', $html);