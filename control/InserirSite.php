<?php
    include "../model/Conexao.php";
    include "../model/Site.php";
    $site = new Site();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $variables = (strtolower($_SERVER["REQUEST_METHOD"]) == "GET") ? $_GET : $_POST;
    foreach($variables as $key => $value){
        $site->$key = $value;
    }    
    
    $res = $site->inserir($site, $conexao);
    
    if($res === FALSE){
        echo "Erro ao inserir site!";
    }else{
        echo "Site inserido com sucesso!";
    }