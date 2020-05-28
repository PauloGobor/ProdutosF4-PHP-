<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Aula 09 - Login</title>
	<meta charset="utf-8">

	<style type="text/css"></style>
	<link rel="stylesheet" href="css/slate.css">
</head>
<body>
	<?php include 'menucliente.php'; ?>
	<h2 class="text text-info" style="text-align: center">Bem-vindo Loja de Departamentos</h2>

	<?php include 'verificar_msg.php'; ?>
	<div class="jumbotron" style="margin: 50px 40% 0 40%; padding-bottom: 50px">

		<div style="text-align: center">
	<h5> Entre com o Login:</h5>
	<form action="validacao.php" method="post" style="margin-top: 50px" style="text-align: center">
		<p style="text-align: center">
			<label>Usuário:</label><br>
			<input type="text" name="usuario" style="padding-left: 5px">
		</p>
		
		<p  style="text-align: center">
			<label>Senha:</label><br>
			<input type="password" name="senha" style="padding-left: 5px">
		</p>
		
			<button type="submit" class="btn btn-outline-primary" style="width: 100%">Entrar</button>
			<br>
			<a href="cadastrar_user.php" class="btn btn-outline-secondary" style="width: 100%; margin-top: 10px">Cadastre-se</a>
	


	</form>

	</div>

	</div>

</body>
</html>