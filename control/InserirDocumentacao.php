<?php
header ('Content-type: text/html; charset=UTF-8'); 
if(isset($_FILES["arquivo"])){
    include "../model/Conexao.php";
    include "../model/Documentacao.php";
    $documentacao = new Documentacao();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    // Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';     
    
    $arquivo  = $_FILES["arquivo"];
    if($arquivo['error'] == 0){
        $separacao  = explode(".", $arquivo["name"]);
        $nome_final = time().'.' . $separacao[1];   
        if(move_uploaded_file($arquivo['tmp_name'], "../arquivos/". $nome_final)){
            $documentacao->arquivo    = $nome_final;
            $documentacao->codcliente = $_POST["codcliente"];
            $documentacao->observacao = $_POST["observacao"];
            $documentacao->nome       = $_POST["nome"];
            $documentacao->data       = date("Ymd");
            $res = $documentacao->inserir($documentacao, $conexao);
            if($res === FALSE){
                $msg = "Erro ao inserir Documentação! Causado por: ". mysql_error();
            }else{
                $msg = "Documentação inserido com sucesso!";
            }
        }else{
            $msg = "Erro ao carregar arquivo para servidor!";
        }
    }else{
        $msg = "Não foi possível fazer o upload, erro:" . $_UP['erros'][$arquivo['error']];
    }
}else{
    $msg = "Não pode inserir documentação sem anexar arquivo!";
}
    echo '<script>alert("',$msg,'");window.history.back();</script>';