<html>
    <head>
        <title>Lista de produtos completa</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="lista.css">
    </head>
<body>
<?php
require_once('../bd.php');

//Monta o comando de Inserção no Banco
$cmd = $pdo->query("SELECT P.PRODUTO_ID,C.CATEGORIA_ID,C.CATEGORIA_NOME,P.PRODUTO_NOME,P.PRODUTO_PRECO,P.PRODUTO_DESCONTO,P.PRODUTO_ATIVO,PQ.PRODUTO_QTD,PM.IMAGEM_ID,PM.IMAGEM_URL
                    FROM PRODUTO P
                    INNER JOIN CATEGORIA C
                    ON P.CATEGORIA_ID=C.CATEGORIA_ID
                    INNER JOIN PRODUTO_ESTOQUE PQ
                    ON P.PRODUTO_ID = PQ.PRODUTO_ID
                    LEFT JOIN PRODUTO_IMAGEM PM
                    ON P.PRODUTO_ID=PM.PRODUTO_ID
                       AND PM.IMAGEM_ORDEM =0
                       ORDER BY PRODUTO_ID");


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
        <a class="nav-link" href="../adm/listarAdm.php">Administrador<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../produto/listarProduto.php">Produto<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../categoria/listarCategoria.php">Categoria<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../estoque/listarEstoque.php">Estoque<span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../imagem/listarImg.php">Imagem<span class="sr-only">(current)</span></a>
      </li>
     
    </ul>
  </div>
</nav>
<br>
    
<div class="container">
<h1>Listar os Produtos</h1>

    <table class="table table-striped">
        <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Desconto</th>
            <th>Preço Final</th>
            <th>Quantidade</th>
            <th>Ativo/Desativado</th>
            <th>Imagens</th>
                    
        </tr>
 <?php
    //Lista os produtos com seus respectivos atributos
    while($linha = $cmd->fetch()){
?>
        <tr>
            <td>
                <?php
                    echo $linha["PRODUTO_ID"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_NOME"];
                ?>                
            </td>
            <td>
                <?php
                    echo $linha["CATEGORIA_NOME"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_PRECO"];
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_DESCONTO"];
                ?>
            </td>
            <td>
                 <?php
                    echo ($linha["PRODUTO_PRECO"]-$linha["PRODUTO_DESCONTO"]);
                ?>
            </td>
            <td>
                <?php
                    echo $linha["PRODUTO_QTD"];
                ?>
            </td>
            <td>
                <?php
                 
                  if( $linha["PRODUTO_ATIVO"]==0){
                    echo "PRODUTO INATIVO";
                }
                else{
                    echo "PRODUTO ATIVO";
                }

            ?>
                ?>
            </td>
            <td>
                <a href="../imagem/botaoImg.php?id=<?php echo $linha["PRODUTO_ID"]; ?>">
                <button type="button" class="btn btn-secundary">Ver Imagens</button>
            </td>
           
    </tr>        


            <?php
    } //while($linha = $cmd->fetch())
?>
   </table>
    <br>
    <a href="../produto/cadastroProduto.php">
    <button type="button" class="btn btn-secondary">Voltar para tela de cadastro</button>
    </a>  
    </div>  
    <br>
    </body>
    </html>