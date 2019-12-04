<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class ObservacaoTrabalho{
    
    public $nome;
    public $texto;
    public $data;
    public $codtrabalho;
    public $codobservacao;
    
    public function inserir($observacao_trabalho, $conexao){
        return $conexao->comando("insert into observacao_trabalho(nome, texto, data, codtrabalho)"
                . " values('{$observacao_trabalho->nome}', '".  addslashes($observacao_trabalho->texto)."', '{$observacao_trabalho->data}', '{$observacao_trabalho->codtrabalho}');");
    }
    
    public function atualizar($observacao_trabalho, $conexao){
        return $conexao->comando("update observacao_trabalho set nome = '{$observacao_trabalho->nome}', texto = '".addslashes($observacao_trabalho->texto)."', "
                . " data = '{$observacao_trabalho->data}', codtrabalho = '{$observacao_trabalho->codtrabalho}' "
                . " where codobservacao = '{$observacao_trabalho->codobservacao}';");
    }  
    
    public function excluir($codobservacao, $conexao){
        return $conexao->comando("delete from observacao_trabalho where codobservacao = '{$codobservacao}'");
    }
    
    public function procuraCodigo($codobservacao, $conexao){
        return mysql_fetch_object($conexao->comando("select * from observacao_trabalho where codobservacao = '{$codobservacao}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select observacao_trabalho.*,  DATE_FORMAT(data, '%d . %m . %Y') as data2 from observacao_trabalho where nome like '%{$nome}%' order by nome");
    }
    
}