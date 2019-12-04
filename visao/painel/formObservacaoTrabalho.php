        <form id="fobservacao" name="fobservacao">
            <fieldset>
                <legend>Cadastro de observação-trabalho</legend>            
                <input type="hidden" name="codobservacao" id="codobservacao" value="<?=$observacao["codobservacao"]?>"/>
                <input type="hidden" name="codtrabalho" id="codtrabalho2" value="<?=$observacao["codtrabalho"]?>"/>
                <p>
                    <label>Nome</label>
                    <input type="text" required name="nome" id="nome2" size="50" maxlength="50" value="<?=$observacao["nome"]?>"/>
                </p>                                                             
                <p>
                    <label>Texto</label>
                    <textarea name="texto" id="texto2" cols="80" rows="10" required placeholder="Digite aqui o texto do seu observacao"><?=$observacao["texto"]?></textarea>
                </p>                     
                <p>
                    <?php if(!isset($_GET["codobservacao"])){?>
                    <input type="button" name="btinserir" id="btinserir2" value="Inserir" onclick="inserir();"/>
                    <div id="outrosbt" style="visibility: hidden">
                        <input type="button" name="btatualizar" id="btatualizar2" value="Atualizar" onclick="atualizar();"/>
                        <input type="button" name="btexcluir" id="btexcluir2" value="Excluir" onclick="excluir()"/>       
                        <input type="button" name="btnovo" id="btnovo2" value="Novo" title="Limpar informações e pedir novo cadastro" onclick="novo()"/>       
                    </div>
                    <?php }?>
                </p>
            </fieldset>    
        </form>
<?php
    if($qtdobservacao > 0){
        echo "<ul>";
        while($observacao2 = mysql_fetch_array($resobservacao)){
            echo "<li>";
            ?>
            <a style="color: white" title="Clique aqui para editar" href="javascript:setaObservacao('<?=$observacao2["nome"]?>', '<?=$observacao2["texto"]?>', <?=$observacao2["codobservacao"]?>, <?=$observacao2["codtrabalho"]?>)">
            <?php
            echo $observacao2["data2"] . " - " . $observacao2["nome"];
            echo "</a>";
            echo "</li>";
        }
        echo "</ul>";
    }else{
        echo "Nada encontrado de observações adicionais!";
    }
?>