<style type="text/css"></style>
<link rel="stylesheet" href="css/slate.css">

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="index.php">HOME</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarColor01">
    <ul class="navbar-nav mr-auto">

      <li class="nav-item">
        <a class="nav-link" href="CadastroProduto.php">Novo Produto</a>
      </li>

       <li class="nav-item">
        <a class="nav-link" href="gerenciar.php">Usuarios</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="cadastraradmin.php">Cadastrar Adm</a>
      </li>

      </li>
      <li class="nav-item" style="margin-left: 1510px">
        <a class="nav-link" href="logout.php">Sair 
          [<?php echo $_SESSION['nome_user']; ?>]</a>
      </li>
    </ul>
  </div>
</nav>

<br>
