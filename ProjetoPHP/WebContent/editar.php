<?php  
	include_once'lock.php'; 
	if (empty($_GET['id'])) {
		header('location:gerenciar.php');
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Editar cliente</title>
	<meta charset="utf-8">
</head>
<body>
	
	<?php include 'menu.php';

	$id = $_GET['id'];

	include 'conn.php';

	$sql = "SELECT * FROM tb_users
			inner join  tb_enderecos_usuario  ON tb_enderecos_usuario.id_user = tb_users.id_user
			WHERE tb_users.id_user = $id";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		// converte o resultado da busca em um array associativo:
		$contato = mysqli_fetch_assoc($result);

		// monta formulário de edição:

		?>

		<h3>Editar Contato</h3>
		<form action="editado.php" method="post" style="margin-left: 25px">
		
		<p>
			<label>Nome : </label><br>
			<input type="text" name="nome"
			value="<?php echo $contato['nome_user']; ?>">

		</p>

		<p>
			<label>Fone:</label><br>
			<input type="text" name="fone"
			value="<?php echo $contato['fone_user']; ?>">
		</p>

		<p>
			<label>E-mail:</label><br>
			<input type="email" name="email"
			value="<?php echo $contato['email_user']; ?>">
		</p>

		<p>
			<label>Cep:</label><br>
			<input type="text" name="cep" maxlength="9"
			value="<?php echo $contato['cep']; ?>">
		</p>
		<p>
			<label>Estado:</label><br>
			<input type="text" name="estado"
			value="<?php echo $contato['estado']; ?>">
		</p>
		<p>
			<label>Cidade:</label><br>
			<input type="text" name="cidade"
			value="<?php echo $contato['cidade']; ?>" >
		</p>
		<p>
			<label>Bairro:</label><br>
			<input type="text" name="bairro" 
			value="<?php echo $contato['bairro']; ?>">
		</p>
		<p>
			<label>Número:</label><br>
			<input type="number" name="num_end" 
			value="<?php echo $contato['numero']; ?>">
		</p>
		<p>
			<label>Complemento:</label><br>
			<input type="text" name="complemento"
			value="<?php echo $contato['complemento']; ?>" >
		</p>

		<p>
			<button type="button" onclick="window.history.back()" class="btn btn-outline-secondary">Cancelar</button>
			<button type="submit" class="btn btn-outline-primary">Editar</button>
		</p>

		<input type="hidden" name="id"
		value="<?php echo $contato['id_user']; ?>">
	</form>


		<?php

	}else{
		echo '<h3 class="alert alert-warning"> Não foi possível carregar o formulário de edição</h3>';

	}

	?>



</body>
</html>