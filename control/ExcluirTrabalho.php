<?php
    include "../model/Conexao.php";
    include "../model/Trabalho.php";
    $trabalho = new Trabalho();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $res = $trabalho->excluir($_POST["codtrabalho"], $conexao);
    
    if($res === FALSE){
        echo "Erro ao excluir trabalho!";
    }else{
        echo "Trabalho excluido com sucesso!";
    }