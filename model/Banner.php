<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Banner{
    
    public $link;
    public $imagem;
    public $descricao;
    
    public function inserir($banner, $conexao){
        return $conexao->comando("insert into banner(link, imagem, descricao) values('{$banner->link}', '{$banner->imagem}', '{$banner->descricao}');");
    }
    
    public function atualizar($banner, $conexao){
        return $conexao->comando("update banner set link = '{$banner->link}',"
        . " imagem = '{$banner->imagem}', descricao = '{$banner->descricao}' where codbanner = '{$banner->codbanner}';");
    }  
    
    public function excluir($codbanner, $conexao){
        return $conexao->comando("delete from banner where codbanner = '{$codbanner}'");
    }
    
    public function procuraCodigo($codbanner, $conexao){
        return mysql_fetch_object($conexao->comando("select * from banner where codbanner = '{$codbanner}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select * from banner where link like '%{$nome}%' order by codbanner");
    }
    
}