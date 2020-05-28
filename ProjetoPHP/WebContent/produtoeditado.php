<?php  
	include_once'lock.php';
	if (!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['valor']) && !empty($_POST['descricao'])) {
		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$valor = $_POST['valor'];
		$descricao = $_POST['descricao'];

		include 'conn.php';

		$sql = "UPDATE tb_produtos SET 
		nome_produto      = '$nome', 
		valor_produto     = '$valor', 
		descricao_produto = '$descricao' 
		WHERE id_produto  =  $id";

		$result = mysqli_query($conn, $sql);

		if(mysqli_affected_rows($conn) > 0){
			header('location:index.php?msg=edtSucess');
		}else{
			header('location:index.php?msg=edtError');
		}
	}else{
		header('location:index.php?msg=empty');
	}
?>