<?php

include_once("conexao.php");



$pesquisar = $_POST['pesquisar'];

$result_prods = "SELECT preco, nome, descricao, marca, fabricante, qde, idProduto, idSProd FROM produto, supermercado_produto WHERE produto_id = idProduto 
	AND supermercado_cnpj = '1' AND nome LIKE '%$pesquisar%';" ;

	$resultado_produtos = mysqli_query($conexao,utf8_decode($result_prods)) or die ("Erro ao cadastrar Cliente". $Erro);
	$resultado = mysqli_fetch_assoc($resultado_produtos);

	?>
<head>
        	<meta charset="utf-8">
        	<title></title>
          <link href="css/styles_lista_produtos.css" rel="stylesheet">
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

  
        <div class="product-container"><!--INICIO CONTEUDO-->
          <br>
          <H1 class="title">  PRODUTOS </H1>
          <div class="pesquisar">
            
               <form method="POST" action="pesquisar.php">
                Pesquisar:
                <input  type="text" id="textPesquisar" name="pesquisar">
                <input type="submit" id="buttonPesquisar" value="ENVIAR">

              </form>


          </div>
         <div class="forms">




          <?php
          do{
          ?>

            <form method="POST" action="prodBH.php">
              <div class="card"><!--INICIO CARD--------------------------------------------->

              	<div class="container">
              	    <H4 class="preco"> <?php echo "R$ ". $resultado['preco'] . ",00" ; ?> </H4>
              	    <p class="item-nome"> <?php echo $resultado['nome'] . " " . $resultado['marca']; ?> </p>
              	</div>

              	<div class="card-qntd">
            	    
            	    

            	    	
                   <?php  
                   echo '<br />';
                   echo '<a href="carrinho.php?acao=add&id='.$resultado['idSProd'].'">COMPRAR</a>';?>

            	    
            	 </div>

              </div><!--FIM CARD------------------------------------------------------------>
            </form>
          

        
           <?php } while ($resultado = mysqli_fetch_assoc($resultado_produtos));  

          
          ?>
			</div>

              <div>
                  <input type="button" name="button" id="btnFinalizar" value="FINALIZAR">
              </div>

        </div><!--FIM DE CONTEUDO -->

<script type="text/javascript" src="produto.js"></script>
</body>
