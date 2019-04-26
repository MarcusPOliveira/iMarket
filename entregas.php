<!DOCTYPE+html>
<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/styles_entregas.css">
		<title> Entregas </title>
	</head>

	<?php
		//A sessão precisa ser iniciada em cada página diferente
		if (!isset($_SESSION)) session_start();

		//Verifica se não há a variavél da sessão que identifica o usuário
		if(!isset($_SESSION['ClienteID'])) {
			//Destrói a sessão por segurança
			session_destroy();
			//Redireciona o visitante de volta pro Login
		 	header("Location: login.php"); exit;
		}

	?>

	<body class="body">
		<header>
		<img id="logo" src="imagens/logo.png">
				
					<ul>
						<li><a href="home.html">Home</a></li>
						<li><a href="supermercados.html">Supermercados</a></li>
						<li><a href="pedidos.html">Pedidos</a></li>
						<li><a href="favoritos.html">Favoritos</a></li>
						<li><a href="configuracoes.html">Configurações</a></li>
						<li><a href="logout.php" class="linkcab"> Sair </a></li>
					</ul>
				
		</header>

		<div id="conteudo">
			<div id="login">
				<form method="POST" action="cadastraEndereco.php">
					<h1>Meu Endereço</h1>
					<div>
						<input type="text" name="cidade" value="Formiga" readonly="">
					</div>

					<div>
						<input type="text" name="rua" class="rua" placeholder="Rua">
						<input type="text" name="num" class="numero" placeholder="Nº">

					</div>

					<div>
						<input type="text" name="bairro" class="bairro" placeholder="Bairro">
					</div>

					<div>
						<input type="submit" name="" value="Cadastrar" class="submit">
					</div>

					<div class="espacamento">
						<a href="">Esqueceu sua Senha?</a>
					</div>

					<div class="espacamento">
						<a href="">Crie sua Conta</a>
					</div>

					<div>
						<a href="supermercados.html">Já cadastrei meu endereço</a>
					</div>

				</form>
			</div>

		</div>
	
	</body>
</html>