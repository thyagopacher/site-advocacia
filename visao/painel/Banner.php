<?php 
session_start();
include("../../model/Conexao.php");
$conexao = new Conexao();
$site = $conexao->comandoArray("select * from site");
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
        <script type="text/javascript" src="../js/ajax/Banner.js"></script>      
        <title>Banner - Painel Administrativo <?=$site["nome"]?></title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fbanner" method="post" action="../../control/InserirBanner.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Cadastro de banner</legend>     
                <input type="hidden" name="codbanner" id="codbanner" value=""/>
                <p>
                    <label>Descrição</label>
                    <input type="text" required name="descricao" id="descricao" size="100"/>
                </p>
                <p>
                    <label>Imagem</label>
                    <input type="file" title="Tamanho perfeito em 124 X 86" required name="imagem" size="50" maxlength="50"/>
                </p>
                <p>
                    <label>Link</label>
                    <input type="url" name="link" id="link" size="50" placeholder="Se quer que a imagem fica com link, digite aqui!" value=""/>
                </p>            
                <p>
                    <input type="submit" name="btinserir" id="btinserir" value="Inserir"/>
                </p>
            </fieldset>
        </form>
    </body>
</html>
