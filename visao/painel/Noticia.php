<?php 
ob_start();
session_start();
include("../../model/Conexao.php");
$conexao = new Conexao();
$conexao->conectar();
if(isset($_GET["codconteudo"])){
    $resconteudo = $conexao->comando("select * from conteudo where codconteudo = '{$_GET["codconteudo"]}' and codcategoria = '10'");
    $conteudo    = mysql_fetch_array($resconteudo);
}
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include "header.php"?>
        <title>Notícia - Painel Administrativo Advocacia</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/ajax/Conteudo.js"></script>
        <script type="text/javascript" src="../js/tinymce/tinymce.min.js"></script>
        <script>
                tinymce.init({
                selector: '.texto',
                language: "pt",
                plugins: [
                    "advlist autolink autosave link image lists charmap print preview hr anchor pagebreak spellchecker",
                    "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                    "table contextmenu directionality emoticons template textcolor paste fullpage textcolor colorpicker textpattern"
                ],
                toolbar1: "newdocument fullpage | bold italic underline strikethrough | alignleft aligncenter alignright alignjustify | styleselect formatselect fontselect fontsizeselect",
                toolbar2: "cut copy paste | searchreplace | bullist numlist | outdent indent blockquote | undo redo | link unlink anchor image media code | insertdatetime preview | forecolor backcolor",
                toolbar3: "table | hr removeformat | subscript superscript | charmap emoticons | print fullscreen | ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft",
                menubar: false,
                toolbar_items_size: 'small',
                style_formats: [
                    {title: 'Bold text', inline: 'b'},
                    {title: 'Red text', inline: 'span', styles: {color: '#ff0000'}},
                    {title: 'Red header', block: 'h1', styles: {color: '#ff0000'}},
                    {title: 'Example 1', inline: 'span', classes: 'example1'},
                    {title: 'Example 2', inline: 'span', classes: 'example2'},
                    {title: 'Table styles'},
                    {title: 'Table row 1', selector: 'tr', classes: 'tablerow1'}
                ],
                templates: [
                    {title: 'Test template 1', content: 'Test 1'},
                    {title: 'Test template 2', content: 'Test 2'}
                ],
                language_url : '../js/tinymce/langs/pt_BR.js'
                });
        </script>        
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fconteudo" action="../../control/InserirNoticia.php" method="post" name="fconteudo">
            <fieldset>
                <legend>Cadastro de notícias</legend>
                <input type="hidden" name="codcategoria" id="codcategoria" value="10"/>
                <input type="hidden" name="codconteudo" id="codconteudo" value="<?=$conteudo["codconteudo"]?>"/>
                <p>
                    <label>Nome</label>
                    <input type="text" required name="nome" id="nome" value="<?=$conteudo["nome"]?>" size="50" maxlength="50" placeholder="Digite o nome da página aqui"/>
                </p>
                <p>
                    <label>Texto</label>
                    <textarea cols="80" rows="10" name="texto" class="texto" id="texto" required placeholder="Digite o conteúdo aqui...">
                        <?=$conteudo["texto"]?>
                    </textarea>
                </p> 
                <p>
                    <label>Descrição</label>
                    <textarea name="descricao" cols="80" rows="5" id="descricao" required title="Descreve noticia nas pesquisas do google"><?=$conteudo["descricao"]?></textarea>
                </p>
                <p>
                    <label>Palavra chave</label>
                    <textarea name="palavrachave" cols="80" rows="5" id="palavrachave" required title="Palavra chave nas pesquisas do google"><?=$conteudo["palavrachave"]?></textarea>
                </p>
                <p>
                    <?php if(!isset($conteudo["nome"])){?>
                    <input type="submit" name="btinserir" id="btinserir" value="Inserir"/>
                    <?php }else{?>
                    <input type="button" name="btatualizar" id="btatualizar" value="Atualizar" onclick="atualizar();"/>
                    <input type="button" name="btexcluir" id="btexcluir" value="Excluir" onclick="excluir()"/>
                    <?php }?>
                </p>
            </fieldset>
        </form>
    </body>
</html>
