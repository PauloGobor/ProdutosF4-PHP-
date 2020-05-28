<?php  
	include_once'lock.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Home - Meus Produtos</title>
	<meta charset="utf-8">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

	<?php include 'menu.php'; ?>
	
	<h2 class="text text-info" style="text-align: center">Meus Produtos</h2>

	<div class="jumbotron" style="margin: 50px 30% 0 30%; padding: 50px 0 20px 0; background-color: #a4c0ef">
	<?php

	include 'verificar_msg.php';
	
	include 'conn.php';

	// criar o comando SQL que será executado (no caso o SELECT)
	$sql = "SELECT *
			FROM tb_produtos";

	// executar comando sql criado acima e armazena na variável
	// 'result' todos os registros que a busca retornar

	$result = mysqli_query($conn, $sql);

	//se houverem registros na tabela, o valor retornado pela função abaixo será, obrigatoriamente, maior que zero:
	if (mysqli_affected_rows($conn) > 0) { // então, se isso for verdade...
		
		// montar cabeçalho da tabela
		?>

		<table class="table table-hover">
			<tr class="table-active">
				<th scope="row">ID</th>
				<th scope="row">Nome</th>
				<th scope="row">Valor</th>
				<th scope="row">Descricao</th>
				<th scope="row">Editar</th>
				<th scope="row">Deletar</th>
				<th scope="row">Detalhes</th>
			</tr>
		
		<?php

		$produtos = array(); // registra um array na memória

		// enquanto houverem registros armazenados dentro de 'result':
		// armazene em 'contatos' o registro atual de 'result'
		while ($produtos = mysqli_fetch_assoc($result)) {
			echo "<tr>";
			foreach ($produtos as $indice => $produto) {

				echo "<td>$produto</td>";

				// copiar o valor do id
				if ($indice == 'id_produto') {
					$id = $produto;
				}
			}

			// montar links para editar e deletar;
			// passar parametro href="editar.php?id='.$id.'

			echo '<td><a href="editarproduto.php?id='.$id.'"class="btn btn-warning">Editar</a></td>';
			echo '<td><a href="deletarproduto.php?id='.$id.'"class="btn btn-danger" 
			onclick="return confirm(\'Deseja excluir este registro?\')">Deletar</a></td>';
			echo '<td><a href="descricaoproduto.php?id='.$id.'"class="btn btn-info">Detalhes</a></td>';
			echo "</tr>";
		}
		// fechar tabela;
		echo "</table>";
	}else{
		echo "<h3>Não há produtos cadastrados</h3>";
	}

	?>
	</div>

</body>
</html>