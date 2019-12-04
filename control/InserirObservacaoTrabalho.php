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
    if(!isset($observacao_trabalho->data) || $observacao_trabalho->data == NULL || $observacao_trabalho->data == ""){
        $observacao_trabalho->data = date("Ymd");
    }
    $res = $observacao_trabalho->inserir($observacao_trabalho, $conexao);
    if($res === FALSE){
        echo "Erro ao inserir observação trabalho! Causado por:". mysql_error();
    }else{
        echo "Observação Trabalho inserido com sucesso!";
    }