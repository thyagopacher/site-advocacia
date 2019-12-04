<?php
include("../model/Conexao.php");
$conexao = new Conexao();
$site       = $conexao->comandoArray("select * from site");
$total_reg  = 10;
$pagina     = $_GET['pagina']; 
if (!$pagina) { 
    $pc = "1"; 
} else {
    $pc = $pagina; 
}
$inicio     = ($pc - 1) * $total_reg;
$sql        = "select conteudo.*, DATE_FORMAT(data, '%d . %m . %Y') as data2  from conteudo where codcategoria = 10 order by data desc, codconteudo desc";
$resnoticia = $conexao->comando($sql)or die(mysql_error());
$qtdnoticia = mysql_num_rows($resnoticia);

$limite     = mysql_query("$sql LIMIT $inicio,$total_reg");
$tp         = $qtdnoticia / $total_reg;
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
        <title>
            Escritório de Advocacia | <?= $site["nome"] ?>        
        </title>
        <?php include("scripts.php"); ?>
    </head>
    <body class="none">
        <div class="geral">
            <?php include("header.php"); ?>
            <div style="background: white; width: 100%">
                <div class="cont">
                    <?php 
                    if($qtdnoticia > 0){
                        echo "<h2 style='font-size: 20px;padding: 10px;'>Encontrou $qtdnoticia resultados</h2>";
                        echo "<ul style='list-style: initial;font-size: 15px;'>";
                        while($noticia = mysql_fetch_array($limite)){
                            echo "<li>";
                            echo "<a href='/noticia/{$noticia["codconteudo"]}'>";
                            echo $noticia["data2"] , " - " , $noticia["nome"];
                            echo "</a>";
                            echo "</li>";
                        }
                        echo "</ul>";
                    }else{
                        echo "Nada encontrado!";
                    }
                    // agora vamos criar os botões "Anterior e próximo" 
                    $anterior = $pc - 1; 
                    $proximo = $pc + 1; 
                    if ($pc > 1) { 
                        echo " <a href='?pagina=$anterior'><- Anterior</a> "; 
                    } 
                    if ($pc < $tp) { 
                        echo "|"; 
                        echo " <a href='?pagina=$proximo'>Próxima -></a>"; 
                    }
                    ?>
                </div>

            </div>
        </div>
        </div>
        <div class="clear"></div>
        <div class="clear"></div>
        <?php include("footer.php"); ?>
    </body>
</html>
