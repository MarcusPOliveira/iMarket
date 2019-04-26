<?php
include_once("conexao.php");

session_start();




$rua = $_POST['rua'];
$bairro = $_POST['bairro'];
$num = $_POST['num'];
$cidade = 'Formiga';


$clienteID = $_SESSION['ClienteID'];


	$sql = "INSERT INTO endereco (rua, bairro, num, cidade, cliente_id) VALUES ('$rua', '$bairro', '$num', '$cidade', '$clienteID');";

	mysqli_query($conexao,utf8_decode($sql)) or die ("Erro ao cadastrar Endereço" . $Erro);



	if(!$sql) {

	}else{
		header("Location: supermercados.html");
	}
		mysqli_close($conexao); //fecha a conexao

?>