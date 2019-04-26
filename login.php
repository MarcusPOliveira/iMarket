<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/styles_login.css">
		<title> iMarket </title>
	</head>
	<body>
		<header>
			<img id="logo" src="imagens/logo.png">
				
					<ul>
						<li><a href="" class="linkcab"> Quem somos? </a></li>
						<li><a href="" class="linkcab"> Contato </a></li>
						<li><a href="" class="linkcab"> Cadastre sua conta </a></li>
						
					</ul>
				
		</header>

		<div id="conteudo">
			<div id="login">
				<form method="POST" action="validacaoLogin.php">
					<h1>Login</h1>
					<div>
						<input required type="text" name="email" placeholder="Email">
					</div>

					<div>
						<input required type="password" name="senha" placeholder="Senha">
					</div>

					<div>
						<input type="submit" name="button" value="Entrar">
					</div>

					<div class="espacamento">
						<a href="">Esqueceu sua Senha?</a>
					</div>

					<div>
						<a href="cadastrarCliente.html">Crie sua Conta</a>
					</div>


				</form>
			</div>

		</div>

	
	</body>
</html>