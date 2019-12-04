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
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="../js/Endereco.js"></script>
        <script type="text/javascript" src="../js/ajax/Site.js"></script>
        <title>Site - Painel Administrativo Advocacia</title>
    </head>
    <body>
        <?php
        include 'menu.php'; 
        ?>
        <form id="fsite" style="position: relative" method="post" enctype="multipart/form-data" action="../../control/AtualizarSite.php">
            <fieldset>
                <legend>Cadastro de site</legend>     
                <input type="hidden" name="codsite" value="<?=$site["codsite"]?>"/>
                <p>
                    <label>Nome</label>
                    <input type="text" required name="nome" size="50" maxlength="50" value="<?=$site["nome"]?>"/>
                </p>
                <p>
                    <label>Descrição</label>
                    <textarea name="descricao" cols="80" rows="5" placeholder="digite a descrição da sua empresa aqui"><?=$site["descricao"]?></textarea>
                </p>     
                <p>
                    <label>Palavra chave</label>
                    <textarea name="palavrachave" cols="80" rows="5" placeholder="digite a palavra chave da sua empresa aqui"><?=$site["palavrachave"]?></textarea>
                </p>  
                <p>
                    <label>E-mail</label>
                    <input type="email" required name="email" size="50" maxlength="200" value="<?=$site["email"]?>"/>
                </p>                
                <p>
                    <label>Telefone Fixo</label>
                    <input class="inline" type="text" required name="telefone" size="10" maxlength="10" value="<?=$site["telefone"]?>"/>
                    <label>Celular</label>
                    <input class="inline" type="text" required name="telefone2" size="10" maxlength="10" value="<?=$site["telefone2"]?>"/>
                </p>
                <p>
                    <label>CEP</label>
                    <input class="inline" type="text" required name="cep" id="cep" onblur="getEndereco();" size="8" maxlength="8" value="<?=$site["cep"]?>"/>
                </p>   
                <p>
                    <label>Tipo Log</label>
                    <input type="text" required name="tipologradouro" id="tipologradouro" size="50" maxlength="50" value="<?=$site["tipologradouro"]?>"/>
                </p>                 
                <p>
                    <label>Logradouro</label>
                    <input type="text" required name="logradouro" id="logradouro" size="50" maxlength="50" value="<?=$site["logradouro"]?>"/>
                </p>    
                <p>
                    <label>Número</label>
                    <input type="text" required name="numero" id="numero" size="5" maxlength="5" value="<?=$site["numero"]?>"/>
                </p>    
                <p>
                    <label>Edifício</label>
                    <input type="text" name="edificio" id="edificio" size="50" maxlength="250" value="<?=$site["edificio"]?>"/>
                </p>    
                <p>
                    <label>Andar</label>
                    <input type="text" name="andar" id="andar" size="5" maxlength="5" value="<?=$site["andar"]?>"/>
                </p>    
                <p>
                    <label>Sala</label>
                    <input type="text" name="sala" id="sala" size="5" maxlength="5" value="<?=$site["sala"]?>"/>
                </p>    
                <p>
                    <label>Bairro</label>
                    <input type="text" required name="bairro" id="bairro" size="50" maxlength="50" value="<?=$site["bairro"]?>"/>
                </p>    
                <p>
                    <label>Cidade</label>
                    <input type="text" required name="cidade" id="cidade" size="50" maxlength="50" value="<?=$site["cidade"]?>"/>
                </p>            
                <p>
                    <label>Estado</label>
                    <input type="text" required name="estado" id="estado" size="50" maxlength="50" value="<?=$site["estado"]?>"/>
                </p>                        
                <p>
                    <label>Skype</label>
                    <input type="text" name="skype" id="skype" size="50" maxlength="50" value="<?=$site["skype"]?>"/>
                </p>                        
                <p>
                    <label>Facebook</label>
                    <input type="url" name="facebook" id="facebook" size="50" maxlength="250" value="<?=$site["facebook"]?>"/>
                </p>                        
                <p>
                    <label>Google+</label>
                    <input type="url" name="googlemais" id="googlemais" size="50" maxlength="250" value="<?=$site["googlemais"]?>"/>
                </p>                        
                <p>
                    <label>Twitter</label>
                    <input type="url" name="twitter" id="twitter" size="50" maxlength="250" value="<?=$site["twitter"]?>"/>
                </p>                        
                <p>
                    <label>Qtd noticia</label>
                    <input type="text" required title="Quantidade de noticias na página inicial" name="qtdnoticia" id="qtdnoticia" size="5" maxlength="3" value="<?=$site["qtdnoticia"]?>"/>
                </p> 
                <p>
                    <label>Qtd página</label>
                    <input type="text" required title="Quantidade de resultados por página nas pesquisas" name="qtdpagina" id="qtdpagina" size="5" maxlength="3" value="<?=$site["qtdpagina"]?>"/>
                </p> 
                <p>
                    <label>Logo</label>
                    <input type="file" name="logo" accept="image/png"/>
                </p>
                <p>
                    <?php if(!isset($site)){?>
                    <input type="button" name="btinserir" value="Inserir" onclick="inserir()"/>
                    <?php }else{?>
                    <input type="submit" name="btatualizar" value="Atualizar"/>
                    <input type="button" name="btexcluir" value="Excluir" onclick="excluir()"/>
                    <?php }?>
                </p>
            </fieldset>
        </form>
    </body>
</html>
