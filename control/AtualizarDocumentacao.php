<?php
    include "../model/Conexao.php";
    include "../model/Documentacao.php";
    $documentacao = new Documentacao();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $documentacao->coddocumentacao = $_POST["coddocumentacao"];
    $documentacao->observacao = $_POST["observacao"];
    $documentacao->nome = $_POST["nome"];
    
    $res = $documentacao->atualizar2($documentacao, $conexao);
    
    if($res === FALSE){
        echo "Erro ao atualizar documentação! Erro ocasionado por:". mysql_error();
    }else{
        echo "Documentação atualizado com sucesso!";
    }