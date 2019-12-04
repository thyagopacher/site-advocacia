<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Site{
    
    public $nome;
    public $descricao;
    public $palavrachave;
    public $telefone;
    public $telefone2;
    public $cep;
    public $tipologradouro; 
    public $logradouro;
    public $numero;
    public $bairro;
    public $cidade;
    public $estado;
    public $edificio;
    public $andar;
    public $sala;
    public $email;
    public $skype;
    public $facebook;
    public $googlemais;
    public $twitter;
    public $qtdpagina;
    public $qtdnoticia;
    
    public function inserir($site, $conexao){
        return $conexao->comando("insert into site(nome, email, descricao, palavrachave,"
                . " telefone, telefone2, cep, tipologradouro, logradouro, numero, bairro,"
                . " cidade, estado, skype, facebook, googlemais, qtdpagina, qtdnoticia, sala, twitter)"
                . " values('{$site->nome}', '{$site->email}', '{$site->descricao}', '{$site->palavrachave}',"
                . " '{$site->telefone}', '{$site->telefone2}', '{$site->cep}', '{$site->tipologradouro}','{$site->logradouro}', '{$site->numero}',"
                . " '{$site->bairro}', '{$site->cidade}', '{$site->estado}', '{$site->skype}', '{$site->facebook}',"
                . " '{$site->googlemais}', '{$site->qtdpagina}', '{$site->qtdnoticia}', '{$site->sala}', '{$site->edificio}', '{$site->andar}', '{$site->twitter}');");
    }
    
    public function atualizar($site, $conexao){
        return $conexao->comando("update site set nome = '{$site->nome}', email = '{$site->email}',"
        . " descricao = '{$site->descricao}', palavrachave = '{$site->palavrachave}',"
        . " telefone = '{$site->telefone}', telefone2 = '{$site->telefone2}', cep = '{$site->cep}', tipologradouro = '{$site->tipologradouro}', logradouro = '{$site->logradouro}',"
        . " numero = '{$site->numero}', bairro = '{$site->bairro}', cidade = '{$site->cidade}',"
        . " estado = '{$site->estado}', skype = '{$site->skype}', facebook = '{$site->facebook}',"
        . " googlemais = '{$site->googlemais}', qtdpagina = '{$site->qtdpagina}', qtdnoticia = '{$site->qtdnoticia}',"
        . " sala = '{$site->sala}', edificio = '{$site->edificio}', andar = '{$site->andar}', twitter = '{$site->twitter}'"
        . " where codsite = '{$site->codsite}';");
    }  
    
    public function excluir($codsite, $conexao){
        return $conexao->comando("delete from site where codsite = '{$codsite}'");
    }
    
    public function procuraCodigo($codsite, $conexao){
        return mysql_fetch_object($conexao->comando("select * from site where codsite = '{$codsite}'"));
    }
}