<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Conexao {

    private $host = "localhost";
    private $usuario = "ronaldar_ronald";
    private $senha = "brasil1602";
    private $banco = "ronaldar_ronald";
    private $db;
    private $conexao;

    function __construct() {
        $this->conectar();
    }
    
    public function conectar() {
        $this->conexao = mysql_connect($this->host, $this->usuario, $this->senha) or die("Erro ao conectar no banco de dados:" . mysql_error());
        $this->db      = mysql_select_db($this->banco) or die("Erro ao selecionar banco de dados:<br>" . mysql_error());
        $this->converteUTF8();
    }

    public function desconectar() {
        mysql_close($this->conexao) or die("Não pode desconectar do banco de dados por causa:<br>" . mysql_error());
    }

    # Aqui est? o segredo evitando grava??o de caracteres esquizidos no banco

    public function converteUTF8() {
        mysql_query("SET NAMES 'utf8'");
        mysql_query('SET character_set_connection=utf8');
        mysql_query('SET character_set_client=utf8');
        mysql_query('SET character_set_results=utf8');
    }

    /* retorna mysql_query */
    public function comando($query) {
        return mysql_query($query);
    }
    
    public function comandoArray($query) {
        return mysql_fetch_array(mysql_query($query));
    }

    /**retorna a quantidade de resultados da consulta*/
    public function qtdResultado($resultado){
        return mysql_num_rows($resultado);
    }
    
    public function iteraResultadoArray($resultado){
        return mysql_fetch_array($resultado);
    }
}
