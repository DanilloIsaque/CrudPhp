

            <?php
           require_once('../bd.php');

            //Captura os valores das variáveis
            $id=$_POST["id"];
            $qtd=$_POST["qtdEstoque"];
            if($qtd>2147483647)
            {
                echo "<script language='javascript' type='text/javascript'>alert('Preço ou desconto acima do permitido, tente novamente.');window.location
                .href='estoque/editarEstoque.php?id=$id';</script>";
                exit();
            }
        
            
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE PRODUTO_ESTOQUE set PRODUTO_QTD ='{$qtd}' WHERE PRODUTO_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            session_start();

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "<script language='javascript' type='text/javascript'>alert('Estoque atualizado com sucesso');window.location
                .href='estoque/listarEstoque.php';</script>";
            } 
            else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar um estoque, tente novamente');window.location
                .href='estoque/editarEstoque.php';</script>";
            }


?>
