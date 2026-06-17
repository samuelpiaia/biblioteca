<?php
    include "../config/config.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        $tempo = $_GET['tempo'];
        if ($tempo == '0') {
            try{
                //preparar comando de inserção no banco
                $salvar="UPDATE livros SET disponivel = 1 , data_devolucao=NULL WHERE id_livro=$id";
                $env=$pdo->prepare($salvar);
                $env->execute();
    
                //redireciona para algum lugar
                header("Location: ../index.php?page=sobre.php&id=".$id);
                exit();
            } catch(PDOException $e){
                echo "Erro: ".$e->getMessage();
            }
        } else {

        try{
            //preparar comando de inserção no banco
            $salvar="UPDATE livros SET disponivel = 0 , data_devolucao=DATE_ADD(NOW(), INTERVAL $tempo DAY) WHERE id_livro=$id";
            $env=$pdo->prepare($salvar);
            $env->execute();

            //redireciona para algum lugar
            header("Location: ../index.php?page=sobre.php&id=".$id);
            exit();
        } catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }
}
?>