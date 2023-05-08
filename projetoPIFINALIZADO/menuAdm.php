<!DOCTYPE html>
<html lang="pt-br">
<head>
   
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Menu Administrador</title>
</head>
<body>
<?php
require_once('bd.php');
 // Inicia a sessao
 session_start();
//Coleta os dados do Administrador
$id = $_GET["id"];

//Realiza uam Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado p
$admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_ID=" . $id)->fetch();

//Se o retorno for vazio (0), então a senha ou email es
$nome = $admin["ADM_NOME"];
$id=$admin["ADM_ID"];



 // Se existir a marcacao de estar logado
 if(isset($_SESSION["logado"]) == true) {
     //Se a maracacao esta True

  
 } else {
     // Se a marcacao nao existir ou for falsa

     // Direciona paga a pagina de login com a mensagem de erro
     header("location:loginAdm.php?msg=Necessário realizar o login!");
 }


?>      
 <br>
<div class="container">

    
 
<div class="jumbotron">
<img class="imgMenu" src="imagens/logo5.png" width='200' height='150' >
<div align= "right" class="botaoSair">
  <h1>Bem vindo, <?php echo $nome?>!</h1> 
  <a class="btn btn-primary" href="logout.php" role="button">Sair</a>
</div>
  <p class="lead">Funções de Administrador</p>
  <hr class="my-4">
  <!-- começa aqui-->
  <div class="row"> 
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Funções de Estoque</h5>
        <p class="card-text">Cadastre ou Consulte nosso estoque</p>
        <a href="estoque/cadastroEstoque.php" class="btn btn-primary">Cadastrar</a> <a href="estoque/listarEstoque.php" class="btn btn-primary">Consultar</a>
      </div>
    </div>
  </div>
    <!-- -->
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Funções de Categorias</h5>
        <p class="card-text">Cadastre ou Consulte nossas Categorias</p>
        <a href="categoria/cadastroCategoria.php" class="btn btn-primary">Cadastrar</a> <a href="categoria/listarCategoria.php" class="btn btn-primary">Consultar</a>
      </div>
    </div>
  </div>
</div>
  <!-- -->
<br>
<div class="row"> 
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Funções de Produtos</h5>
        <p class="card-text">Cadastre ou Consulte nossos Produtos</p>
        <a href="produto/cadastroProduto.php" class="btn btn-primary">Cadastrar</a> <a href="produto/listarProduto.php" class="btn btn-primary">Consultar</a>
      </div>
    </div>
  </div>
  
    <!-- -->

    <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Funções de Administradores</h5>
        <p class="card-text">Cadastre ou Consulte nossos Administradores</p>
        <a href="adm/cadastroAdm.php" class="btn btn-primary">Cadastrar</a> <a href="adm/listarAdm.php" class="btn btn-primary">Consultar</a>
      </div>
    </div>
  </div>
</div>

 <!-- -->

<br>
<div class="row"> 
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Funções de Imagens</h5>
        <p class="card-text">Cadastre ou Consulte Imagens de Produto</p>
        <a href="imagem/cadastroImg.php" class="btn btn-primary">Cadastrar</a> <a href="imagem/listarImg.php" class="btn btn-primary">Consultar</a>
      </div>
    </div>
  </div>
  
    
 <!-- -->

</div>
</div>
<br>

</div>
</div>
<!-- termina aqui-->
</div>
</div>   
<br>
</body>
</html>