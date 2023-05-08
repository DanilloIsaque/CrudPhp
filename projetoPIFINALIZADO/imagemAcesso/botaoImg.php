<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Imagens do Produto</title>
</head>
<body>
<h1>Imagens do Produto</h1>
    
<?php
require_once('../bd.php');


  
    
    $id = $_GET["id"];
    


    
    $admin = $pdo->query("SELECT P.PRODUTO_ID,PM.PRODUTO_ID,PM.IMAGEM_ID,PM.IMAGEM_URL,PM.IMAGEM_ORDEM
     FROM PRODUTO P
     INNER JOIN PRODUTO_IMAGEM PM
     ON P.PRODUTO_ID=PM.PRODUTO_ID
     WHERE P.PRODUTO_ID=" . $id /*. " ORDER BY IMAGEM_ORDEM" */);


    
   // $imagem = $admin["IMAGEM_URL"];
    //while(true){
    //echo "<a href='link'><img src='$imagem' width='300' height='400' /></a>";
    //}
    
   
    //Lista os admins
    while($linha = $admin->fetch()){
      $imagem=$linha["IMAGEM_URL"];
?>
     <table class="table table-striped">
        <tr>
            <th>Id da imagem</th>
            <th>Imagem</th>
            <th>Ordem</th>  
            <th>Editar</th>  
            
        </tr>
        <tr>
        <td>
                 <?php
                    echo $linha["IMAGEM_ID"];
                ?>
            </td>  
            <td>
                 <?php
                   echo "<a href=''><img src='$imagem' width='100' height='100' /></a>";
                ?>
            </td>    
            <td>
                 <?php
                    echo $linha["IMAGEM_ORDEM"];
                ?>
            </td>  
            
            <td>
                <a href="imagem/editarImg.php?id=<?php echo $linha["IMAGEM_ID"] ?>">
                <button type="button" class="btn btn-primary">Atualizar</button>
            </a>
            </td>
              
        </tr>
    
        <?php } ?>
        </table>
      </p>
    <a href="produto/listarProdutoCompleto.php" class="btn btn-primary">Voltar</a>
  </div>
</div>

</div>


</body>
</html>

    
    <!--$imagem = $admin["IMAGEM_URL"];
    
    //echo "<a href='link'><img src='$imagem' width='300' height='400' /></a>";
    