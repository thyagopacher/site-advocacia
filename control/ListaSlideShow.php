<?php
    include "../model/Conexao.php";
    include "../model/SlideShow.php";
    $slide = new SlideShow();
    $conexao = new Conexao();
    $conexao->conectar();    
    
    $res = $slide->procuraNome("", $conexao);
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
            '<td>', $dados["codslide"], '</td>',
            '<td><img src="../../arquivos/', $dados["imagem"],'" alt="Imagem slide show" width="100" height="100"/></td>',
            '<td>';
            ?>
            <a href="javascript: setaEditar('<?=$dados["codslide"]?>', '<?=$dados["nome"]?>')" title="Clique aqui para editar">
            <?php
            echo '<img src="../img/editar.png"/>',
            '</a>',
            '<a href="javascript: excluir(',$dados["codslide"],')">',
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

