<?php  
	include_once'lock.php'; 
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Detalhes do Produto</title>
	<meta charset="utf-8">
</head>
<body>

<?php 
	include 'menuclientelogado.php';
	include 'conn.php';

	$nome_produto = $_GET['nome_produto'];

	$sql = "SELECT * FROM tb_produtos WHERE nome_produto='$nome_produto'";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {

		$produtos = array();

		while ($produtos = mysqli_fetch_assoc($result)) {
			?>
			
			<div style="margin-left: 35%">

				<form method="post" style="margin-left: 25px">
					<div class="card text-white bg-info mb-3" style="max-width: 20rem;">
						<h4 class="card-header">Nome: <?php echo $produtos['nome_produto']; ?></h4>
						<div class="card-body">
							<div class="card-title">Valor: <?php echo $produtos['valor_produto']; ?></div>
							<div class="card-title">Descrição: <?php echo nl2br($produtos['descricao_produto']);?></div>
						</div>
					</div>
				</form>

			</div>

			<p style="margin-left: 20px">
				<button type="button" onclick="window.history.back()" class="btn btn-outline-info">Voltar</button>		
			</p>
			<input type="hidden" name="id"
			value="<?php echo $produto['id_produto']; ?>">

			<?php
		}

	}
?>

</body>
</html>