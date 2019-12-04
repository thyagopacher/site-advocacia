<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Nivel{
    
    public $codnivel;
    public $nome;
    
    
    public function inserir($nivel, $conexao){
        return $conexao->comando("insert into nivel(nome, codmestre) values('{$nivel->nome}');");
    }
    
    public function atualizar($nivel, $conexao){
        return $conexao->comando("update nivel set nome = '{$nivel->nome}' where codnivel = '{$nivel->codnivel}';");
    }  
    
    public function excluir($codnivel, $conexao){
        return $conexao->comando("delete from nivel where codnivel = '{$codnivel}'");
    }
    
    public function procuraCodigo($codnivel, $conexao){
        return mysql_fetch_object($conexao->comando("select * from nivel where codnivel = '{$codnivel}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select * from nivel where nome like '%{$nome}%' order by nome");
    }
    
}