<?php
    session_start();
    include "../model/Conexao.php";
    include "../model/Documentacao.php";
    $documentacao = new Documentacao();
    $conexao = new Conexao();
    $conexao->conectar();    
    
    $res = $documentacao->procuraDtNome($_POST["nome"], $_POST["dtinicio"], $_POST["dtfim"], $_POST["codcliente"], $conexao);
    if(mysql_num_rows($res) > 0){
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Nome</th>";
        echo "<th>Arquivo</th>";
        echo "<th>Data Cadastro</th>";
        if($_SESSION["codnivel"] == 1){
            echo "<th>Cliente</th>";
        }
        echo "<th>Opções</th>";
        echo "<tr>";
        echo "</thead>";
        echo "<tbody>";
        while($dados = mysql_fetch_array($res)){
            echo '<tr>',
            '<td>', $dados["coddocumentacao"], '</td>',
            '<td>', $dados["nome"],'</td>',
            '<td><a href="../../arquivos/', $dados["arquivo"],'" target="_blank">', $dados["arquivo"],'</a></td>',
            '<td>', $dados["data2"],'</td>';
            if($_SESSION["codnivel"] == 1){
                echo '<td><a href="Pessoa.php?codpessoa=',$dados["codcliente"],'" title="Visualize aqui o perfil do cliente">',$dados["cliente"],'</a></td>';
            }
            echo '<td>';
            echo '<a href="Documentacao.php?coddocumentacao=',$dados["coddocumentacao"],'" title="Clique aqui para editar">';
            echo '<img src="../img/editar.png"/>',
            '</a>',
            '<a href="javascript: excluir(',$dados["coddocumentacao"],')">',
            '<img src="../img/excluir.png"/>',
            '</a>',
            '</td>',
            '</tr>';
        }
        echo "</tbody>";
        echo "</table>";
    }else{
        echo "Nada encontrado!";
    }

