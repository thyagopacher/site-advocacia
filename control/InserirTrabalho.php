<?php
    include "../model/Conexao.php";
    include "../model/Trabalho.php";
    $trabalho = new Trabalho();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $variables = (strtolower($_SERVER["REQUEST_METHOD"]) == "GET") ? $_GET : $_POST;
    foreach($variables as $key => $value){
        $trabalho->$key = $value;
    }    
    if(!isset($trabalho->data) || $trabalho->data == NULL || $trabalho->data == ""){
        $trabalho->data = date("Ymd");
    }
    $res = $trabalho->inserir($trabalho, $conexao);
    if($res === FALSE){
        echo "Erro ao inserir trabalho!";
    }else{
        echo "Trabalho inserido com sucesso!";
    }