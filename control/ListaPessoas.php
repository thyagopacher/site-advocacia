<?php
    include "../model/Conexao.php";
    include "../model/Pessoa.php";
    $pessoa = new Pessoa();
    $conexao = new Conexao();
    $conexao->conectar();    
    if(isset($_POST["nome"])){
        $res = $pessoa->procuraNome($_POST["nome"], $conexao);
    }else{
        $res = $pessoa->procuraNome("", $conexao);
    }
    if(mysql_num_rows($res) > 0){
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Nome</th>";
        echo "<th>E-mail</th>";
        echo "<th>Opções</th>";
        echo "<tr>";
        echo "</thead>";
        echo "<tbody>";
        while($dados = mysql_fetch_array($res)){
            echo '<tr>',
            '<td>', $dados["codpessoa"], '</td>',
            '<td>', $dados["nome"],'</td>',
            '<td>', $dados["email"],'</td>',
            '<td>';
           
            echo '<a href="Pessoa.php?codpessoa=',$dados["codpessoa"],'" title="Clique aqui para editar">';
            echo '<img src="../img/editar.png"/>',
            '</a>',
            '<a title="Clique para excluir" href="javascript: excluir(',$dados["codpessoa"],')">',
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

