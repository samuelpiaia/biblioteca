<?php
    include "../config/config.php";

    if (isset($_GET['id'])) {
        $id = $_GET['id']; 
        $tipo = $_GET['tipo'];


        $sql="SELECT * FROM livros where id_livro=$id";
        $consulta=$pdo->query($sql);
        $livros=$consulta->fetch(PDO::FETCH_ASSOC);
        $likes=$livros["likes"];
        
        if ($tipo== "1") {
            $quantidade=$likes+1; 
        }
        else{
            $quantidade=$likes-1;
        }
        
        try{
            //preparar comando de inserção no banco
            $salvar="UPDATE livros SET likes = $quantidade WHERE id_livro=$id";
            $env=$pdo->prepare($salvar);
            $env->execute();

            //redireciona para algum lugar
            header("Location: ../index.php?page=sobre.php&id=".$id);
            exit();
        } catch(PDOException $e){
            echo "Erro: ".$e->getMessage();
        }
    }
?>