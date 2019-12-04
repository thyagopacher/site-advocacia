<?php
    include "../model/Conexao.php";
    include "../model/Categoria.php";
    $categoria = new Categoria();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $res = $categoria->excluir($_POST["codcategoria"], $conexao);
    
    if($res === FALSE){
        echo "Erro ao excluir categoria!";
    }else{
        echo "Categoria excluida com sucesso!";
    }