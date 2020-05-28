<?php  
	include_once'lock.php';
// verificar se recebemos algum id
if (!empty($_GET['id'])) {
	// se não estiver vazio o 'id' vindo via get, prosseguimos com o código

	include 'conn.php';

	$id = $_GET['id'];
	$sql = "DELETE FROM tb_users WHERE id_user = $id";
	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		header('location:gerenciar.php?msg=delSucess');
	}else{
		header('location:gerenciar.php?msg=delError');
	}

}else{
	// seremos redirecionados para a 'gerenciar.php'
	header('location:gerenciar.php');

}
?>