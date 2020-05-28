<?php  
	include_once'lock.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Cadastro Cliente</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<style type="text/css"></style>
	<link rel="stylesheet" href="css/slate.css">
</head>
<body>
	<?php include 'menu.php'; ?>
		<h1>Página Cadastro de cliente</h1>	
	<form action="cadastraradmin.php" method="post" style="margin-left: 25px">
		<H2>Dados Pessoais</H2>
		<p>
			<label>Nome:</label><br>
			<input type="text" name="nome">
		</p>

		<p>
			<label>Fone:</label><br>
			<input type="text" name="fone">

		<p>
			<label>E-mail:</label><br>
			<input type="email" name="email">
		</p>

		<p>
			<label>Senha:</label><br>
			<input type="password" name="senha">
		</p>

		<H2>Endereço</H2>
		<p>
			<label>Cep:</label><br>
        	<input name="cep" type="text" id="cep" value="" size="10" maxlength="9"
                onblur="pesquisacep(this.value);" /></label><br />
		</p>
		<p>
			<label>Rua:</label><br>
			<input type="text" name="rua" id="rua" size="40">
		</p>
		<p>
			<label>Estado:</label><br>
			<input type="text" name="estado" id="uf">
		</p>
		<p>
			<label>Cidade:</label><br>
			<input type="text" name="cidade" id="cidade">
		</p>
		<p>
			<label>Bairro:</label><br>
        <input name="bairro" type="text" id="bairro" size="40" /></label><br />
		</p>
		<p>
			<label>Número:</label><br>
			<input type="number" name="num_end" >
		</p>
		<p>
			<label>Complemento:</label><br>
			<input type="text" name="complemento" size="35" >
		</p>

		<p>
			<button type="reset" class="btn btn-outline-secondary">Apagar</button>
			<button type="submit" class="btn btn-outline-primary" name="cadastrar">Cadastrar</button>
		</p>
	</form>
	<?php if (!empty($_POST['nome']) && !empty($_POST['senha'])  && !empty($_POST['email']) &&
        !empty($_POST['cep'])  && !empty($_POST['estado']) && !empty($_POST['cidade']) && 
	    !empty($_POST['rua'])  && !empty($_POST['bairro']) && !empty($_POST['num_end'])) 
	{
		$nome  = $_POST['nome'];
	    $fone  = $_POST['fone'];
		$senha = $_POST['senha'];
		$email = $_POST['email'];
        $perfil = 'admin';
		$cep           = $_POST['cep'];
		$estado        = $_POST['estado'];
		$cidade        = $_POST['cidade'];
		$bairro        = $_POST['bairro'];
		$rua           = $_POST['rua'];
		$num_end       = $_POST['num_end'];
		$complemento   = $_POST['complemento'];

		//incluir o arquivo de conexão
		include 'conn.php';

		// criar comando sql que será executado
		$sql = "INSERT INTO tb_users (nome_user,fone_user, senha_user, email_user, perfil) 
				VALUES ('$nome', '$fone', $senha, '$email', '$perfil')";
		// executar comando sql
		$result = mysqli_query($conn, $sql);
		$last_id_user = mysqli_insert_id($conn);



		// verificar se comando foi executado com sucesso
		if (mysqli_affected_rows($conn) > 0) {	
			$sql = "INSERT INTO tb_enderecos_usuario (estado, cidade, cep, rua, bairro, numero, complemento, id_user) 
					VALUES ('$estado', '$cidade', '$cep', '$rua', '$bairro', '$num_end', '$complemento', '$last_id_user')";
			$result2 = mysqli_query($conn, $sql);
			header('location:index.php?msg=userCad');
		}else{
			header('location:cadastraradmin.php?msg=errorCad');
		}
	}elseif (isset($_POST['cadastrar']) && empty($_POST['nome']) && empty($_POST['senha']) && empty($_POST['email']) &&
        empty($_POST['cep'])  && empty($_POST['estado']) && empty($_POST['cidade']) && 
	    empty($_POST['rua'])  && empty($_POST['bairro']) && empty($_POST['num_end'])) 
	{
		echo "<h3>Preencha todos os campos obrigatórios!</h3>";
	}
	?>

		<script src="https://code.jquery.com/jquery-3.4.1.min.js"
            integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
            crossorigin="anonymous"></script>

    <!-- Adicionando Javascript -->
    <script type="text/javascript" >

        $(document).ready(function() {

            function limpa_formulário_cep() {
                // Limpa valores do formulário de cep.
                $("#rua").val("");
                $("#bairro").val("");
                $("#cidade").val("");
                $("#uf").val("");
                $("#ibge").val("");
            }
            
            //Quando o campo cep perde o foco.
            $("#cep").blur(function() {

                //Nova variável "cep" somente com dígitos.
                var cep = $(this).val().replace(/\D/g, '');

                //Verifica se campo cep possui valor informado.
                if (cep != "") {

                    //Expressão regular para validar o CEP.
                    var validacep = /^[0-9]{8}$/;

                    //Valida o formato do CEP.
                    if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#rua").val("...");
                        $("#bairro").val("...");
                        $("#cidade").val("...");
                        $("#uf").val("...");
                        $("#ibge").val("...");

                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                            if (!("erro" in dados)) {
                                //Atualiza os campos com os valores da consulta.
                                $("#rua").val(dados.logradouro);
                                $("#bairro").val(dados.bairro);
                                $("#cidade").val(dados.localidade);
                                $("#uf").val(dados.uf);
                                $("#ibge").val(dados.ibge);
                            } //end if.
                            else {
                                //CEP pesquisado não foi encontrado.
                                limpa_formulário_cep();
                                alert("CEP não encontrado.");
                            }
                        });
                    } //end if.
                    else {
                        //cep é inválido.
                        limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                    }
                } //end if.
                else {
                    //cep sem valor, limpa formulário.
                    limpa_formulário_cep();
                }
            });
        });

    </script>
</body>
</html>