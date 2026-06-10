<?php 
    include("../config/config.php");

    // VERIFICAR SE RECEBEMOS A TABELA E O ID DE EXCLUSAO

    if (isset($_GET['table']) && isset($_GET['id'])) {
        $table = $_GET['table'];
        $id = $_GET['id']; 

        try {
            $delete = "DELETE FROM $table WHERE id = $id";
            $comando = $pdo->prepare("$delete");
            $comando->execute();


            header("location: ../index.php?page=lista_".$table.".php");

        } catch (PDOException $e) {
            echo "deu erro";
        }
    }
?>