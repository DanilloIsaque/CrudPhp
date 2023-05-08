
    

<?php
require_once('../bd.php');


$produto = $_POST["produto"];
$qtd=$_POST["qtdEstoque"];

if($qtd>2147483647)
{
    echo "<script language='javascript' type='text/javascript'>alert('Valor acima do permitido, tente novamente.');window.location
    .href='estoque/cadastroEstoque.php';</script>";
    exit();
}



$cmdtext= "INSERT INTO PRODUTO_ESTOQUE(PRODUTO_ID,PRODUTO_QTD) VALUES('" .$produto. "','" .$qtd. "')";
$cmd= $pdo->prepare($cmdtext);

$status= $cmd->execute();

session_start();

if($status){
    echo "<script language='javascript' type='text/javascript'>alert('Estoque Cadastrado com sucesso');window.location
    .href='estoque/listarEstoque.php';</script>";
} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao Cadastrar o estoque de algum produto, tente novamente');window.location
    .href='estoque/cadastroEstoque.php';</script>";
}


?>
