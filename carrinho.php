<?php 
	session_start();
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING); //erro de indefined variable --> não consegui corrigir

	if(!isset($_SESSION['carrinho'])){
		$_SESSION['carrinho'] = array();

	}

	//adiciona produto

	if(isset($_GET['acao'])){
		//ADICIONAR CARRINHO

		if($_GET['acao'] == 'add'){
			$id = intval($_GET['id']);
				if(!isset($_SESSION['carrinho'][$id])){
					$_SESSION['carrinho'][$id] = 1;
				}else{
					$_SESSION['carrinho'][$id] += 1;
				}
		}

		//REMOVE CARRINHO
		if($_GET['acao'] == 'del'){
			$id = intval($_GET['id']);
			if(isset($_SESSION['carrinho'] [$id])){
				unset($_SESSION['carrinho'] [$id]);
			}
		}

		//ALTERAR QUANTIDADE
		if($_GET['acao'] == 'up'){
			if(is_array($_POST['prod'])){
				foreach ($_POST['prod'] as $id => $qtd) {
					$id  = intval($id);
					$qtd = intval($qtd);
					if(!empty($qtd) || $qtd <> 0){
						$_SESSION['carrinho'][$id] = $qtd;
					}else{
						unset($_SESSION['carrinho'][$id]);
					}
				}
			}
		}



	}



?>


	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/styles_carrinho.css">
		<title>Carrinho</title>
	</head>
	<body>
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
			<div id="tabela">
				
				<form action="?acao=up" method="POST">
				<table>
					<tr>
						<th>Código</th>
						<th>Produto</th>
						<th class="numero">Preço</th>
						<th>Descrição</th>
						<th>Sub-Total</th>
						<th>Quantidade</th>
						<th>Remover</th>
						
					</tr>

					
					
					
						<?php
							if(count($_SESSION['carrinho']) == 0){
								echo '<tr><td colspan="7">Não há produto no carrinho</td></tr>';
							}else{
								require("conexao.php");
								foreach ($_SESSION['carrinho'] as $id => $qtd) {
									$sql       = "SELECT idSProd, nome, descricao, marca, preco   FROM produto, supermercado_produto WHERE idSProd='$id' AND supermercado_cnpj = '1' AND produto_id = idProduto;" ;
									$qr        = mysqli_query($conexao, utf8_decode($sql)) or die ("Erro");
									
									$ln = mysqli_fetch_assoc($qr);
									$nome      = $ln['nome'];
									$preco     = number_format($ln['preco'], 2, ',', '.');
									
									$idSProd   = $ln['idSProd'];
									$descricao = $ln['descricao'];
									$marca     = $ln['marca'];
									$sub       = number_format($ln['preco'] * $qtd, 2, ',', '.');
									
									$total    += $sub;
									



									echo '<tr>
											<td>'.$idSProd.'</td>
											<td>'.$nome. " " .$marca.'</td>
											<td class="numero">'.'R$ '.$preco.'</td>
											<td>'.$descricao.'</td>
											<td>'.'R$ '.$sub.'</td>
											<td><input type="text" name="prod['.$id.']" value="'.$qtd.'"/></td>
											<td><a href="?acao=del&id='.$id.'">Remover</a> </td>
											

											</tr>';

								}


							}

								$total = number_format($total, 2, ',', '.');
								echo '<tr>
										<td colspan="6">TOTAL</td>
										<td>R$ '.$total.'</td>
									</tr>';
									
							//CADASTRA NO BANCO
							if($_GET['acao'] == 'confirmar'){
							require("conexao.php");
							if(!isset($_SESSION)) session_start();
							$clienteID= $_SESSION['ClienteID'];
							$sql2 = "INSERT INTO carrinho (cliente_id, valorTotal) VALUES ('$clienteID', '$total');";
							$query  = mysqli_query($conexao, utf8_decode($sql2)) or die ("Erro ao cadastrar carrinho". $Erro);

							$sql3 = "SELECT idCarrinho FROM carrinho WHERE idCarrinho = (SELECT MAX(idCarrinho)FROM carrinho);";
							$query2 = mysqli_query($conexao, utf8_decode($sql3));
							$resultados = mysqli_fetch_assoc($query2);
							$_SESSION['idCarrinho'] = $resultados['idCarrinho'];

							header("Location: pagamento.php").exit;

						    }
							


						?>

					
						
					


				</table>
				<br><br>
					<input type="submit" name="" value="ATUALIZAR CARRINHO">
				</form>
					<a href="prodBH.php" class="continuarComprando"> CONTINUAR COMPRANDO </a>
					<br><br>
					<a href="?acao=confirmar" class="concluir"> CONCLUIR COMPRA </a>
			</div>
			
		</div>

</body>
