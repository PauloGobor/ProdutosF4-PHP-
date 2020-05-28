<?php  
	include_once'lock.php'; 
	if (empty($_GET['id'])) {
		header('location:index.php');
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Editar Produto</title>
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

		<h3>Editar Produto</h3>
		<form action="produtoeditado.php" method="post" style="margin-left: 25px">
		
		<p>
			<label>Nome : </label><br>
			<input type="text" name="nome"
			value="<?php echo $produto['nome_produto']; ?>">

		</p>

		<p>
			<label>Valor:</label><br>
			<input type="number" name="valor" step="any" 
			value="<?php echo $produto['valor_produto']; ?>">
		</p>

		<p>
			<label>Descrição:</label><br>
			<textarea name="descricao" rows="8" cols="100" maxlength="255"><?php echo nl2br($produto['descricao_produto']);?></textarea>  
		</p>

		<p>
			<button type="button" onclick="window.history.back()" class="btn btn-outline-secondary">Cancelar</button>
			<button type="submit" class="btn btn-outline-primary">Editar</button>
		</p>

		<input type="hidden" name="id"
		value="<?php echo $produto['id_produto']; ?>">
	</form>


		<?php

	}else{
		echo '<h3 class="alert alert-warning"> Não foi possível carregar o formulário de edição</h3>';

	}

	?>
</body>
</html>