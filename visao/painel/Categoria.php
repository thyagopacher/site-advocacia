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
        <?php 
        include "header.php";
        include "../../model/Conexao.php";
        $conexao = new Conexao();
        $conexao->conectar();
        if(isset($_GET["codcategoria"])){
            $rescategoria = $conexao->comando("select * from categoria where codcategoria = '{$_GET["codcategoria"]}'");
            $categoria    = mysql_fetch_array($rescategoria);
        }
        ?>
        <title>Categoria - Painel administração site</title>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/ajax/Categoria.js"></script>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <form id="fcategoria">
            <fieldset>
                <legend>Cadastro de categoria</legend>
                <input type="hidden" name="codcategoria" id="codcategoria" value="<?=$categoria["codcategoria"]?>"/>
                <p>
                    <label>Categoria mestre</label>
                    <select name="codmestre" title="Para categorias que ficam acima da cadastrada">
                        <?php
                        $rescategoriam = $conexao->comando("select codcategoria, nome from categoria order by nome");
                        $qtdcategoriam = mysql_num_rows($rescategoriam);
                        if($qtdcategoriam > 0){
                            echo '<option value="">Selecione</option>';
                            while($categoriam = mysql_fetch_array($rescategoriam)){
                                if(isset($categoria["codmestre"]) && $categoria["codmestre"] == $categoriam["codcategoria"]){
                                    echo '<option selected value="',$categoriam["codcategoria"],'">',$categoriam["nome"],'</option>';
                                }else{
                                    echo '<option value="',$categoriam["codcategoria"],'">',$categoriam["nome"],'</option>';
                                }
                            }
                        }else{
                            echo '<option value="">Nada encontrado</option>';
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label>Nome</label>
                    <input type="text" required name="nome" id="nome" value="<?=$categoria["nome"]?>" size="50" maxlength="50"/>
                </p>
                <p>
                    <input type="button" name="btinserir" id="btinserir" value="Inserir" onclick="inserir();"/>
                    <input type="button" name="btatualizar" id="btatualizar" value="Atualizar" onclick="atualizar();"/>
                    <input type="button" name="btexcluir" id="btexcluir" value="Excluir" onclick="excluir()"/>
                </p>
            </fieldset>
        </form>
        <div id="listagem" style="margin-top: 190px;"></div>
    </body>
</html>
