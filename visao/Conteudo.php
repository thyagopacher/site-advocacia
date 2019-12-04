<?php
    include("../model/Conexao.php");
    $conexao = new Conexao();
    $site = $conexao->comandoArray("select * from site");
    
    $and = "";
    if(isset($_REQUEST["codconteudo"])){
        $and = " and codconteudo = '{$_REQUEST["codconteudo"]}'";
    }
    $conteudo2 = $conexao->comandoArray("select * from conteudo where 1 = 1 {$and}");

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
        <meta name="description" content="<?=$conteudo2["descricao"]?>"/>
        <meta name="keywords" content="<?=$conteudo2["palavrachave"]?>"/>            
        <title>
            Escritório de Advocacia | <?=$site["nome"]?>        
        </title>
        <style>
            ul{
                list-style: initial !important;
            }
        </style>
        <?php include("scripts.php");?>
    </head>
    <body class="none">
        <div class="geral">
            <?php include("header.php");?>
            <div style="background: white; width: 100%">
            <div class="cont">
                    <h2 style="padding: 25px;font-size: 20px;"><?=$conteudo2["nome"]?></h2>
                    <?php
                    echo $conteudo2["texto"];
                    ?>
            </div>
                            
            </div>
        </div>
        </div>
            <div class="clear"></div>
        <div class="clear"></div>
        <?php include("footer.php");?>
    </body>
</html>
