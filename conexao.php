<?php

$servidor = "localhost:3306";
$usuario = "root";
$senha = "";
$banco = "iMarket";

$conexao = mysqli_connect($servidor,$usuario,$senha,$banco) or die("Não foi possível conectar ao Banco de Dados");
mysqli_set_charset($conexao,'utf-8');

?>