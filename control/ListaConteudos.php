<?php
    include "../model/Conexao.php";
    include "../model/Conteudo.php";
    $conteudo = new Conteudo();
    $conexao = new Conexao();
    $conexao->conectar();    
    
    $and = "";
    if(isset($_POST["nome"])){
        $and .= " and nome like '%{$_POST["nome"]}%'";
    }
    if(isset($_POST["codcategoria"])){
        $and .= " and codcategoria = '{$_POST["codcategoria"]}'";
    }
    $sql = "select * from conteudo where 1 = 1 {$and}";
    $res = $conteudo->procuraComando($sql, $conexao);
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
            '<td>', $dados["codconteudo"], '</td>',
            '<td>', $dados["nome"],'</td>',
            '<td>';
            if($dados["codcategoria"] == 10){
                echo '<a href="Noticia.php?codconteudo=',$dados["codconteudo"],'" title="Clique aqui para editar">';
            }else{
                echo '<a href="Conteudo.php?codconteudo=',$dados["codconteudo"],'" title="Clique aqui para editar">';
            }
            echo '<img src="../img/editar.png"/>',
            '</a>',
            '<a href="javascript: excluir(',$dados["codconteudo"],')">',
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

