                <h3>Trabalhos recentes</h3>
                <?php
                $restrabalho = $conexao->comando("select nome, link, tipo, imagem, descricao from trabalho order by rand() limit 4");
                $qtdtrabalho = mysql_num_rows($restrabalho);
                $linha       = 0;
                $adicinal    = "";
                if($qtdtrabalho > 0){
                    while($trabalho = mysql_fetch_array($restrabalho)){
                ?>
                <article class="col <?=$adicinal?>">
                    <?php if(isset($trabalho["imagem"]) && $trabalho["imagem"] != ""){ ?>
                    <a href="/visao/img/<?=$trabalho["tipo"]?>/<?=$trabalho["imagem"]?>" title="<?=$trabalho["nome"]?>" data-lightbox="image-1" data-title=Imagem de trabalho <?=$trabalho["nome"]?>">
                        <img width="240" height="100" alt="img" class="thumbnail" src="/visao/img/<?=$trabalho["tipo"]?>/<?=$trabalho["imagem"]?>" />
                    </a>
                    <?php }?>
                    <div class="top">
                        <h4><a href="<?=$trabalho["link"]?>"><?=$trabalho["nome"]?></a></h4>
                    </div>
                    <div class="content">
                        <p>
                            <?=$trabalho["descricao"]?>
                        </p>
                    </div>
                </article>
                <?php
                        if($linha == 1){
                            echo '<div class="fix"></div>';
                        }
                        if(($linha) % 2 == 0){
                            $adicinal = " even";
                        }else{
                            $adicinal = "";
                        }
                        $linha++;
                    }
                }
                ?>