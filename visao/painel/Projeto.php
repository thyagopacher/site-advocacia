<?php 
ob_start();
session_start();
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
        <title>Projetos - Painel Administrativo Advocacia</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/ajax/Projeto.js"></script>
        <script type="text/javascript" src="../js/ajax/ImagemTrabalho.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fprojeto" name="fprojeto">
            <fieldset>
                <legend>Cadastro de projetos</legend>            
                <input type="hidden" name="codTrabalho" id="codTrabalho" value=""/>
                <p>
                    <label>Categoria</label>
                    <select name="codcategoria" id="codcategoria" required>
                    </select>
                </p>
                <p>
                    <label>Nome</label>
                    <input type="text" required name="nome" id="nome" size="50" maxlength="50"/>
                </p>                     
                <p>
                    <input type="button" name="btinserir" id="btinserir" value="Inserir" onclick="inserir();"/>
                    <input type="button" name="btatualizar" id="btatualizar" value="Atualizar" onclick="atualizar();"/>
                    <input type="button" name="btexcluir" id="btexcluir" value="Excluir" onclick="excluirProjeto()"/>
                </p>
            </fieldset>    
        </form>

        <div id="listagem"></div>
    </body>
</html>
