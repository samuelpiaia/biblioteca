<?php
    include "config/config.php";
    
    $sql="SELECT * FROM livros ORDER BY id DESC";
    $consulta=$pdo->query($sql);
    $livros=$consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<div>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>titulo</th>
                <th>autor</th>
                <th>genero</th>
                <th>faixa_etaria</th>
                <th>disponivel</th>
                <th>datade de volucao</th>
                <th>likes</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livros as $livro): ?>
                <td>#<?php echo $livro['id']; ?></td>
                <td><?php echo $livro['titulo']; ?></td>
                <td><?php echo $livro['autor']; ?></td>
                <td><?php echo $livro['genero']; ?></td>
                <td><?php echo $livro['faixa_etaria']; ?></td>
                <td><?php echo $livro['disponivel']; ?></td>
                <td><?php echo $livro['data_devolucao']; ?></td>
                <td><?php echo $livro['likes']; ?></td>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>