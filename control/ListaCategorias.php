<?php
    include "../model/Conexao.php";
    include "../model/Categoria.php";
    $categoria = new Categoria();
    $conexao = new Conexao();
    $conexao->conectar();    
    
    $res = $categoria->procuraNome("", $conexao);
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
            '<td>', $dados["codcategoria"], '</td>',
            '<td>', $dados["nome"],'</td>',
            '<td>';
            ?>
            <a href="javascript: setaEditar('<?=$dados["codcategoria"]?>', '<?=$dados["nome"]?>')" title="Clique aqui para editar">
            <?php
            echo '<img src="../img/editar.png"/>',
            '</a>',
            '<a href="javascript: excluir(',$dados["codcategoria"],')">',
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

