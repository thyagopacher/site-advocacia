<?php
    include "../model/Conexao.php";
    include "../model/Banner.php";
    $banner = new Banner();
    $conexao   = new Conexao();
    $conexao->conectar();
    $banner2 = $banner->procuraCodigo($_POST["codbanner"], $conexao);
    if(unlink("../arquivos/".$banner2->imagem)){
        $res = $banner->excluir($_POST["codbanner"], $conexao);
        $msg = "Banner excluido com sucesso!";
    }else{
        $res = FALSE;
        $msg = "Problemas ao apagar imagem do servidor!";
        
    }    
    
    $res = $banner->excluir($_POST["codbanner"], $conexao);
    if($res === FALSE){
        $msg = "Problemas ao apagar imagem do servidor! Erro causado por:". mysql_error();
    }else{
        $msg = "Imagem apagada com sucesso!"; 
    }
    echo $msg;