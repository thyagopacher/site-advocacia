<?php 
ob_start();
session_start();
if(!isset($_SESSION["codpessoa"])){
    echo '<script>location.href="Login.php";</script>';
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
        <?php include "header.php" ?>
        <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
        <title>Inicio - Painel Administrativo</title>
    </head>
    <body>
        <?php
        include 'menu.php';
        ?>
        <div style="position: fixed">
            Seja bem vindo ao seu site, qualquer dúvida pode contatar meu suporte através de:<br>

            - E-mail: <a href="mailto:thyago.pacher@gmail.com">thyago.pacher@gmail.com</a> ou <a href="mailto:thyagopacher@bol.com.br">thyagopacher@bol.com.br</a><br>
            - Telefone: 42-32221365 ou 42-91046063 (vivo)<br>
            - Skype:
            <script type="text/javascript" src="http://www.skypeassets.com/i/scom/js/skype-uri.js"></script>
            <div id="SkypeButton_Call_thyago.pacher_1">
                <script type="text/javascript">
                    Skype.ui({
                        "name": "chat",
                        "element": "SkypeButton_Call_thyago.pacher_1",
                        "participants": ["thyago.pacher"],
                        "imgize": 32
                    });
                </script>
            </div>
            
            O editor de texto permite inserir videos do youtube, veja abaixo como pegar a codificação:<br>
            <a href="http://www.techtudo.com.br/dicas-e-tutoriais/noticia/2011/02/como-inserir-um-video-do-youtube-em-seu-site.html">
                Código video Youtube
            </a>
            <br>
        </div>
        <div id="listagem"></div>
    </body>
</html>
