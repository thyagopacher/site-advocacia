<?php
    include "../model/Conexao.php";
    include "../model/Categoria.php";
    $categoria = new Categoria();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $variables = (strtolower($_SERVER["REQUEST_METHOD"]) == "GET") ? $_GET : $_POST;
    foreach($variables as $key => $value){
        $categoria->$key = $value;
    }    
    
    $res = $categoria->atualizar($categoria, $conexao);
    
    if($res === FALSE){
        echo "Erro ao atualizar categoria!";
    }else{
        echo "Categoria atualizada com sucesso!";
    }