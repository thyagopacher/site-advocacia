<?php
    $link = "http://ronaldarruda.com.br/visao/"; 
    function preparaMenu($menu){
        return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',(strtolower(str_replace(" ", "-", $menu)))));
    }
?>
<div style="background: white; margin-left: -38%;width: 1538px;">
            <div class="header">
                <h1><a href="/" class="logo"><img width="300" height="75" alt="Logo do site <?=$site["nome"]?>" src="/visao/img/ronald.png"/></a></h1>
                <address style="width: 250px;float: left;margin-top: 30px;">
                    <b>Telefone:</b><a href="tel: +55<?= $site["telefone"] ?>"><?= mascara_string($site["telefone"]) ?></a></br>
                    <?php if (isset($site["telefone2"]) && !empty($site["telefone2"])) { ?>
                        <b>Celular:</b><a href="tel: +55<?= $site["telefone2"] ?>"> <?= mascara_string($site["telefone2"]) ?></a></br>
                    <?php } ?>
                    <b>E-mail:</b><a href="mailto:<?= $site["email"] ?>"><?= $site["email"] ?></a>                    
                </address>
                <div class="restrita bt-sub">
                    <a href="/#"><img src="/visao/img/area-restrita.jpg" alt="Area Restrita"></a>
                    <div class="submenu" style="display: none;">
                        <ul>
                            <li><a href="http://ronaldarruda.com.br/painel/" target="_blank">Clientes</a></li>
                            <li><a href="http://ronaldarruda.com.br/webmail/" target="_blank">Webmail</a></li>
                            <li><a href="http://ronaldarruda.com.br/painel/" target="_blank">Intranet</a></li>
                        </ul>
                    </div>
                </div>
                <ul class="ingles">
                    <li class="none">
                        <div id="google_translate_element"></div>
                        <script type="text/javascript">
            function googleTranslateElementInit() {
                new google.translate.TranslateElement({pageLanguage: 'pt', layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL}, 'google_translate_element');
            }
                        </script>
                        <script type="text/javascript" src="http://translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>     
                    </li>
                </ul>
            </div>
</div>
            <div class="menu">
                <ul>
                    <li class="escritori bt-sub">
                        <a href="#">Escritório <span style="font-size: 14px; font-weight: bolder">></span></a>
                        <div class="submenu" style="display: none;">
                            <a href="/apresentacao">Apresentação<br> e Histórico</a>
                            <a href="/missao">Missão, Visão<br> e Valores</a>
                        </div>
                    </li>
                    <li class="atuacao bt-sub">
                        <a href="#" class="">Áreas de atuação <span style="font-size: 14px; font-weight: bolder">></span></a>
                        <div class="submenu" style="display: none;">
                            <div class="border">
                                <?php
                                $sql = "select conteudo.nome, conteudo.codconteudo 
                                    from conteudo 
                                    where codcategoria = '6' order by nome";
                                $resconteudo = $conexao->comando($sql);
                                $qtdconteudo = mysql_num_rows($resconteudo);
                                if($qtdconteudo > 0){
                                    echo '<dl>';
                                    $contador = 0;
                                    while($conteudo = mysql_fetch_array($resconteudo)){
                                        echo '<dd><a class="sub-atuacao" href="/areas/',  preparaMenu($conteudo["nome"]),'/',$conteudo["codconteudo"],'">',$conteudo["nome"],'</a></dd>';
                                        $contador++;
                                        if($contador == 5){
                                            $contador = 0;
                                            echo '</dl><dl>';
                                        }                                        
                                    }
                                    echo '</dl>';
                                }else{
                                    echo "Nenhum conteúdo ainda para áreas de atuação";
                                }
                                ?>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </li>
                    <li class="profissionais bt-sub">
                        <a href="#">Profissionais <span style="font-size: 14px; font-weight: bolder">></span></a>
                        <div class="submenu" style="display: none;">
                            <a href="/socios">Sócios</a>
                            <a href="/associados">Associados</a>
                        </div>
                    </li> 
                    <li class="publicacoes bt-sub">
                        <a href="#">Publicações <span style="font-size: 14px; font-weight: bolder">></span></a>
                        <div class="submenu" style="display: none;">
                            <a href="/artigos">Artigos</a><br>
                            <a href="/pg_na_midia">PG na Mídia</a>
                            <a href="/noticias">Noticias</a> 
                        </div>
                    </li> 
                    <li class="social"><a href="/acao_social">Ação Social</a></li>
                    <li class="parcerias"><a href="/parcerias">Parcerias</a></li>
                    <li class="contato bt-sub">
                        <a href="#">Contato <span style="font-size: 14px; font-weight: bolder">></span></a>
                        <div class="submenu" style="display: none;"> 
                            <a href="/Contato">Ponta Grossa</a>
                            <a href="/TrabalheConosco">Trabalhe Conosco</a>
                        </div>
                    </li>
                </ul> 
            </div>  