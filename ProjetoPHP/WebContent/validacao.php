<?php  

if (empty($_POST['usuario']) || empty($_POST['senha'])) {
	header('location:login.php?msg=loginEmpty');
}else{
	$usuario = $_POST['usuario'];
	$senha   = $_POST['senha'];

	include 'conn.php'; // arquivo de conexao com o BD

	$sql = "SELECT * FROM tb_users WHERE nome_user = '$usuario' AND senha_user = '$senha' ";

	$result = mysqli_query($conn, $sql);

	if (mysqli_affected_rows($conn) > 0) {
		// transforma retorno do BD em array associativo
		// (esse processo facilita o acesso aos dados)
		$login = mysqli_fetch_assoc($result);

		// inicia uma sessão
		session_start();

		// registro variáveis da sessão
		$_SESSION['id_user']    = $login['id_user'];
		$_SESSION['nome_user']  = $login['nome_user'];
		$_SESSION['senha_user'] = $login['senha_user'];
		$_SESSION['email_user'] = $login['email_user'];
		$_SESSION['perfil']     = $login['perfil'];
		
		
		if($_SESSION['perfil']  == 'admin'){
			header('location:index.php');

		}else{
			header('location:home.php');
			}
		
		// redireciona para página inicial do sistema:
		

		

	}else{ // senao (não encontrou nenhum usuário na tabela do BD)
		// redireciona para pagina de login novamente, mandando o parametro 'msg' com valor 'loginError'
		header('location:login.php?msg=loginError');
	}
}

?>