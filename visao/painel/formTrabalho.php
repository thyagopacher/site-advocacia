        <form id="ftrabalho" name="ftrabalho">
            <fieldset>
                <legend>Cadastro de trabalhos</legend>            
                <input type="hidden" name="codtrabalho" id="codtrabalho" value="<?=$trabalho["codtrabalho"]?>"/>
                <input type="hidden" name="data" id="data" value="<?=$trabalho["data"]?>"/>
                <p>
                    <label>Cliente</label>
                    <select name="codcliente" id="codcliente">
                        <?php
                        if(mysql_num_rows($rescliente) > 0){
                            while($cliente = mysql_fetch_array($rescliente)){
                                echo '<option value=',$cliente["codpessoa"],'>',$cliente["nome"],'</option>';
                            }
                        }else{
                            echo "<option>Nada encontrado</option>";
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label>Nome</label>
                    <input type="text" required name="nome" id="nome" size="50" maxlength="50" value="<?=$trabalho["nome"]?>"/>
                </p>                                                             
                <p>
                    <label>Texto</label>
                    <textarea name="texto" id="texto" cols="80" rows="10" required placeholder="Digite aqui o texto do seu trabalho"><?=$trabalho["texto"]?></textarea>
                </p>                     
                <p>
                    <?php if(!isset($_GET["codtrabalho"])){?>
                    <input type="button" name="btinserir" id="btinserir" value="Inserir" onclick="inserirTrabalho();"/>
                    <?php }else{?>
                    <input type="button" name="btatualizar" id="btatualizar" value="Atualizar" onclick="atualizarTrabalho();"/>
                    <input type="button" name="btexcluir" id="btexcluir" value="Excluir" onclick="excluirTrabalho()"/>
                    <?php }?>
                </p>
            </fieldset>    
        </form>