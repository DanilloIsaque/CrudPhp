<?php
require_once('../bd.php');

//Captura o post do Usuario
$email = $_POST["email"];
$senha = $_POST["senha"];
$desativado = 0;

  // Inicia a sessao
  session_start();//area de memoria do servidor
    
//Realiza uma Query SQL para buscar o administrador que tenha o EMAIL e a SENHA passado pelo Usuario
$admin = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL='" . $email . "' AND ADM_SENHA='" . $senha . "'")->fetchAll();
//Realiza uma Query SQL para buscar o administrador está desativado
$consultaDesativo = $pdo->query("SELECT * FROM ADMINISTRADOR WHERE ADM_EMAIL='" . $email . "' AND ADM_SENHA='" . $senha . "'AND ADM_ATIVO='" . $desativado ."'")->fetchAll();

if ($consultaDesativo==true) {
    echo "<script language='javascript' type='text/javascript'>alert('Usuário inativo no momento');window.location
    .href='../loginAdm.php';</script>";
}
else
{
    if(count($admin)==0){
        echo "<script language='javascript' type='text/javascript'>alert('Usuário ou senha inválidos');window.location
        .href='../loginAdm.php';</script>";
        
    
    }
     else {
        echo "<script language='javascript' type='text/javascript'>alert('Login efetuado com sucesso!');window.location
        .href='../menuAdm.php?id=". $admin[0]["ADM_ID"]. "';</script>";
    
        $_SESSION["logado"] = true;
        $_SESSION["id"]=$admin[0]["ADM_ID"];
      
    }
}


?>
