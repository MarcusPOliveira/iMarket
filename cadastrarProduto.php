<?php

include_once("conexao.php");

$nomeProduto = $_POST['nomeProduto'];
$tipo = $_POST['tipo'];
$fabricante = $_POST['fabricante'];
$descricao = $_POST['descricao'];
$marca = $_POST['marca'];
$avaliacao = $_POST['avaliacao'];
$preco = $_POST['preco'];
$qde = $_POST['qde'];


$sql = "INSERT INTO produto (nome, tipo, descricao, fabricante, marca, avaliacao) VALUES ('$nomeProduto', '$tipo', '$descricao', '$fabricante', '$marca', '$avaliacao');";

		mysqli_query($conexao,utf8_decode($sql)) or die ("Erro ao cadastrar Produto". $Erro);


$sql3 = "SELECT idProduto FROM produto WHERE idProduto = (SELECT MAX(idProduto)FROM produto);";
		$query2 = mysqli_query($conexao, utf8_decode($sql3));
		$resultados = mysqli_fetch_assoc($query2);
		$idProduto = $resultados['idProduto'];

$sql2 = "INSERT INTO supermercado_produto (produto_id, supermercado_cnpj, qde, preco) VALUES ('$idProduto', '1', '$qde', '$preco');";
				

		mysqli_query($conexao,utf8_decode($sql2)) or die ("Erro ao cadastrar Produto". $Erro);
		


	if(!$sql) {

	}else{
		header("Location: cadastrarProduto.html"); 
		die("Don't ignore");
	}
		mysqli_close($conexao); //fecha a conexao
	

	


?>



	