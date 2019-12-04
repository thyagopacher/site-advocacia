<?php
    include "../model/Conexao.php";
    include "../model/ObservacaoTrabalho.php";
    $observacao_trabalho = new ObservacaoTrabalho();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $variables = (strtolower($_SERVER["REQUEST_METHOD"]) == "GET") ? $_GET : $_POST;
    foreach($variables as $key => $value){
        $observacao_trabalho->$key = $value;
    }    
    
    $res = $observacao_trabalho->atualizar($observacao_trabalho, $conexao);
    
    if($res === FALSE){
        echo "Erro ao atualizar observação trabalho! Causado por:". mysql_error();
    }else{
        echo "Observação Trabalho atualizado com sucesso!";
    }