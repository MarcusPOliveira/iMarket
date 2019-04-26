<?php

	include_once("conexao.php");

	$email = $_POST['email'];
	$senha = $_POST['senha'];


	   //login com supermercado
	if($email == 'supermercadoBH' AND $senha == 'supermercadoBH'){
		$sql2 = "SELECT cnpj, nome FROM supermercado WHERE (nome = 'Supermercado BH');";
		$query2= mysqli_query($conexao, utf8_decode($sql2));
		$result = mysqli_fetch_assoc($query2);
		if (!isset($_SESSION2)) session_start();
		$_SESSION2['Cnpj'] = $result['cnpj'];

		header("Location: cadastrarProduto.html");exit;
	}else{






		$sql = "SELECT idCliente, nome, email, senha FROM cliente WHERE (email = '$email') AND (senha = '$senha');";
		$query = mysqli_query($conexao, utf8_decode($sql));

		if(mysqli_num_rows($query) !=1){
		//Mensagem de erro quando os dados são inválidos e/ou o cliente nao foi encontrado
		echo "Email e/ou senha incorretos!";
		echo "<br> <a href=login.php> Voltar <a>";
    	//echo "<script>alert('Email e/ou Senha Inválidos'); </script>";



		}else{
		//Salva os dados encontrados na variável $resultado

		$resultado = mysqli_fetch_assoc($query);

		//Se a sessão não existir, inicia uma
		if(!isset($_SESSION)) session_start();

		//Salva os dados encontrados na sessão
		$_SESSION['ClienteID'] = $resultado['idCliente'];
		$_SESSION['ClienteNome'] = $resultado['nome'];
		$_SESSION['ClienteEmail'] = $resultado['email'];
		$_SESSION['ClienteSenha'] = $resultado['senha'];

		//Redireciona o visitante
		header("Location: entregas.php"); exit;


}
}


?>