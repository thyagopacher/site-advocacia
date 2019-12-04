<?php
    include "../model/Conexao.php";
    include "../model/Banner.php";
    $banner = new Banner();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $banner->codbanner = $_POST["codbanner"];
    $banner->link = $_POST["link"];
    $banner->descricao = $_POST["descricao"];
    $res = $banner->atualizar2($banner, $conexao);
    
    if($res === FALSE){
        echo "Erro ao atualizar banner!Erro causado por:". mysql_error();
    }else{
        echo "Banner atualizado com sucesso!";
    }