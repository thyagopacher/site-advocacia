<?php
    header ('Content-type: text/html; charset=UTF-8');
    include "../model/Conexao.php";
    include "../model/Conteudo.php";
    $conteudo = new Conteudo();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $variables = (strtolower($_SERVER["REQUEST_METHOD"]) == "GET") ? $_GET : $_POST;
    foreach($variables as $key => $value){
        $conteudo->$key = $value;
    }    
    if(!isset($conteudo->data) || $conteudo->data == "" || $conteudo->data == NULL){
        $conteudo->data = date("Ymd");
    }    
    $res = $conteudo->atualizar($conteudo, $conexao);
    $palavra = "Conteúdo";
    if($conteudo->codcategoria == 10){
        $palavra = "Notícia";
    }      
    if($res === FALSE){
        $msg = "Erro ao atualizar $palavra! Erro ocasionado por:". mysql_error();
    }else{
        $msg = "$palavra atualizada com sucesso!";
    }
    
    echo "<script>alert('{$msg}');window.history.go(-1);</script>";