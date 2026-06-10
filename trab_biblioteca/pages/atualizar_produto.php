<?php
    include("config/config.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM fornecedores WHERE id=$id";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();

        $fornecedor = $consulta->fetch(PDO::FETCH_ASSOC);


    }
?>