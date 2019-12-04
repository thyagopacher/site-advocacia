<?php 
ob_start();
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
        <title>Procurar Notícia - Painel Administrativo <?=$site["nome"]?></title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/ajax/ProcurarConteudo.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fconteudo" name="fconteudo">
            <fieldset>
                <legend>Procura de notícias</legend>    
                <input type="hidden" name="codcategoria" id="codcategoria" value="10"/>
                <p>
                    <label>Nome</label>
                    <input type="search" required name="nome" id="nome" size="50" maxlength="50" value=""/>
                </p>                                     
                <p>
                    <input type="button" name="btprocurar" id="btprocurar" value="Procurar" onclick="procurar()"/>
                </p>
            </fieldset>    
        </form>
        <div id="listagem"></div>
    </body>
</html>
