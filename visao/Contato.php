<?php
include("../model/Conexao.php");
$conexao = new Conexao();
$conexao->conectar();
$site = $conexao->comandoArray("select * from site");

function mascara_string($string, $mascara = "(##)####-####") {
    $string = str_replace(" ", "", $string);
    for ($i = 0; $i < strlen($string); $i++) {
        $mascara[strpos($mascara, "#")] = $string[$i];
    }
    return $mascara;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<!-- saved from url=(0030)http://www.pgadvogados.com.br/ -->
<html xmlns="http://www.w3.org/1999/xhtml"><head>

        <title>
            Contato - Escritório de Advocacia | <?= $site["nome"] ?>  
        </title>
        <link rel="stylesheet" type="text/css" href="/visao/css/interna.css" />
        <?php include("scripts.php"); ?>
        <script src="/visao/js/ajax/EnviaContato.js" type="text/javascript"></script>
    </head>
    <body class="none">
        <div class="geral">
            <?php 
            include_once("header.php"); 
            ?>
            <div class="cont">
                <div class="tilt">
                    <h1><span>CONTATO</span></h1>
                </div>
                <div class="wrap none">
                    <div class="left-contato">

                        <address>
                            <span>Bairro: <?= $site["bairro"] ?></span></br>
                            <?php
                            if (isset($site["tipologradouro"]) && !empty($site["tipologradouro"])) {
                                echo ucfirst($site["tipologradouro"]);
                            }
                            echo ' ', strtoupper($site["logradouro"]), ', ', $site["numero"], ' - ', $site["bairro"], '<br>';
                            if (isset($site["edificio"]) && !empty($site["edificio"])) {
                                echo 'Edificio: ', $site["edificio"];
                            }
                            if (isset($site["andar"]) && !empty($site["andar"])) {
                                echo ' | ', $site["andar"], '° andar';
                            }
                            if (isset($site["sala"]) && !empty($site["sala"])) {
                                echo ' | sala ', $site["sala"];
                            }
                            if (isset($site["cidade"]) && !empty($site["cidade"])) {
                                echo ' | ', strtoupper($site["cidade"]);
                            }
                            if (isset($site["estado"]) && !empty($site["estado"])) {
                                echo ' | ', strtoupper($site["estado"]), '<br>';
                            }
                            echo 'CEP: ', mascara_string($site["cep"] , "#####-###");
                            ?>
                            </br>
                            <b>Telefone:</b> 
                            <a href="tel: +55<?= $site["telefone"] ?>"><?= mascara_string($site["telefone"]) ?></a></br>
                            <?php if (isset($site["telefone2"]) && !empty($site["telefone2"])) { ?>
                                <b>Celular:</b> 
                                <a href="tel: +55<?= $site["telefone2"] ?>"> <?= mascara_string($site["telefone2"]) ?></a></br>
                            <?php } ?>
                            <b>E-mail:</b> 
                            <a href="mailto:<?= $site["email"] ?>"><?= $site["email"] ?></a>
                        </address>
                        <form id="contact_form" method="post" action="" onsubmit="return false;">
                            <div class="input text required">
                                <label for="nome">Nome</label>
                                <input name="nome" type="text" maxlength="90" value="" required id="nome"/>
                            </div>
                            <div class="input text required"><label for="ContatoEmail">E-mail</label>
                                <input name="email" type="email" maxlength="90" value="" required id="email"/>
                            </div>
                            <div class="input text required">
                                <label for="ContatoTel">Telefone</label>
                                <input name="telefone" type="text" required placeholder="Número de telefone" class="phone" maxlength="15" value="" id="telefone"/>
                            </div>            
                            <div class="input select">
                                <label for="tipo">Tipo</label>
                                <select required name="tipo" id="tipo">
                                    <option value="">Escolha</option>
                                    <option>Pessoal</option>
                                    <option>Cliente</option>
                                </select>
                            </div>
                            <div class="input textarea required">
                                <label for="mensagem">Mensagem</label>
                                <textarea name="mensagem" cols="30" rows="6" required id="mensagem"></textarea>
                            </div>
                            <div>
                                <button class="bt" onclick="enviar()">Enviar</button>
                            </div>
                        </form>    
                    </div>
                    <div class="right-contato">
                        <h2>Localização</h2>
                        <div class="mapa">
                            <span class="mapa_mask_top">&nbsp;</span>
                            <span class="mapa_mask_bottom">&nbsp;</span>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3613.193104381934!2d-50.158208!3d-25.095323799999992!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94e81a4138383321%3A0x2cd75d694bad5847!2sR.+Sete+de+Setembro%2C+800+-+Centro%2C+Ponta+Grossa+-+PR%2C+84010-350!5e0!3m2!1spt-BR!2sbr!4v1408405987402" width="600" height="450" frameborder="0" style="border:0"></iframe>                            <a href="http://maps.google.com.br/maps?f=q&amp;source=embed&amp;hl=pt-BR&amp;q=<?= $site["logradouro"] ?>,+<?= $site["numero"] ?>+-+<?= $site["bairro"] ?>,+<?= $site["cidade"] ?>+-+<?= $site["cidade"] ?>,+<?= $site["cep"] ?>&amp;aq=&amp;sspn=0.012788,0.026157&amp;ie=UTF8&amp;geocode=Fd1dmf4dwig1_Q&amp;split=0&amp;hq=&amp;hnear=<?= $site["logradouro"] ?>,+<?= $site["numero"] ?>+-+<?= $site["bairro"] ?>,+<?= $site["cidade"] ?>+-+<?= $site["cidade"] ?>,+<?= $site["cep"] ?>&amp;spn=0.027548,0.035877&amp;z=14&amp;iwloc=A" style="color:#0000FF;text-align:left" target="blank">
                                <img src="/visao/img/lupa.gif" alt="lupa">
                            </a></small>
                        </div>
                    </div>


                    <div class="clear"></div>
                </div>
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <?php include("footer.php"); ?>
    </body>
</html>
