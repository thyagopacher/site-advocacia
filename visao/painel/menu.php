<div id='cssmenu'>
    <ul>
        <li class='active '><a href='index.php'><span>Home</span></a></li>
        <li class='active '><a href='Pessoa.php?codpessoa=<?=$_SESSION["codpessoa"]?>'><span>Meu Perfil</span></a></li>
        <?php if($_SESSION["codnivel"] == "1"){?>
        
        <li><a href='Site.php'><span>Site</span></a></li>
        <li class='has-sub'>
            <a href='#'><span>Slide Show</span></a>
            <ul>
                <li><a href="SlideShow.php">Cadastrar</a></li>
                <li><a href="ProcurarSlideShow.php">Procurar</a></li>
            </ul>            
        </li>
        <li class='has-sub'>
            <a href='#'><span>Banner</span></a>
            <ul>
                <li><a href="Banner.php">Cadastrar</a></li>
                <li><a href="ProcurarBanner.php">Procurar</a></li>
            </ul>            
        </li>
        <li><a href='Categoria.php'><span>Categoria</span></a></li>
        <li class='has-sub'>
            <a href='#'><span>Pessoas</span></a>
            <ul>
                <li><a href="Pessoa.php?codnivel=1">Funcionário</a></li>
                <li><a href="Pessoa.php?codnivel=2">Cliente</a></li>
                <li><a href="ProcurarPessoa.php">Procurar</a></li>
            </ul>
        </li>
        <li class='has-sub'>
            <a href='#'><span>Trabalhos</span></a>
            <ul>
                <li><a href='Trabalho.php'><span>Cadastrar</span></a></li>
                <li><a href='ProcurarTrabalho.php'><span>Procurar</span></a></li>
                <li><a href='ProcurarDocumentacao.php' title="Procurar documentação que cliente cadastrou"><span>Documentação</span></a></li>
            </ul>
        </li>
        <li class='has-sub'>
            <a href='#'><span>Conteúdo</span></a>
            <ul>
                <li><a href='Conteudo.php'><span>Cadastrar</span></a></li>
                <li><a href='ProcurarConteudo.php'><span>Procurar</span></a></li>
            </ul>            
        </li>
        <li class='has-sub'>
            <a href='#'><span>Notícias</span></a>
            <ul>
                <li><a href='Noticia.php'><span>Cadastrar</span></a></li>
                <li><a href='ProcurarNoticia.php'><span>Procurar</span></a></li>
            </ul>            
        </li>
        <?php }elseif($_SESSION["codnivel"] == "2"){?>
            <li class='has-sub '>
                <a href='MeuProcesso.php'><span>Meu processo</span></a>
                <ul>
                    <li><a href='Andamento.php'><span>Andamento</span></a></li>
                    <li><a href='Documentacao.php' title="anexar arquivos"><span>Documentação</span></a></li>
                    <li><a href='ProcurarDocumentacao.php' title="anexar arquivos"><span>Procurar Documentação</span></a></li>
                </ul>
            </li>
        <?php }?>
            <li><a href='Logout.php'><span>Sair</span></a></li>
    </ul>
</div>

