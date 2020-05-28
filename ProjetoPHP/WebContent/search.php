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
	
	<h1>Página de Pesquisa!</h1>

	<div class="jumbotron">
	<?php

	include 'verificar_msg.php';

	include 'conn.php';

	$loop = 4;
	$i = 1;

	?>
		<form class="form-inline my-2 my-lg-0" method="post" action="search.php">
		<h3>Produtos Disponíveis</h3>
      	<input class="form-control mr-sm-2" style="margin-left: 1010px" type="text" placeholder="Pesquisar Produtos" name="search">
      	<button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit-search">Pesquisar</button>
    	</form>
    	
		<table class="table table-hover" cellpadding="8" cellpadding="10" border="0" width="100%">
		<tr>
		<?php

		if (isset($_POST['submit-search'])){
			$search = mysqli_real_escape_string($conn, $_POST['search']);
			$sql = "SELECT nome_produto FROM tb_produtos WHERE nome_produto LIKE '%$search%'";

			$result = mysqli_query($conn, $sql);
			$queryResult = mysqli_num_rows($result);

			if($queryResult < 2 && $queryResult > 0){
				echo "Existe " .$queryResult. " resultado!";
			}elseif ($queryResult > 1) {
				echo "Existem " .$queryResult. " resultados!";
			}
			
		?>

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

		<?php
		}

	?>

	</tr>
	</table>
	<br>
	<form class="form-inline my-2 my-lg-0" action="home.php">
      	<button class="btn btn-secondary my-2 my-sm-0" type="submit" name="submit">Voltar</button>
    </form>
	</div>


</body>
</html>