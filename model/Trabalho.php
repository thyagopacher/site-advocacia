<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Trabalho{
    
    public $nome;
    public $texto;
    public $data;
    public $codcliente;
    public $codtrabalho;
    
    public function inserir($trabalho, $conexao){
        return $conexao->comando("insert into trabalho(nome, texto, data, codcliente)"
                . " values('{$trabalho->nome}', '".  addslashes($trabalho->texto)."', '{$trabalho->data}', '{$trabalho->codcliente}');");
    }
    
    public function atualizar($trabalho, $conexao){
        return $conexao->comando("update trabalho set nome = '{$trabalho->nome}', texto = '".addslashes($trabalho->texto)."', "
                . " data = '{$trabalho->data}', codcliente = '{$trabalho->codcliente}' "
                . " where codtrabalho = '{$trabalho->codtrabalho}';");
    }  
    
    public function excluir($codtrabalho, $conexao){
        return $conexao->comando("delete from trabalho where codtrabalho = '{$codtrabalho}'");
    }
    
    public function procuraCodigo($codtrabalho, $conexao){
        return mysql_fetch_object($conexao->comando("select * from trabalho where codtrabalho = '{$codtrabalho}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select * from trabalho where nome like '%{$nome}%' order by nome");
    }
    
}