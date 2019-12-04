<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Categoria{
    
    public $codmestre;
    public $nome;
    
    
    public function inserir($categoria, $conexao){
        return $conexao->comando("insert into categoria(nome, codmestre) values('{$categoria->nome}', '{$categoria->codmestre}');");
    }
    
    public function atualizar($categoria, $conexao){
        return $conexao->comando("update categoria set nome = '{$categoria->nome}', codmestre = '{$categoria->codmestre}' where codcategoria = '{$categoria->codcategoria}';");
    }  
    
    public function excluir($codcategoria, $conexao){
        return $conexao->comando("delete from categoria where codcategoria = '{$codcategoria}'");
    }
    
    public function procuraCodigo($codcategoria, $conexao){
        return mysql_fetch_object($conexao->comando("select * from categoria where codcategoria = '{$codcategoria}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select * from categoria where nome like '%{$nome}%' order by nome");
    }
    
}