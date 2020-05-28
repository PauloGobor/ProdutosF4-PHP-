<?php // arquivo de conexao com o banco de dados
// constantes de conexao
define("DB_HOST", "localhost");   // servidor
define("DB_USER", "root");		  // usuário
define("DB_PASSWORD", "");		  // senha
define("DB_NAME", "loja_departamento"); // nome do

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$conn) {
	echo "Não foi possível se conectar ao banco de dados";
	exit;
	mysql_close($conn);
}
?>