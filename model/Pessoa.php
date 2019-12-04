<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Pessoa{
    
    public $codpessoa;
    public $nome;
    public $email;
    public $senha;
    public $codnivel;
    public $tipologradouro;
    public $logradouro;
    public $numero;
    public $cep;
    public $cidade;
    public $estado;
    public $telefone;
    public $celular;
    
    public function inserir($pessoa, $conexao){
        return $conexao->comando("insert into pessoa(nome, email, senha, codnivel, cep, tipologradouro, logradouro, numero, bairro, cidade, estado, telefone, celular)"
                . " values('{$pessoa->nome}', '{$pessoa->email}', '{$pessoa->senha}', "
                . "'{$pessoa->codnivel}', '{$pessoa->cep}', '{$pessoa->tipologradouro}', '{$pessoa->logradouro}', '{$pessoa->numero}',"
                . " '{$pessoa->bairro}', '{$pessoa->cidade}', '{$pessoa->estado}', '{$pessoa->telefone}', '{$pessoa->celular}');");
    }
    
    public function atualizar($pessoa, $conexao){
        return $conexao->comando("update pessoa set nome = '{$pessoa->nome}', "
        . " email = '{$pessoa->email}', senha = '{$pessoa->senha}', codnivel = '{$pessoa->codnivel}',"
        . " cep = '{$pessoa->cep}', tipologradouro = '{$pessoa->tipologradouro}', "
        . " logradouro = '{$pessoa->logradouro}', numero = '{$pessoa->numero}',"
        . " bairro = '{$pessoa->bairro}', cidade = '{$pessoa->cidade}', "
        . " estado = '{$pessoa->estado}', telefone = '{$pessoa->telefone}',"
        . " celular = '{$pessoa->celular}' where codpessoa = '{$pessoa->codpessoa}';");
    }  
    
    public function excluir($codpessoa, $conexao){
        return $conexao->comando("delete from pessoa where codpessoa = '{$codpessoa}'");
    }
    
    public function procuraCodigo($codpessoa, $conexao){
        return mysql_fetch_object($conexao->comando("select * from pessoa where codpessoa = '{$codpessoa}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select * from pessoa where nome like '%{$nome}%' order by nome");
    } 
    
    public function login($pessoa, $conexao){
        return mysql_fetch_object($conexao->comando("select * from pessoa where email = '{$pessoa->email}' and senha = '{$pessoa->senha}'"));
    }
    
    public function login2($pessoa, $conexao){
        return $conexao->comando("select * from pessoa where email = '{$pessoa->email}' and senha = '{$pessoa->senha}'");
    }
    
}