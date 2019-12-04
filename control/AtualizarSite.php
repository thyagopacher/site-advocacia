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
    if(isset($_FILES["logo"])){
        move_uploaded_file($_FILES["logo"]['tmp_name'], "../visao/img/ronald.png");
    }
    $res = $site->atualizar($site, $conexao);
    
    if($res === FALSE){
        $msg = "Erro ao atualizar site:". mysql_error();
    }else{
        $msg = "Site atualizado com sucesso!";
    }
    
    echo "<script>alert('{$msg}');window.history.go(-1);</script>";