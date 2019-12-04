<?php
ob_start();
session_start();
include("../../model/Conexao.php");
$conexao = new Conexao();
$site = $conexao->comandoArray("select * from site");
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <?php include "header.php" ?>
        <title>Andamento - Painel Administrativo <?=$site["nome"];?></title>
    </head>
    <body>
        <?php
        include 'menu.php';
        if ($_SESSION["codnivel"] == 2) {
            $and = "";
            if (isset($_GET["codtrabalho"])) {
                $and .= " and codtrabalho = '{$_GET["codtrabalho"]}'";
            }
            $sql = "select trabalho.*, DATE_FORMAT(data, '%d . %m . %Y') as data2 from trabalho where codcliente = '{$_SESSION["codpessoa"]}' {$and}";
            $restrabalho = $conexao->comando($sql);
            $qtdtrabalho = mysql_num_rows($restrabalho);
            if ($qtdtrabalho > 0) {
                if ($qtdtrabalho > 1) {
                    echo "<ul>";
                    while ($trabalho = mysql_fetch_array($restrabalho)) {
                        echo "<li>";
                        echo "<a href='Andamento.php?codtrabalho={$trabalho["codtrabalho"]}' title='Clique aqui para visualizar informações do processo'>";
                        echo $trabalho["data2"], "-", $trabalho["nome"];
                        echo "</a>";
                        echo "</li>";
                    }
                    echo "</ul>";
                } else {
                    $trabalho = mysql_fetch_array($restrabalho);
                    echo '<h3>', $trabalho["data2"], ' - ', $trabalho["nome"], '</h3>';
                    echo 'Descrição:<br>';
                    echo $trabalho["texto"] . "<br>";
                    $sql = "select observacao_trabalho.*, DATE_FORMAT(data, '%d . %m . %Y') as data2  from observacao_trabalho where codtrabalho = '{$trabalho["codtrabalho"]}'";
                    $resobservacao = $conexao->comando($sql);
                    $qtdobservacao = mysql_num_rows($resobservacao);
                    if ($qtdobservacao > 0) {
                        echo '<h4>Observações adicionais acrescentadas:</h4>';
                        echo '<ul>';
                        while ($observacao = mysql_fetch_array($resobservacao)) {
                            echo '<li title="',$observacao["texto"],'">';
                            echo $observacao["data2"], "-", $observacao["nome"];
                            echo '</li>'; 
                        }
                        echo '</ul>';
                    } else {
                        echo 'Nenhum observação adicional encontrada';
                    }
                }
            } else {
                echo "Nada encontrado de processos em seu nome!";
            }
        }
        ?>
    </body>
</html>
