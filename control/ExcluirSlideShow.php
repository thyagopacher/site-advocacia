<?php
    include "../model/Conexao.php";
    include "../model/SlideShow.php";
    $slideshow = new SlideShow();
    $conexao   = new Conexao();
    $conexao->conectar();
    $slideshow2 = $slideshow->procuraCodigo($_POST["codslide"], $conexao);
    if(unlink("../arquivos/".$slideshow2->imagem)){
        $res = $slideshow->excluir($_POST["codslide"], $conexao);
        $msg = "Slide Show excluida com sucesso!";
    }else{
        $res = FALSE;
        $msg = "Problemas ao apagar imagem do servidor!";
        
    }    
    
    $res = $slideshow->excluir($_POST["codslide"], $conexao);
    if($res === FALSE){
        $msg = "Problemas ao apagar imagem do servidor!";
    }else{
        $msg = "Imagem apagada com sucesso!"; 
    }
    echo $msg;