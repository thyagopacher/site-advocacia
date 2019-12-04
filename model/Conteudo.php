<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Conteudo{
    
    public $nome;
    public $texto;
    public $descricao;
    public $palavrachave;
    public $codcategoria;
    public $data;
    public $posicao;
    
    public function inserir($conteudo, $conexao){
        return $conexao->comando("insert into conteudo(nome, texto, descricao, palavrachave, codcategoria, data, posicao)"
                . " values('{$conteudo->nome}', '".  addslashes($conteudo->texto)."', '".addslashes($conteudo->descricao)."',"
                        . " '{$conteudo->palavrachave}', '{$conteudo->codcategoria}', '{$conteudo->data}', '{$conteudo->posicao}');");
    }
    
    public function atualizar($conteudo, $conexao){
        return $conexao->comando("update conteudo set nome = '{$conteudo->nome}',"
        . " texto = '".addslashes($conteudo->texto)."', descricao = '".addslashes($conteudo->descricao)."',"
                . " palavrachave = '{$conteudo->palavrachave}', codcategoria = '{$conteudo->codcategoria}', data = '{$conteudo->data}', posicao = '{$conteudo->posicao}'"
                . " where codconteudo = '{$conteudo->codconteudo}';");
    }  
    
    public function excluir($codconteudo, $conexao){
        return $conexao->comando("delete from conteudo where codconteudo = '{$codconteudo}'");
    }
    
    public function procuraCodigo($codconteudo, $conexao){
        return mysql_fetch_object($conexao->comando("select * from conteudo where codconteudo = '{$codconteudo}'"));
    }
    
    public function procuraNome($nome, $conexao){
        return $conexao->comando("select * from conteudo where nome like '%{$nome}%' order by nome");
    }
    
    public function procuraComando($sql, $conexao){
        return $conexao->comando($sql);
    }
    
}