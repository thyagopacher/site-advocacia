<?php
ob_start();
session_start();
include("../../model/Conexao.php");
$conexao = new Conexao();
$conexao->conectar();
$and = "";
if (isset($_GET["codtrabalho"])) {
    $restrabalho = $conexao->comando("select * from trabalho where codtrabalho = '{$_GET["codtrabalho"]}'");
    $trabalho    = mysql_fetch_array($restrabalho);
    $and         = " and codcliente = '{$trabalho["codcliente"]}'";
    
    $resobservacao = $conexao->comando("select observacao_trabalho.*, DATE_FORMAT(data, '%d . %m . %Y') as data2 from observacao_trabalho where codtrabalho = '{$_GET["codtrabalho"]}'");
    $qtdobservacao = mysql_num_rows($resobservacao);
}
$rescliente = $conexao->comando("select * from pessoa where codnivel = 2 {$and} order by nome");
?>
<html>
    <head>
        <?php include "header.php" ?>
        <title>Trabalhos - Painel Administrativo Advocacia</title>
        <link rel="stylesheet" href="../css/abas.css"/>    
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>                
        <script type="text/javascript" src="../js/ajax/Trabalho.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div class="TabControl"> 
            <div id="header"> 
                <ul class="abas"> 
                    <li> <div class="aba"> <span>Trabalho</span> </div> </li> 
                    <?php if(isset($_GET["codtrabalho"])){?>
                    <li> <div class="aba"> <span>Observação Trabalho</span> </div> </li> 
                    <?php }?>
                </ul> 
            </div> 
            <div id="content"> 
                <div class="conteudo"> <?php include("./formTrabalho.php"); ?></div> 
                <?php if(isset($_GET["codtrabalho"])){?>
                <div class="conteudo"> <?php include("./formObservacaoTrabalho.php");?></div> 
                <?php }?>
            </div> 
        </div>
    </body>
</html>
