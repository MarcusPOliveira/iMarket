<?php

include_once("conexao.php");

$nome = $_POST['nome'];
$cpf = $_POST['cpf'];
$fone = $_POST['fone'];
$email = $_POST['email'];
$senha = $_POST['senha'];


	$sql = "INSERT INTO cliente (nome, cpf, fone, email, senha) VALUES ('$nome', '$cpf', '$fone', '$email', '$senha');";

	mysqli_query($conexao,utf8_decode($sql)) or die ("Erro ao cadastrar Cliente". $Erro);



	if(!$sql) {

	}else{
		header("Location: login.php");
	}
		mysqli_close($conexao); //fecha a conexao
	





?>