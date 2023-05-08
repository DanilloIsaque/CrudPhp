

<?php
require_once('../bd.php');
//Captura os valores das variáveis
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$preco = $_POST["preco"];
$desconto = $_POST["desconto"]; 
$categoria = $_POST["categoria"];
$produtoAtivo=$_POST["produtoAtivo"];

session_start();

if($produtoAtivo == "true")
{
    $produto = true;
}
else{
    $produto = false;
 
}
if($preco>99999.99 || $desconto>99999.99)
{
   
   echo "<script language='javascript' type='text/javascript'>alert('Preço ou desconto acima do permitido, tente novamente.');window.location
   .href='../produto/cadastroProduto.php';</script>";
   exit();

}
if($desconto>$preco)
{
   
   echo "<script language='javascript' type='text/javascript'>alert('O desconto é maior que o preço , tente novamente.');window.location
   .href='../produto/cadastroProduto.php';</script>";
   exit();

}



//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO PRODUTO (PRODUTO_NOME, PRODUTO_DESC, PRODUTO_PRECO , PRODUTO_DESCONTO , CATEGORIA_ID, PRODUTO_ATIVO) VALUES
('" . $nome . "','" . $descricao . "','" .$preco. "','" .$desconto."','" .$categoria."',".$produtoAtivo.")" ;
$cmd = $pdo->prepare($cmdtext) ;

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();


if($status){
    echo "<script language='javascript' type='text/javascript'>alert('Produto cadastrado com sucesso!!!');window.location
    .href='../produto/listarProduto.php';</script>";
    

} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar produto, tente novamente');window.location
    .href='../produto/cadastrarProduto.php';</script>";
}

?>


