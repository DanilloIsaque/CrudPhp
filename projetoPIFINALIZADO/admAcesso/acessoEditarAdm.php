

            <?php
        require_once('../bd.php');
            //Captura os valores das variáveis
            $id=$_POST["id"];
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $senha = $_POST["senha"];
            $admAtivo=$_POST["admAtivo"];

            session_start();
           
            
                
            //Monta o comando de Inserção no Banco
            $cmdtext = "UPDATE ADMINISTRADOR set ADM_NOME ='{$nome}', ADM_EMAIL='{$email}', ADM_SENHA='{$senha}',ADM_ATIVO={$admAtivo} WHERE ADM_ID='{$id}'";
            
            $cmd = $pdo->prepare($cmdtext);

            //Executa o comando e verifica se teve sucesso
            $status = $cmd->execute();
            if($status){
                echo "<script language='javascript' type='text/javascript'>alert('Administrador atualizado com sucesso');window.location
                .href='../adm/listarAdm.php';</script>";
            } 
            else {
                echo "<script language='javascript' type='text/javascript'>alert('Erro ao atualizar um administrador, tente novamente');window.location
                .href='../adm/editarAdm.php';</script>";
            }

?>
