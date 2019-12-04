<?php
include("../model/Conexao.php");
$conexao = new Conexao();
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
            Trabalhe conosco - Escritório de Advocacia | <?= $site["nome"] ?>    
        </title>
        <link rel="stylesheet" type="text/css" href="/visao/css/interna.css" />
        <?php include("scripts.php"); ?>
    </head>
    <body class="none">
        <div class="geral">
            <?php include("header.php"); ?>
            <div class="cont">
                <div class="tilt">
                    <h1><span>TRABALHE CONOSCO</span></h1>
                </div>
                <div class="wrap none">
                    <div class="left-contato">
                        <h2>Envio de Currículo</h2>
                        <p>Prezado usuário, preencha os dados abaixo para enviar seu currículo.</p>
                        <form enctype="multipart/form-data" method="post" action="../control/enviaEmailTrabalhe.php">
                            <div class="input text required">
                                <label for="nome">Nome</label>
                                <input name="nome" type="text" required maxlength="90" value="" id="nome"/>
                            </div>            
                            <div class="input text required">
                                <label for="email">E-mail</label>
                                <input name="email" type="email" required maxlength="90" value="" id="email"/>
                            </div>           
                            <div class="input text required">
                                <label for="telefone">Telefone</label>
                                <input name="telefone" type="text" class="phone" maxlength="45" value="" id="TrabalheConoscoTel"/>
                            </div>            
                            <div class="input select required">
                                <label for="cargo">Cargo</label>
                                <select name="cargo" id="cargo">
                                    <option value="">Escolha</option>
                                    <option value="46">Advogado</option>
                                    <option value="47">Estagiário</option>
                                    <option value="66">Paralegal</option>
                                    <option value="67">Administrativo</option>
                                    <option value="68">Financeiro</option>
                                    <option value="69">Marketing</option>
                                    <option value="70">Recursos Humanos</option>
                                </select>
                            </div>
                            <div class="input file">
                                <label for="arquivo">Anexar Currículo</label>
                                <input type="file" name="arquivo" required id="arquivo"/>
                            </div>            

                            <div class="input textarea">
                                <label for="mensagem">Mensagem</label>
                                <textarea name="mensagem" cols="30" rows="6" id="mensagem"></textarea>
                            </div>      
                            <div>
                                <input type="submit" value="ENVIAR" class="bt">
                            </div>
                        </form>    
                    </div>

                    <div class="claer"></div>
                </div>            
            </div>
            <div class="clear"></div>
        </div>
        <div class="clear"></div>
        <?php include("footer.php"); ?>
    </body>
</html>
