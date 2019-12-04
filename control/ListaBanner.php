<?php
    include "../model/Conexao.php";
    include "../model/Banner.php";
    $banner = new Banner();
    $conexao = new Conexao();
    $conexao->conectar();    
    
    $res = $banner->procuraNome("", $conexao);
    if(mysql_num_rows($res) > 0){
        echo "<table>";
        echo "<thead>";
        echo "<tr>";
        echo "<th>Codigo</th>";
        echo "<th>Link</th>";
        echo "<th>Imagem</th>";
        echo "<th>Opções</th>";
        echo "<tr>";
        echo "</thead>";
        echo "<tbody>";
        while($dados = mysql_fetch_array($res)){
            echo '<tr>';
            echo '<td>', $dados["codbanner"], '</td>';
            echo '<td><a href="', $dados["link"], '">', $dados["link"], '</a></td>';
            echo '<td><img src="../../arquivos/', $dados["imagem"],'" alt="Imagem banner show" width="100" height="100"/></td>';
            echo '<td>';
            echo '<a href="javascript: excluir(',$dados["codbanner"],')">';
            echo '<img src="../img/excluir.png"/>';
            echo '</a>';
            echo '</td>';
            echo '</tr>';
        }
        echo "</tbody>";
        echo "</table>";
    }else{
        echo "Nada encontrado!";
    }

