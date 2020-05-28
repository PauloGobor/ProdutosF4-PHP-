<?php  
	include_once'lock.php';
// verificar se recebemos algum id
if (!empty($_GET['id'])) {
	// se não estiver vazio o 'id' vindo via get, prosseguimos com o código

	include 'conn.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM tb_produtos WHERE id_produto = $id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		header('location:index.php?msg=delSucess');
	}else{
		header('location:index.php?msg=delError');
	}

}else{
	// seremos redirecionados para a 'gerenciar.php'
	header('location:index.php');

}
?>