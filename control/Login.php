<?php
try{
    session_start();
    header ('Content-type: text/html; charset=UTF-8');
    include "../model/Conexao.php";
    include "../model/Pessoa.php";
    $pessoa   = new Pessoa();
    $conexao  = new Conexao();
    
    $conexao->conectar();
    $variables = (strtolower($_SERVER["REQUEST_METHOD"]) == "GET") ? $_GET : $_POST;
    foreach($variables as $key => $value){
        $pessoa->$key = $value;
    }    
    if($pessoa != NULL && $pessoa->email != "" && $pessoa->senha != ""){
        $respessoa = $pessoa->login2($pessoa, $conexao);
        $pessoa2   = mysql_fetch_object($respessoa);
        $msg       = mysql_error();
        if(empty($msg)){
           $msg = "E-mail ou senha não conferem com o banco de dados!"; 
        }
        if($respessoa === FALSE || $pessoa2 === FALSE){
            echo '<script>alert("Erro ao logar pessoa! Causado por: ',  $msg,'")</script>';
        }else{
            $_SESSION["codpessoa"] = $pessoa2->codpessoa;
            $_SESSION["codnivel"] = $pessoa2->codnivel;
            if(isset($_SESSION["codpessoa"])){
                echo '<script>alert("Login efetuado com sucesso!")</script>';
            }else{
                echo '<script>alert("Problemas ao setar sessão de usuário!")</script>';
            }
        }
    }else{
        echo '<script>alert("E-mail ou senha em branco, por favor preencha!")</script>';
    }
    echo ('<script>document.location.href="../visao/painel/index.php";</script>');
}catch(Exception $ex){
    echo '<script>alert("Erro ao logar pessoa! Causado por: ',  $ex,'")</script>';
}