
            <?php
           require_once('../bd.php');
            //Captura os valores das variáveis
            $id=$_POST["id"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $preco = $_POST["preco"];
            $desconto = $_POST["desconto"];
            $categoria = $_POST["categoria"];
            $produtoAtivo=$_POST["produtoAtivo"];

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
   .href='../produto/editarProduto.php?id=$id';</script>";
   exit();

}
            if($desconto>$preco)
    {
   
        echo "<script language='javascript' type='text/javascript'>alert('O desconto é maior que o preço , tente novamente.');window.location
        .href='../produto/editarProduto.php?id=$id';</script>";
        exit();

    }
           
            
                
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE PRODUTO set PRODUTO_NOME ='{$nome}', PRODUTO_DESC='{$descricao}', PRODUTO_PRECO='{$preco}', CATEGORIA_ID='{$categoria}',PRODUTO_DESCONTO='{$desconto}',PRODUTO_ATIVO={$produtoAtivo} WHERE PRODUTO_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "<script language='javascript' type='text/javascript'>alert('Produto atualizado com sucesso');window.location
                .href='../produto/listarProduto.php';</script>";
            } 
            else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar um produto, tente novamente');window.location
                .href='../produto/editarProduto.php';</script>";
            }


?>
   