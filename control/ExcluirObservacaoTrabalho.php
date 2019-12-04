<?php
    include "../model/Conexao.php";
    include "../model/ObservacaoTrabalho.php";
    $observacao_trabalho = new ObservacaoTrabalho();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $res = $observacao_trabalho->excluir($_POST["codobservacao_trabalho"], $conexao);
    
    if($res === FALSE){
        echo "Erro ao excluir observação trabalho!";
    }else{
        echo "Observação Trabalho excluido com sucesso!";
    }