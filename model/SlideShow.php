<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class SlideShow{
    
    public $nome;
    public $link;
    public $imagem;
    public $codslide;
    public $descricao;
    
    public function inserir($slideshow, $conexao){
        return $conexao->comando("insert into slideshow(nome, link, imagem, descricao) values('{$slideshow->nome}',"
        . " '{$slideshow->link}', '{$slideshow->imagem}', '".addslashes($slideshow->descricao)."');");
    }
    
    public function atualizar($slideshow, $conexao){
        return $conexao->comando("update slideshow set nome = '{$slideshow->nome}', link = '{$slideshow->link}',"
        . " imagem = '{$slideshow->imagem}', descricao = '".addslashes($slideshow->descricao)."' where codslideshow = '{$slideshow->codslide}';");
    }  
    
    public function excluir($codslideshow, $conexao){
        return $conexao->comando("delete from slideshow where codslide = '{$codslideshow}'");
    }
    
    public function procuraCodigo($codslideshow, $conexao){
        return mysql_fetch_object($conexao->comando("select * from slideshow where codslide = '{$codslideshow}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select * from slideshow where nome like '%{$nome}%' order by nome");
    }
    
}