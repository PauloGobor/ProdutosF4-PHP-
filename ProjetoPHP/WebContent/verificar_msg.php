<?php  	if (!empty($_GET['msg'])) {// verificar se há alguma msg para ser exibida:
		$msg = $_GET['msg'];

		if ($msg == 'delSucess') {
			echo '<h5 class="alert alert-success">Contato excluido com sucesso</h5>';
		}elseif ($msg == 'delError') {
			echo '<h5 class="alert alert-danger">Erro ao excluir contato</h5>';
		}elseif ($msg == 'empty') {
			echo '<h5 class="alert alert-warning">Preencha todos os dados do Contato!</h5>';
		}elseif ($msg == 'edtSucess') {
			echo '<h5 class="alert alert-success">Contato editado com sucesso</h5>';
		}elseif ($msg == 'edtError') {
			echo '<h5 class="alert alert-danger">Erro ao editar dados do contato</h5>';
		}elseif ($msg == 'loginEmpty') {
			echo '<h5 class="alert alert-warning">Preencha todos os campos</h5>';
		}elseif ($msg == 'loginError') {
			echo '<h5 class="alert alert-danger">Usuário ou senha inválidos</h5>';
		}elseif ($msg == 'userCad') {
			echo '<h5 class="alert alert-success">Usuário cadastrado com sucesso</h5>';
		}elseif ($msg == 'errorCad') {
			echo '<h5 class="alert alert-danger">Usuário ou email já estão cadastrados no sistema</h5>';
		}elseif ($msg == 'userEdt') {
			echo '<h5 class="alert alert-success">Dados salvos com sucesso</h5>';
		}elseif ($msg == 'userEdtError') {
			echo '<h5 class="alert alert-danger">Não foi possível salvar as alterações</h5>';
		}elseif ($msg == 'emptyCad') {
			echo '<h5 class="alert alert-danger">Preencha todos os campos obrigatórios!</h5>';
		}
	}
?>