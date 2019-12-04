<?php 
ob_start();
session_start();
if(isset($_GET["codslide"]) && $_GET["codslide"] != NULL && $_GET["codslide"] != ""){
    include("../../model/Conexao.php");
    $conexao = new Conexao();
    $slide   = $conexao->comandoArray("select * from slideshow where codslide = '{$_GET["codslide"]}'");    
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
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        <script type="text/javascript" src="../js/ajax/SlideShow.js"></script>      
        <title>Slide show - Painel Administrativo Advocacia</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fslide" method="post" action="../../control/InserirSlideShow.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Cadastro de slide</legend>     
                <input type="hidden" name="codslide" id="codslide" value=""/>
                <p>
                    <label>Imagem</label>
                    <input type="file" required name="imagem" title="Tamanho perfeito 560 X 235"/>
                </p>
                <div id="imagem2"></div>               
                <p>
                    <label>Link</label>
                    <input type="url" name="link" id="link" size="50" placeholder="Se quer que a imagem fica com link, digite aqui!" value=""/>
                </p>     
                <p>
                    <label>Descrição</label>
                    <textarea cols="80" rows="20" name="descricao" required id='descricao' placeholder="digite aqui a descrição da slide"></textarea>
                </p>          
                <p>
                    <input type="submit" name="btinserir" id="btinserir" value="Inserir"/>
                    <input type="button" name="btatualizar" id="btatualizar" value="Atualizar" onclick="atualizar()"/>
                    <input type="button" name="btexcluir" id="btexcluir" value="Excluir" onclick="excluir()"/>
                </p>
            </fieldset>
        </form>
    </body>
</html>
