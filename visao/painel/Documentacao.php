<?php 
ob_start();
session_start();
if(isset($_GET["coddocumentacao"])){
    include("../../model/Conexao.php");
    $conexao = new Conexao();
    $conexao->conectar();
    $resdocumentacao = $conexao->comando("select * from documentacao where coddocumentacao = '{$_GET["coddocumentacao"]}'");
    $documentacao    = mysql_fetch_array($resdocumentacao);
}else{
    if($_SESSION["codnivel"] == 2){
        $documentacao["codcliente"] = $_SESSION["codpessoa"];
    }
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
        <title>Documentação - Painel Administrativo Advocacia</title>        
        <script type="text/javascript" src="../js/ajax/Documentacao.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fdocumentacao" method="post"  name="fdocumentacao" action="../../control/InserirDocumentacao.php" enctype="multipart/form-data">
            <fieldset>
                <legend>Cadastro de documentação</legend>            
                <input type="hidden" name="codcliente" id="codcliente" value="<?=$documentacao["codcliente"]?>"/>
                <input type="hidden" name="coddocumentacao" id="coddocumentacao" value="<?=$documentacao["coddocumentacao"]?>"/>
                <p>
                    <label>Nome</label>
                    <input type="text" required name="nome" value="<?=$documentacao["nome"]?>" required title="Nome por qual vai ser identificado no sistema" id="nome" size="50" maxlength="50"/>
                </p>                                       
                <p>
                    <label>Arquivo</label>
                    <input type="file" name="arquivo" required id="arquivo"/>
                </p>                     
                <p>
                    <label>Observação</label>
                    <textarea name="observacao" id="observacao" class="textarea" cols="80" rows="10" required placeholder="Digite aqui observações da sua documentação"><?=$documentacao["observacao"]?></textarea>
                </p>                     
                <p>
                    <?php if(!isset($_GET["coddocumentacao"])){?>
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
