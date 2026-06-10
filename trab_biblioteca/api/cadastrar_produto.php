<?php
    //comunicar com o banco
    include "../config/config.php";

    //VER SE ESTAMOS NO SERVIDOR RECEBENDO UM METODO DE REQUISICAO DO TIPO POST
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //receber as informacoes do formulario pelo metodo post
        $codigo_barras = $_POST['codigo_barras'];
        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $estoque_minimo = $_POST['estoque_minimo'];
        $preco_custo = $_POST['preco_custo'];
        $preco_venda = $_POST['preco_venda'];
        $localizacao = $_POST['localizacao'];
        $sku = $_POST['sku'];
        
        echo'| codigo_barras:  '.$codigo_barras.'| nome: '.$nome.'| descricao:  '.$descricao.'| estoque_minimo:  '.$estoque_minimo.'| preco_custo:  '.$preco_custo.'| preco_venda:  '.$preco_venda.'| localizacao:  '.$localizacao.'| sku:  '.$sku;

        //tentar realizar
        try {
            $sql = "INSERT INTO produtos(sku, codigo_barras, nome, descricao, estoque_minimo, preco_custo, preco_venda, localizacao) VALUE ('$sku','$codigo_barras','$nome','$descricao','$estoque_minimo','$preco_custo','$preco_venda','$localizacao')";
            $inserir = $pdo->prepare($sql);
            $inserir->execute();
            echo"<br>fornecedor cadastrado com sucesso!";
            header("Location: ../index.php?page=lista_produtos.php") ;
            exit();
        } catch (PDOException $e) {
            echo 'erro ao cadastrar'.$e->getMessage();
        }
    }else {
        header("Location: ../index.php");
        exit();
    }





?>