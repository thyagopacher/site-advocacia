<?php
    include "../model/Conexao.php";
    include "../model/SlideShow.php";
    $slideshow = new SlideShow();
    $conexao   = new Conexao();
    
    $conexao->conectar();
    // Array com os tipos de erros de upload do PHP
    $_UP['erros'][0] = 'Não houve erro';
    $_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
    $_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
    $_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
    $_UP['erros'][4] = 'Não foi feito o upload do arquivo';     
    
    $imagem  = $_FILES["imagem"];
    if($imagem['error'] == 0){
        $separacao  = explode(".", $imagem["name"]);
        $nome_final = time().'.' . $separacao[1];   
        if(move_uploaded_file($imagem['tmp_name'], "../arquivos/". $nome_final)){
            $slideshow->imagem    = $nome_final;
            $slideshow->link      = $_POST["link"];
            $slideshow->descricao = $_POST["descricao"];
            $res = $slideshow->inserir($slideshow, $conexao);
            if($res === FALSE){
                $msg = "Erro ao inserir slide show! Causado por: ". mysql_error();
            }else{
                $msg = "Slide Show inserido com sucesso!";
            }
        }else{
            $msg = "Erro ao carregar imagem para servidor!";
        }
    }else{
        $msg = "Não foi possível fazer o upload, erro:" . $_UP['erros'][$imagem['error']];
    }
    echo '<script>alert("',$msg,'");window.history.back();</script>';