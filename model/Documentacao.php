<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Documentacao{
    
    public $nome;
    public $arquivo;
    public $observacao;
    public $coddocumentacao;
    public $data;
    public $codcliente;
    
    public function inserir($documentacao, $conexao){
        return $conexao->comando("insert into documentacao(nome, arquivo, observacao, data, codcliente) values('{$documentacao->nome}',"
        . " '{$documentacao->arquivo}', '".addslashes($documentacao->observacao)."', '{$documentacao->data}', '{$documentacao->codcliente}');");
    }
    
    public function atualizar($documentacao, $conexao){
        return $conexao->comando("update documentacao set nome = '{$documentacao->nome}', arquivo = '{$documentacao->arquivo}',"
        . " observacao = '".addslashes($documentacao->observacao)."', data = '{$documentacao->data}', codcliente = '{$documentacao->codcliente}' where coddocumentacao = '{$documentacao->coddocumentacao}';");
    }  
    
    public function excluir($coddocumentacao, $conexao){
        return $conexao->comando("delete from documentacao where coddocumentacao = '{$coddocumentacao}'");
    }
    
    public function procuraCodigo($coddocumentacao, $conexao){
        return mysql_fetch_object($conexao->comando("select * from documentacao where coddocumentacao = '{$coddocumentacao}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select * from documentacao where nome like '%{$nome}%' order by nome");
    }
    
    public function procuraDtNome($nome, $dtinicio, $dtfim, $codcliente, $conexao){
        $and = "";
        if(isset($dtinicio) && $dtinicio != NULL && $dtinicio != ""){
            $and .= " and data >= '{$dtinicio}'";
        }
        if(isset($dtfim) && $dtfim != NULL && $dtfim != ""){
            $and .= " and data <= '{$dtfim}'";
        }
        if(isset($codcliente) && $codcliente != NULL && $codcliente != ""){
            $and .= " and codcliente = '{$codcliente}'";
        }
        return $conexao->comando("select documentacao.*, DATE_FORMAT(data , '%d/%c/%Y') AS 'data2', "
                . " pessoa.nome as cliente "
                . " from documentacao"
                . " inner join pessoa on pessoa.codpessoa = documentacao.codcliente and codnivel = 2"
                . " where documentacao.nome like '%{$nome}%' {$and} and documentacao.data > '1900-01-01'");
    }
}