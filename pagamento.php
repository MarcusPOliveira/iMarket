<?php
	include_once("conexao.php");

?>



<html>
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/pagamento.css">
		<title> Cadastrar Mercado </title>
	</head>
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
			<div id="pagamento">
				<form>
					<h1>Pagamento</h1>
					<div>
						<input type="text" name="numcartao" id="numcartao" placeholder="Número do Cartão">
					</div>

					<div>
						<input type="text" name="nomecartao" id="nomecartao" placeholder="Nome Impresso no Cartão">
					</div>

					<div>
						<fieldset>
							<legend>Validade</legend>
						<span>
							<select>
								<option>Mês</option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>
								<option>6</option>
								<option>7</option>
								<option>8</option>
								<option>9</option>
								<option>10</option>
								<option>11</option>
								<option>12</option>
							</select>

							<select>
								<option>Ano</option>
								<option>2018</option>
								<option>2019</option>
								<option>2021</option>
								<option>2022</option>
								<option>2023</option>
								<option>2024</option>
								<option>2025</option>
								<option>2026</option>
								<option>2027</option>
								<option>2028</option>
								<option>2029</option>
								<option>2030</option>
								<option>2031</option>
								<option>2032</option>
								<option>2033</option>
								<option>2034</option>
								<option>2035</option>
								<option>2036</option>
								<option>2037</option>
								<option>2038</option>
							</select>
						</span>
						</fieldset>
					</div>

					<div>
						<input type="text" name="cvv" id="cvv" placeholder="Código de Segurança" maxlength="3">
					</div>

					<div>
						<input type="text" name="parcelas" id="parcelas" placeholder="Nº de Parcelas" maxlength="2">
					</div>

					<div>
						<span>
							
							<?php 
							session_start(); 
							$idCarrinho = $_SESSION['idCarrinho'];
							$sql = "SELECT valorTotal FROM carrinho WHERE idCarrinho = $idCarrinho;";
							$query = mysqli_query($conexao, utf8_decode($sql));
							$resultado = mysqli_fetch_assoc($query);
							$valorTotal = $resultado['valorTotal'];
							?>

							<label>Total:</label> <input type="text" name="" value= <?php echo 'R$'.$valorTotal.',00'?> readonly="" id="total">

							
							<input type="submit" name="valorTotal" value="PAGAR" class="submit">
						</span>
					</div>
				</form>
			</div>

		</div>
	
	</body>
</html>