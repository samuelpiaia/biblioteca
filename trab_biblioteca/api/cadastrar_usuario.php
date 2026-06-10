<?php
    //comunicar com o banco
    include "../config/config.php";

    //VER SE ESTAMOS NO SERVIDOR RECEBENDO UM METODO DE REQUISICAO DO TIPO POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //receber as informacoes do formulario pelo metodo post
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];
        echo'Nome: '.$nome.'| Email '.$email.'| Senha: '.$senha.'| Tipo: '.$tipo ;

        //tentar realizar
        try {
            $sql = "INSERT INTO usuarios(nome, email, senha_hash, perfil) VALUE ('$nome', '$email', '$senha', '$tipo')";
            $inserir = $pdo->prepare($sql);
            $inserir->execute();
            echo"<br>usuario cadastrado com sucesso!";
            header("Location: ../index.php?page=lista_usuarios.php") ;
            exit();
        } catch (PDOException $e) {
            echo 'erro ao cadastrar'.$e->getMessage();
        }
    }else {
        header("Location: ../index.php");
        exit();
    }





?>