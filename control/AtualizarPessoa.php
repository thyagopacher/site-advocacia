<?php
    include "../model/Conexao.php";
    include "../model/Pessoa.php";
    $pessoa = new Pessoa();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $variables = (strtolower($_SERVER["REQUEST_METHOD"]) == "GET") ? $_GET : $_POST;
    foreach($variables as $key => $value){
        $pessoa->$key = $value;
    }    
    if($pessoa->codnivel == NULL || $pessoa->codnivel == "" || $pessoa->codnivel == 0){
        $pessoa2          = $pessoa->procuraCodigo($pessoa->codpessoa, $conexao);
        $pessoa->codnivel = $pessoa2->codnivel;
    }
    
    $res = $pessoa->atualizar($pessoa, $conexao);
    
    if($res === FALSE){
        echo "Erro ao atualizar pessoa! Causado por:". mysql_error();
    }else{
        echo "Pessoa atualizado com sucesso!";
    }