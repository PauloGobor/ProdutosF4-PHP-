<?php  
	include_once'lock.php';
	if (!empty($_POST['id']) && !empty($_POST['nome']) && !empty($_POST['fone']) && !empty($_POST['email'])&&
        !empty($_POST['cep'])    && !empty($_POST['estado'])  && !empty($_POST['cidade']) && 
	    !empty($_POST['bairro']) && !empty($_POST['num_end'])) {

		$id = $_POST['id'];
		$nome = $_POST['nome'];
		$fone = $_POST['fone'];
		$email = $_POST['email'];
		$cep           = $_POST['cep'];
		$estado        = $_POST['estado'];
		$cidade        = $_POST['cidade'];
		$bairro        = $_POST['bairro'];
		$num_end       = $_POST['num_end'];
		$complemento   = $_POST['complemento'];
		$valida = 0;

		include 'conn.php';

		$sql = "UPDATE tb_users SET 
		nome_user = '$nome', 
		fone_user = '$fone', 
		email_user= '$email' 
		WHERE id_user = $id";

		$result = mysqli_query($conn, $sql);
		$last_id_user = mysqli_insert_id($conn) ;
		if(mysqli_affected_rows($conn) > 0){
			$valida = 1;
		}

		$sql = "UPDATE tb_enderecos_usuario SET 
		estado = '$estado', 
		cidade = '$cidade', 
		cep    = '$cep',
		rua    = '$rua',
		bairro = '$bairro',
		numero = '$num_end',
		complemento = '$complemento'
		WHERE id_user = $id";
		$result2 = mysqli_query($conn, $sql);
		


		if(mysqli_affected_rows($conn) > 0 || $valida ==1){
			header('location:gerenciar.php?msg=edtSucess');
		}else{
			header('location:gerenciar.php?msg=edtError');
		}
	}else{
		header('location:gerenciar.php?msg=empty');
	}
?>