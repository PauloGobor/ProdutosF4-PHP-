<?php  
	include_once'lock.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title></title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<?php include 'menu.php'; ?>

	<h2 class="text text-info" style="text-align: center">Adicionar Produto</h2>

	<form action="cadastroproduto.php" method="post" style="margin: 50px 0 0 100px">
		
		<p>
			<label>Nome : </label><br>
			<input type="text" name="nome">
		</p>

		<p>
			<label>Valor:</label><br>
			<input type="number" name="valor" step="any" >
		</p>

		<p>
			<label>Descrição:</label><br>
			<textarea name="descricao" rows="8" cols="100" maxlength="255"placeholder="Digite a descrição do produto aqui..."></textarea> 
		</p>

		<p>
			<button type="reset" class="btn btn-outline-secondary">Apagar</button>
			<button type="submit" class="btn btn-outline-primary">Cadastrar</button>
		</p>

	</form>

	<?php  

	if (!empty($_POST['nome']) && !empty($_POST['valor']) && !empty($_POST['descricao'])) {
		$nome      = $_POST['nome'];
		$valor     = $_POST['valor'];
		$descricao = $_POST['descricao'];

		//incluir o arquivo de conexão
		include 'conn.php';

		// criar comando sql que será executado
		$sql = "INSERT INTO tb_produtos (nome_produto, valor_produto, descricao_produto) 
				VALUES ('$nome', '$valor', '$descricao')";

		// executar comando sql
		$result = mysqli_query($conn, $sql);

		// verificar se comando foi executado com sucesso
		if (mysqli_affected_rows($conn) > 0) {
			echo "<h3 class=\"alert alert-dismissible alert-success\">Produto Cadastrado com Sucesso!</h3>";
			echo "Nome: " 	   . $nome      . "<br>";
			echo "Valor: " 	   . $valor     . "<br>";
			echo "Descrição: " . $descricao . "<br>";
		}else{
			echo "<h3 class=\"alert alert-danger\">Erro ao cadastrar produto</h3>";
		}
		
	}

	?>


</body>
</html>