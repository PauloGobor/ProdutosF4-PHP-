<?php  
	include_once'lock.php'; 
	if (empty($_GET['id'])) {
	}

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Meu Perfil</title>
	<meta charset="utf-8">


</head>
<body>
	
	<?php include 'menuclientelogado.php';

	$id = $_SESSION['id_user'] ;

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

		<form action="perfileditado.php" method="post" style="margin: 50px 0 0 100px">
		<h2 class="text text-info" style="text-align: center">Editar Contatos</h2>
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

		<H2>Endereço</H2>

		<p>
			<label>Cep:</label><br>
			<input type="text" name="cep" id="cep" maxlength="9"
			value="<?php echo $contato['cep']; ?>">
		</p>
		<p>
			<label>Rua:</label><br>
			<input type="text" name="rua" id="rua" size="40"
			value="<?php echo $contato['rua']; ?>">
		</p>
		<p>
			<label>Estado:</label><br>
			<input type="text" name="estado" id="uf"
			value="<?php echo $contato['estado']; ?>">
		</p>
		<p>
			<label>Cidade:</label><br>
			<input type="text" name="cidade" id="cidade"
			value="<?php echo $contato['cidade']; ?>" >
		</p>
		<p>
			<label>Bairro:</label><br>
			<input type="text" name="bairro" id="bairro"
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