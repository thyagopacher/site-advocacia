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
    
    $res = $trabalho->atualizar($trabalho, $conexao);
    
    if($res === FALSE){
        echo "Erro ao atualizar trabalho! Causado por:". mysql_error();
    }else{
        echo "Trabalho atualizado com sucesso!";
    }