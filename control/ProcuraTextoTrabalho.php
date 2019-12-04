<?php
    include "../model/Conexao.php";
    include "../model/Trabalho.php";
    $trabalho = new Trabalho();
    $conexao = new Conexao();
    $conexao->conectar();    
    
    $trabalho = $trabalho->procuraCodigo($_POST["codtrabalho"], $conexao);
    echo $trabalho->texto;

