<?php
    //comunicar com o banco
    include "../config/config.php";

    //VER SE ESTAMOS NO SERVIDOR RECEBENDO UM METODO DE REQUISICAO DO TIPO POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //receber as informacoes do formulario pelo metodo post
        $titulo = $_POST['titulo'];
        $autor = $_POST['autor'];
        $genero = $_POST['genero'];
        $faixa_etaria = $_POST['faixa_etaria'];
        echo 'titulo: '.$titulo.'| autor: '.$autor.'| genero: '.$genero.'| faixa_etaria: '.$faixa_etaria ;

        //tentar realizar
        try {
            $sql = "INSERT INTO livros(titulo, autor, genero, faixa_etaria) VALUE ('$titulo', '$autor', '$genero', '$faixa_etaria')";
            $inserir = $pdo->prepare($sql);
            $inserir->execute();
            echo"<br>usuario cadastrado com sucesso!";
            header("Location: ../index.php?page=lista_livros.php") ;
            exit();
        } catch (PDOException $e) {
            echo 'erro ao cadastrar'.$e->getMessage();
        }
    }else {
        header("Location: ../index.php");
        exit();
    }


