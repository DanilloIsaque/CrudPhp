<html>
    <head>
    <title>Cadastrar Administrador</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    </head>
    
<body>
    <h1>Cadastrar Administrador</h1>
   
<?php
require_once('../bd.php');
//Captura os valores das variáveis
$nome = $_POST["nome"];
$email = $_POST["email"];
$senha = $_POST["senha"];
$admAtivo = $_POST["admAtivo"];
if ($admAtivo == "true") {
    
    $adm=true;
}
else{

    $adm=false;
}



//Monta o comando de Inserção no Banco
$cmdtext = "INSERT INTO ADMINISTRADOR (ADM_NOME,ADM_EMAIL,ADM_SENHA,ADM_ATIVO) VALUES('" . $nome . "','" . $email . "','" .$senha . "'," .$admAtivo . ")" ;
$cmd = $pdo->prepare($cmdtext);

//Executa o comando e verifica se teve sucesso
$status = $cmd->execute();
if($status){
    echo "<script language='javascript' type='text/javascript'>alert('administrador cadastrado com sucesso');window.location
    .href='../adm/listarAdm.php';</script>";
} 
else {
    echo "<script language='javascript' type='text/javascript'>alert('Erro ao cadastrar um administrador, tente novamente');window.location
    .href='../adm/cadastroAdm.php';</script>";
}
?>

