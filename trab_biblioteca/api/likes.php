<?php
    include "../config/config.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id']; 


        $sql="SELECT * FROM livros ORDER BY id DESC";
        $consulta=$pdo->query($sql);
        $livros=$consulta->fetchAll(PDO::FETCH_ASSOC);
        $likes=$livros["likes"];

        $adicionar=$likes+1;

        try{
            //preparar comando de inserção no banco
            $salvar="UPDATE livros SET likes = '$likes' WHERE id=$id";
            $env=$pdo->prepare($salvar);
            $env->execute();

            //redireciona para algum lugar
            header("Location: ../../index.php?page=atualizar_alunos.php");
            exit();
        } catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>