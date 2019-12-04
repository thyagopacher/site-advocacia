<?php
    include "../model/Conexao.php";
    include "../model/Pessoa.php";
    $pessoa = new Pessoa();
    $conexao = new Conexao();
    $conexao->conectar();
    $variables = (strtolower($_SERVER["REQUEST_METHOD"]) == "GET") ? $_GET : $_POST;
    foreach($variables as $key => $value){
        $pessoa->$key = $value;
    }    
    $res = $pessoa->inserir($pessoa, $conexao);

    if($res === FALSE){
        echo "Erro ao inserir pessoa!";
    }else{
        echo "Pessoa inserido com sucesso!";
    }