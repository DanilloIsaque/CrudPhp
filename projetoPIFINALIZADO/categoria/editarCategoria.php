<!DOCTYPE html>
<html lang="pt-br">

<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="../index.css">
<title>Editar Categoria</title>
</head>

<body>
<?php
require_once('../bd.php');

//Coleta os dados do Administrador
$id = $_GET["id"];

//Realiza uam Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado p
$admin = $pdo->query("SELECT * FROM CATEGORIA WHERE CATEGORIA_ID =" . $id)->fetch();

//Se o retorno for vazio (0), então a senha ou email estão incorretos

$id = $admin["CATEGORIA_ID"];
$nome = $admin["CATEGORIA_NOME"];
$descricao = $admin["CATEGORIA_DESC"];
$categoriaAtivo = $admin["CATEGORIA_ATIVO"];

// Inicia a sessao
session_start();

// Se existir a marcacao de estar logado
if(isset($_SESSION["logado"]) == true) {
    //Se a maracacao esta True

 
} else {
    // Se a marcacao nao existir ou for falsa

    // Direciona paga a pagina de login com a mensagem de erro
    header("location:../loginAdm.php?msg=Necessário realizar o login!");
}



?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
<div class="logo">
<a href='../menuAdm.php?id=<?php echo $_SESSION["id"] ?>'><img src="../imagens/logo5.png" width='100' height='60' >
    </div>
<a class="navbar-brand">Menu Administrador</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../adm/cadastroAdm.php">Administrador<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../produto/cadastroProduto.php">Produto<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../categoria/cadastroCategoria.php">Categoria<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../estoque/cadastroEstoque.php">Estoque<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../imagem/cadastroImg.php">Imagem<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Outras ações
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="../produto/listarProdutoCompleto.php">Lista produtos</a>
          <a class="dropdown-item" href='../menuAdm.php?id=<?php echo $_SESSION["id"] ?>'> Menu</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="../logout.php">Sair</a>
        </div>
      </li>
    </ul>
  </div>
</nav>
<br>
   <div class="container">
   <div class="row">
    <div class="col">
    <h1>Editar Categoria</h1>
    <form action="../categoriaAcesso/acessoEditarCategoria.php" method="POST">
    <div>
    <input type="hidden" name="id" value="<?php echo $id?>">
    </div>

  <div class="form-group">
    <label for="exampleInputEmail1">Nome da Categoria</label>
    <input type="text" class="form-control" name="nome" aria-describedby="emailHelp" value="<?php echo $nome?>" required>
  </div>

  <div class="form-group">
  <label for="exampleInputEmail1">Descrição da Categoria</label>
  <div class="input-group">
  <textarea class="form-control" name="descricao" aria-label="With textarea" required>
  <?php echo $descricao?>
  </textarea>
  </div>
</div>

<div class="input-group">
  <div class="input-group-prepend">
    <div class="input-group-text">
    <input type="radio" name="categoriaAtivo" value= "1" <?php if ($categoriaAtivo == '1') { ?> 
                     checked 
                     <?php  } ?>>
                  Ativo
                </div>
              </div>-
              <div class="input-group-text">
                <input type="radio" name="categoriaAtivo"  value="0" <?php if ($categoriaAtivo == '0') {?>  
                  checked
                   <?php  } ?>>
                Não Ativo
              </div>
</div>
<br>

  <button type="submit" class="btn btn-light">Editar</button>
</form>
    </div>
   </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>