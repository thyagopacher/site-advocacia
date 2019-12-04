<html>
    <head>
        <meta charset="utf-8"/>
        <title>Login - Painel Administrativo Advocacia</title>
        <link rel="stylesheet" type="text/css" media="all" href="/visao/css/painel.css"/>
    </head>
    <body>
        <div id="banner">
            <h2>Fazer login para prosseguir para o Painel administrativo</h2>
        </div>
        <form id="flogin" action="../../control/Login.php" method="post">
            <fieldset>
                <p>
                    <label>E-mail:</label>
                    <input type="email" required name="email" id="email" size="50" maxlength="200" value="" placeholder="aaa@aaa.com.br"/>
                </p>
                <p>
                    <label>Senha:</label>
                    <input type="password" required name="senha" id="senha" size="20" maxlength="20" value=""/>
                </p>
                <p>
                    <input type="submit" name="btentrar" id="btentrar" value="Fazer login"/>
                </p>
            </fieldset>
        </form>     
    </body>
</html>