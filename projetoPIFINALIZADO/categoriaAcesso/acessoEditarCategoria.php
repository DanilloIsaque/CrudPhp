

            <?php
           require_once('../bd.php');
            //Captura os valores das variáveis
            $id=$_POST["id"];
            $nome = $_POST["nome"];
            $descricao = $_POST["descricao"];
            $categoriaAtivo=$_POST["categoriaAtivo"];
            if ($categoriaAtivo=="true") {
                
                $categoria=true;
            }
            else{
                $categoria=false;
            }
            
           session_start();
            
                
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE CATEGORIA set CATEGORIA_NOME ='{$nome}', CATEGORIA_DESC='{$descricao}',CATEGORIA_ATIVO={$categoriaAtivo} WHERE CATEGORIA_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "<script language='javascript' type='text/javascript'>alert('Categoria atualizada com sucesso');window.location
                .href='../categoria/listarCategoria.php';</script>";
            } 
            else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar uma categoria, tente novamente');window.location
                .href='../categoria/editarCategoria.php';</script>";
            }

?>
 