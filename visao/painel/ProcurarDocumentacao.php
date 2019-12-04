<?php 
ob_start();
session_start();
if($_SESSION["codnivel"] == 2){
    $codcliente = $_SESSION["codpessoa"];
}
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
        <title>Procurar Documentação - Painel Administrativo <?=$site["nome"]?></title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/ajax/ProcurarDocumentacao.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fdocumentacao" name="fdocumentacao">
            <fieldset>
                <legend>Procura de documentação</legend>      
                <input type="hidden" name="codcliente" id="codcliente" value="<?=$codcliente?>"/>
                <p>
                    <label>Nome</label>
                    <input type="search" required name="nome" id="nome" size="50" maxlength="50" value=""/>
                </p>                                     
                <p>
                    <label>Data inicio</label>
                    <input type="date" required name="dtinicio" id="dtinicio"/>
                </p>                                     
                <p>
                    <label>Data fim</label>
                    <input type="date" required name="dtfim" id="dtfim"/>
                </p>                                     
                <p>
                    <input type="button" name="btprocurar" id="btprocurar" value="Procurar" onclick="procurar()"/>
                </p>
            </fieldset>    
        </form>
        <div id="listagem" style="margin-top: 260px; position: fixed;"></div>
    </body>
</html>
