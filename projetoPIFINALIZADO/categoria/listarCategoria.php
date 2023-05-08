<html>
    <head>
        <title>Listar as Categorias</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="../lista.css">
    </head>
    <body>
    <?php
require_once('../bd.php');
//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT * FROM CATEGORIA WHERE CATEGORIA_ATIVO=1");

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
    <a href='../menuAdm.php?id=<?php echo $_SESSION["id"] ?>'><img src="imagens/logo5.png" width='100' height='60' ></a>
    </div>

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="../adm/listarAdm.php">Administrador<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../produto/listarProduto.php">Produto<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../estoque/listarEstoque.php">Estoque<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../imagem/listarImg.php">Imagem<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../produto/listarProdutoCompleto.php">Produto Completo<span class="sr-only">(current)</span></a>
      </li>
    
    </ul>
  </div>
</nav>
<br>

        <div class="container">
        <h1>Listar as Categorias</h1>
        <br>
        <br>
        <br>
        

     <h2>Lista de categorias Ativas</h2>       
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ativo</th>
            <th>Atualizar/Desativar</th>     
        </tr>
<?php
    //Lista os admins
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["CATEGORIA_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["CATEGORIA_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["CATEGORIA_DESC"];
                ?>
            </td>   
            
            <td>
                <?php
                echo "ATIVO"
                ?>
            </td>
            <td>
                <a href="../categoria/editarCategoria.php?id=<?php echo $linha["CATEGORIA_ID"] ?>">
                <button type="button" class="btn btn-primary">Atualizar</button>
            </a>
            </td>       
        </tr>
    <?php
    } //while($linha = $cmd->fetch())  ctrl+; abre coment no html
?>
    </table>
    <br>
    <br> 
    <h2>Lista de categorias inativas</h2> 
    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Descrição</th>
            <th>Ativo</th>
            <th>Atualizar/ativar</th>     
        </tr>
<?php
$cmd2 = $pdo->query("SELECT * FROM CATEGORIA WHERE CATEGORIA_ATIVO=0");
    //Lista os admins
    while($linha2 = $cmd2->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha2["CATEGORIA_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha2["CATEGORIA_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha2["CATEGORIA_DESC"];
                ?>
            </td>   
            
            <td>
                <?php
                    echo "INATIVO"
                ?>
            </td>
            <td>
                <a href="../categoria/editarCategoria.php?id=<?php echo $linha2["CATEGORIA_ID"] ?>">
                <button type="button" class="btn btn-primary">Atualizar</button>
            </a>
            </td>       
        </tr>
    <?php
    } //while($linha = $cmd->fetch())
?>
    </table>
    <br>
    <a href="../categoria/cadastroCategoria.php">
    <button type="button" class="btn btn-secondary">Voltar para tela de cadastro</button>
    </a> 
</div>   
<br>
    </body>
    </html>