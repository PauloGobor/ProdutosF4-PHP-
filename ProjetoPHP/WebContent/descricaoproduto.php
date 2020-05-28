<?php  
	include_once'lock.php'; 
	if (empty($_GET['id'])) {
		header('location:index.php');
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Detalhes do Produto</title>
	<meta charset="utf-8">
</head>
<body>
	
	<?php include 'menu.php';

	$id = $_GET['id'];

	include 'conn.php';

	$sql = "SELECT * FROM tb_produtos WHERE id_produto = $id";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		// converte o resultado da busca em um array associativo:
		$produto = mysqli_fetch_assoc($result);

		// monta formulário de edição:

		?>
			<p style="margin-left: 20px">
			<button type="button" onclick="window.history.back()" class="btn btn-outline-info">Voltar</button>		
			</p>
	<div style="margin-left: 35%">

		<form method="post" style="margin-left: 25px">
			<div class="card text-white bg-info mb-3" style="max-width: 20rem;">
			  <h4 class="card-header"><?php echo $produto['nome_produto']; ?></h4>
			  <div class="card-body">
			    <div class="card-title">Valor: <?php echo $produto['valor_produto']; ?></div>
			   <div class="card-title">Descrição: <?php echo nl2br($produto['descricao_produto']);?></div>
			  </div>
			</div>
		</form>
		
	</div>
		<input type="hidden" name="id"
		value="<?php echo $produto['id_produto']; ?>">
		


		<?php

	}else{
		echo '<h3 class="alert alert-warning"> Não foi possível carregar o formulário de edição</h3>';

	}

	?>
</body>
</html>