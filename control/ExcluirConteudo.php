<?php
    include "../model/Conexao.php";
    include "../model/Conteudo.php";
    $conteudo = new Conteudo();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $res = $conteudo->excluir($_POST["codconteudo"], $conexao);
    $palavra = "Conteúdo";
    if($conteudo->codcategoria == 10){
        $palavra = "Notícia";
    }    
    if($res === FALSE){
        echo "Erro ao excluir $palavra!";
    }else{
        echo "$palavra excluido com sucesso!";
    }