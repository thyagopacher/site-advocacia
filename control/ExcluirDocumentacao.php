<?php
    include "../model/Conexao.php";
    include "../model/Documentacao.php";
    $documentacao = new Documentacao();
    $conexao   = new Conexao();
    $conexao->conectar();
    $documentacao2 = $documentacao->procuraCodigo($_POST["coddocumentacao"], $conexao);
    if(unlink("../arquivos/".$documentacao2->documentacao)){
        $res = $documentacao->excluir($_POST["coddocumentacao"], $conexao);
        $msg = "Documentação excluida com sucesso!";
    }else{
        $res = FALSE;
        $msg = "Problemas ao apagar arquivo do servidor!";
        
    }    
    
    $res = $documentacao->excluir($_POST["coddocumentacao"], $conexao);
    if($res === FALSE){
        $msg = "Problemas ao apagar documentação do servidor!";
    }else{
        $msg = "Documentação apagada com sucesso!"; 
    }
    echo $msg;