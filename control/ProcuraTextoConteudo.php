<?php
    include "../model/Conexao.php";
    include "../model/Conteudo.php";
    $conteudo = new Conteudo();
    $conexao = new Conexao();
    $conexao->conectar();    
    
    $conteudo = $conteudo->procuraCodigo($_POST["codconteudo"], $conexao);
    echo $conteudo->texto;

