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
        <title>Procurar Trabalho - Painel Administrativo Advocacia</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/ajax/ProcurarTrabalho.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="ftrabalho" name="ftrabalho">
            <fieldset>
                <legend>Procura de trabalhos</legend>            
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
