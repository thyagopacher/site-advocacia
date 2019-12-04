<?php 
ob_start();
session_start();
if(isset($_GET["codpessoa"])){
    include("../../model/Conexao.php");
    $conexao   = new Conexao();
    $conexao->conectar();
    $respessoa = $conexao->comando("select * from pessoa where codpessoa = ". $_GET["codpessoa"]);
    $pessoa    = mysql_fetch_array($respessoa);
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
        <title>Pessoa - Painel Administrativo Advocacia</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/ajax/Pessoa.js"></script>
        <script type="text/javascript" src="../js/Endereco.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fpessoa" name="fpessoa">
            <fieldset>
                <legend>Cadastro de pessoas</legend>            
                <input type="hidden" name="codpessoa" id="codpessoa" value="<?=$pessoa["codpessoa"]?>"/>
                <p>
                    <label>Nome</label>
                    <input type="text" required name="nome" id="nome" size="50" maxlength="50" value="<?=$pessoa["nome"]?>"/>
                </p>                     
                <p>
                    <label>E-mail</label>
                    <input type="email" required name="email" id="email" size="50" maxlength="50" <?=$pessoa["email"]?>/>
                </p>                     
                <p>
                    <label>Senha</label>
                    <input type="password" required name="senha" id="senha" size="50" maxlength="50" <?=$pessoa["senha"]?>/>
                </p> 
                <p>
                    <label>CEP</label>
                    <input type="text" required name="cep" id="cep" onblur="getEndereco()" size="10" maxlength="8" value="<?=$pessoa["cep"]?>"/>
                </p>                  
                <p>
                    <label>Tipo Logradouro</label>
                    <input type="text" required name="tipologradouro" id="tipologradouro" size="20" maxlength="20" value="<?=$pessoa["tipologradouro"]?>"/>
                </p>                  
                <p>
                    <label>Logradouro</label>
                    <input type="text" required name="logradouro" id="logradouro" size="50" maxlength="50" value="<?=$pessoa["logradouro"]?>"/>
                </p>                  
                <p>
                    <label>Número</label>
                    <input type="text" required name="numero" id="numero" size="5" maxlength="5" value="<?=$pessoa["numero"]?>"/>
                </p>                  
                <p>
                    <label>Bairro</label>
                    <input type="text" required name="bairro" id="bairro" size="50" maxlength="50" value="<?=$pessoa["bairro"]?>"/>
                </p>                  
                <p>
                    <label>Cidade</label>
                    <input type="text" required name="cidade" id="cidade" size="50" maxlength="50" value="<?=$pessoa["cidade"]?>"/>
                </p>                  
                <p>
                    <label>Estado</label>
                    <input type="text" required name="estado" id="estado" size="10" maxlength="10" value="<?=$pessoa["estado"]?>"/>
                </p>                  
                <p>
                    <?php if(!isset($_GET["codpessoa"])){?>
                    <input type="button" name="btinserir" id="btinserir" value="Inserir" onclick="inserir();"/>
                    <?php }?>
                    <input type="button" name="btatualizar" id="btatualizar" value="Atualizar" onclick="atualizar();"/>
                    <input type="button" name="btexcluir" id="btexcluir" value="Excluir" onclick="excluir()"/>
                </p>
            </fieldset>    
        </form>
        <div id="listagem"></div>
    </body>
</html>
