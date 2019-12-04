<?php
    include "../model/Conexao.php";
    include "../model/SlideShow.php";
    $slideshow = new SlideShow();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    $slideshow->codslide = $_POST["codslide"];
    $slideshow->link = $_POST["link"];
    $slideshow->descricao = $_POST["descricao"];
    
    $res = $slideshow->atualizar2($slideshow, $conexao);
    
    if($res === FALSE){
        echo "Erro ao atualizar slide show!";
    }else{
        echo "Slide Show atualizado com sucesso!";
    }