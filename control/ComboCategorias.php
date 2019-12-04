<?php
    include "../model/Conexao.php";
    include "../model/Categoria.php";
    $categoria = new Categoria();
    $conexao = new Conexao();
    $conexao->conectar();    
    
    $res = $categoria->procuraNome("", $conexao);
    if(mysql_num_rows($res) > 0){
        while($dados = mysql_fetch_array($res)){
            echo '<option value="',$dados["codcategoria"],'">',$dados["nome"],'</option>';
        }
    }else{
        echo "<option value=''>--Nada encontrado--</option>";
    }
