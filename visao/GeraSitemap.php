<?php
    header("Content-type: text/xml");
    include("../model/Conexao.php");
    $conexao = new Conexao();
    $conexao->conectar();
    echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
?>
<urlset
      xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
      xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
      xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
            http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
<url>
  <loc>http://www.ronaldarruda.com.br/</loc>
  <changefreq>always</changefreq>
  <priority>1.00</priority>
</url>
<url>
  <loc>http://www.ronaldarruda.com.br/apresentacao</loc>
  <changefreq>always</changefreq>
  <priority>0.80</priority>
</url>
<url>
  <loc>http://www.ronaldarruda.com.br/missao</loc>
  <changefreq>always</changefreq>
  <priority>0.80</priority>
</url>

<url>
  <loc>http://www.ronaldarruda.com.br/Contato</loc>
  <changefreq>always</changefreq>
  <priority>0.80</priority>
</url>
<url>
  <loc>http://www.ronaldarruda.com.br/TrabalheConosco</loc>
  <changefreq>always</changefreq>
  <priority>0.80</priority>
</url>
<?php 
    function preparaMenu($menu){
        return preg_replace( '/[`^~\'"]/', null, iconv( 'UTF-8', 'ASCII//TRANSLIT',(strtolower(str_replace(" ", "-", $menu)))));
    }
    $resnoticia = $conexao->comando("select * from conteudo where codcategoria = 10");
    $qtdnoticia = mysql_num_rows($resnoticia);
    if($qtdnoticia > 0){
        while($noticia = mysql_fetch_array($resnoticia)){
            echo '<url>';
              echo '<loc>http://www.ronaldarruda.com.br/noticia/',$noticia["codconteudo"],'</loc>';
              echo '<changefreq>always</changefreq>';
              echo '<priority>0.80</priority>';
            echo '</url>';       
        }
    }
    $resatuacao = $conexao->comando("select conteudo.nome, conteudo.codconteudo from conteudo where codcategoria = '6' order by nome");
    $qtdatuacao = mysql_num_rows($resatuacao);
    if($qtdatuacao > 0){
        while($conteudo = mysql_fetch_array($resatuacao)){
            echo '<url>';
              echo '<loc>http://www.ronaldarruda.com.br/areas/',  preparaMenu($conteudo["nome"]),'/',$conteudo["codconteudo"],'</loc>';
              echo '<changefreq>always</changefreq>';
              echo '<priority>0.80</priority>';
            echo '</url>';       
        }
    }
?>
</urlset>