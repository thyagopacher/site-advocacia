<?php
    include "../model/Conexao.php";
    include "../model/Trabalho.php";
    $trabalho = new Trabalho();
    $conexao = new Conexao();
    $conexao->conectar();    
    if(isset($_POST["nome"])){
        $res = $trabalho->procuraNome($_POST["nome"], $conexao);
    }else{
        $res = $trabalho->procuraNome("", $conexao);
    }
    if(mysql_num_rows($res) > 0){
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Nome</th>";
        echo "<th>Opções</th>";
        echo "<tr>";
        echo "</thead>";
        echo "<tbody>";
        while($dados = mysql_fetch_array($res)){
            echo '<tr>',
            '<td>', $dados["codtrabalho"], '</td>',
            '<td>', $dados["nome"],'</td>',
            '<td>';
            echo '<a href="Trabalho.php?codtrabalho=',$dados["codtrabalho"],'" title="Clique aqui para editar">';
            echo '<img src="../img/editar.png"/>',
            '</a>',
            '<a href="javascript: excluirTrabalho(',$dados["codtrabalho"],')">',
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

