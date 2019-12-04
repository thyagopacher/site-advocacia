<div class="footer">
    <div class="inter">
        <p>© 2012 <?=$site["nome"]?>. Todos os direitos reservados</p>
        <div class="estado">
            <a style="color: #5b5b5b" title="Clique aqui para ver o endereço" href="http://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;q=<?= $site["logradouro"] ?>,+<?= $site["numero"] ?>+-+<?= $site["bairro"] ?>,+<?= $site["cidade"] ?>+-+<?= $site["cidade"] ?>,+<?= $site["cep"] ?>&amp;aq=&amp;sll=-23.532113,-46.526387&amp;sspn=0.012788,0.026157&amp;ie=UTF8&amp;geocode=Fd1dmf4dwig1_Q&amp;split=0&amp;hq=&amp;hnear=<?= $site["logradouro"] ?>,+<?= $site["numero"] ?>+-+<?= $site["bairro"] ?>,+<?= $site["cidade"] ?>+-+<?= $site["cidade"] ?>,+<?= $site["cep"] ?>&amp;spn=0.027548,0.035877&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left" target="blank">
                <address>
                    <?php 
                    if(isset($site["tipologradouro"]) && !empty($site["tipologradouro"])){
                        echo ucfirst($site["tipologradouro"]);
                    }
                    echo ' ', strtoupper($site["logradouro"]) ,', ',$site["numero"] , ' - ' , $site["bairro"],'<br>';
                    if(isset($site["edificio"]) && !empty($site["edificio"])){
                        echo 'Edificio: ', $site["edificio"];
                    }
                    if(isset($site["andar"]) && !empty($site["andar"])){
                        echo ' | ', $site["andar"], '° andar';
                    }
                    if(isset($site["sala"]) && !empty($site["sala"])){
                        echo ' | sala ', $site["sala"];
                    }
                    if(isset($site["cidade"]) && !empty($site["cidade"])){
                        echo ' | ', strtoupper($site["cidade"]);
                    }
                    if(isset($site["estado"]) && !empty($site["estado"])){
                        echo ' | ',strtoupper($site["estado"]) , '<br>';
                    }
                    echo 'CEP: ',$site["cep"];
                    ?> 
                </address>
            </a>
        </div>
        <a href="http://www.sitesesistemaspg.com/" target="_blank">Desenvolvido por Thyago Henrique Pacher</a>
    </div>
</div> 