<?php  
include_once'lock.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<?php include 'menuclientelogado.php'; ?>
	
	<h1>Bem Vindo <?php echo $_SESSION['nome_user']; ?>!</h1>

	<div class="jumbotron">
		<?php

		include 'verificar_msg.php';

		include 'conn.php';

		$sql = "SELECT nome_produto
		FROM tb_produtos";

		$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) { // então, se isso for verdade...
		

		// montar cabeçalho da tabela
		?>
		<form class="form-inline my-2 my-lg-0" method="post" action="search.php">
			<h3>Produtos Disponíveis</h3>
			<input class="form-control mr-sm-2" style="margin-left: 1010px" type="text" placeholder="Pesquisar Produtos" name="search">
			<button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit-search">Pesquisar</button>
		</form>

		<div class="jumbotron" role="main">
			<div class="page-reader">
				<h4>Produtos</h4><br>
			</div>
			<div class="row">	
				<?php $produtos = array(); 
				while ($produtos = mysqli_fetch_assoc($result)){	?>
					<div class="col-sm-6 col-md-4">
						<div class="thumbnail">
							<img src="images/empty.jpg" alt="..." style="height: 300px; margin-left: 100px"><br><br>
							<div class="caption text-center">
								<a href="detalhes.php?nome_produto=<?php echo $produtos['nome_produto']; ?>"><h3><?php echo $produtos['nome_produto']; ?></h3></a><br>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>

		<table class="table table-hover" cellpadding="8" cellpadding="10" border="0" width="100%">
			<tr>


		<?php
	}else{
		echo "<h3>Não há produtos cadastrados</h3>";
	}

	?>
</tr>
</table>
</div>
</body>
</html>