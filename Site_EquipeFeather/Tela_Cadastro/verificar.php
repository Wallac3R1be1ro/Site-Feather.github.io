<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <title>EquipeFeather</title>
        <meta charset="utf-8">
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="Cadastro.css">
		<link rel="shortcut icon" href="../img/logo_feather.ico" type="image/x-icon">
    </head>
    <body>
<!-- div para manter o site responsivo, principalmente pro footer ficar embaixo -->
        <div class="site-wrapper">
<!--Tópicos do site-->
            <div class="cab-div">
                <nav>
                    <input type="checkbox" id="nav-toggle">
                    <label for="nav-toggle" class="burger-menu"> 
                        <img src="../img/nav.png" alt="">
                    </label>
                    <ul class="nav-cont">
                        <li><a href="../Tela_Inicio/Inicio.html">Inicio</a></li>
                        <li><a href="../Tela_Comunidade/Comunidade.html">Comunidade</a></li>
                        <li><a href="../Tela_Jogos/jogo.html">Jogos</a></li>
                        <li><a href="../Tela_Entrar/Entrar.html">Entrar</a></li>
                    </ul>
                </nav>
<!--------------------------------------------------------------->
<!--Logo do site-->
                <header>
                    <h1>Equipe Feather</h1>    
                </header>
            </div>
<!--------------------------------------------------------------->
<!--Conteúdos do site-->

            <main>
                <div class="row">
                    <section>
                        <div class="container">
                            <h1>Cadastrar</h1>
                            <form action="verificar_2.php" method="post">
							<div class="form-control">
                                <input type="text" name="codigo_User" required>
                                <label>Codigo:</label>
                            </div>
                            <input class="btn" type="submit" value="enviar">
                            </form><br>
                        </div>
                        <script src="js.js"></script>
                    </section>
                </div>
            </main>
<!--------------------------------------------------------------->
<!--Rodapé do site-->
            <footer>
                <dl>E-mail:
                <dd>pr0j3c7feather@gmail.com</dd></dl>
                <dl>Rede Social:
                <dd><a href="###">Instagram</a></dd></dl>
                <p>Direitos reservados a Equipe Feather © 2022</p>
            </footer>
<!--------------------------------------------------------------->
        </div>
    </body>
</html>