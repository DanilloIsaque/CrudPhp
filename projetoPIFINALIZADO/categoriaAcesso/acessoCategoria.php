

<?php
//Dados para conexao ao MySQL → MySQL
require_once('../bd.php');

//Captura o post do Usuario
$nome = $_POST["nome"];
$descricao = $_POST["descricao"];
$categoriaAtivo=$_POST["categoriaAtivo"];

if($categoriaAtivo == "true")
{
    $categoria = true;
}
else{
    $categoria = false;
 
}

session_start();


$cmdtext = "INSERT INTO CATEGORIA (CATEGORIA_NOME, CATEGORIA_DESC,CATEGORIA_ATIVO) VALUES('" .$nome. "','" .$descricao. "'," .$categoriaAtivo. ")";
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>alert('Categoria cadastrada com sucesso');window.location
    .href='../categoria/listarCategoria.php';</script>";
} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar uma categoria, tente novamente');window.location
    .href='../categoria/cadastroCategoria.php';</script>";
}

?>


