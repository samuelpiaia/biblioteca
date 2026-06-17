<?php
    include "config/config.php";
    
    $sql = "SELECT * FROM livros ORDER BY id_livro DESC";
    $consulta = $pdo->query($sql);
    $livros = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
    <div>
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-1">Livros</h2>
        <p class="text-estokei-textMuted text-sm">Gerencie o acervo, disponibilidade e detalhes dos livros.</p>
    </div>
    <button class="flex items-center justify-center gap-2 bg-estokei-accent hover:bg-estokei-accentHover text-estokei-bg font-bold py-2 px-5 rounded-full transition-all shadow-neon hover:shadow-neon-strong transform hover:-translate-y-0.5">
        <i class="ph ph-book-open text-lg"></i>
        <span>Novo Livro</span>
    </button>
</div>

<div class="bg-estokei-panel rounded-2xl border border-white/5 overflow-hidden">
    
    <div class="p-6 border-b border-white/5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h3 class="text-lg font-bold text-white">Lista de Livros</h3>
        <div class="relative w-full sm:w-64">
            <i class="ph ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted"></i>
            <input type="text" placeholder="Pesquisar livro..." class="bg-estokei-bg border border-white/10 rounded-lg py-2 pl-9 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all placeholder-estokei-textMuted text-white w-full">
        </div>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5 text-estokei-textMuted text-xs uppercase tracking-wider">
                    <th class="p-4 font-semibold w-20">ID</th>
                    <th class="p-4 font-semibold">Título</th>
                    <th class="p-4 font-semibold">Autor</th>
                    <th class="p-4 font-semibold">Gênero</th>
                    <th class="p-4 font-semibold text-center">Faixa Etária</th>
                    <th class="p-4 font-semibold text-center">Disponível</th>
                    <th class="p-4 font-semibold">Data Devolução</th>
                    <th class="p-4 font-semibold text-center">Likes</th>
                    <th class="p-4 font-semibold text-center w-24">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                
                <?php if (count($livros) > 0): ?>
                    <?php foreach ($livros as $livro): ?>
                        <tr class="hover:bg-white/5 transition-colors">
                            
                            <td class="p-4 text-estokei-textMuted font-medium">
                                #<?php echo str_pad($livro['id_livro'], 4, '0', STR_PAD_LEFT); ?>
                            </td>
                            
                            <td class="p-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center border border-white/10 shrink-0">
                                    <i class="ph ph-book text-xl text-gray-300"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-white"><?php echo htmlspecialchars($livro['titulo']); ?></p>
                                </div>
                            </td>
                            
                            <td class="p-4 text-estokei-textMuted">
                                <?php echo htmlspecialchars($livro['autor']); ?>
                            </td>
                            
                            <td class="p-4 text-estokei-textMuted">
                                <?php echo htmlspecialchars($livro['genero']); ?>
                            </td>
                            
                            <td class="p-4 text-center text-estokei-textMuted font-medium">
                                <?php echo htmlspecialchars($livro['faixa_etaria']); ?>
                            </td>
                            
                            <td class="p-4 text-center">
                                <?php 
                                    // Simulação de lógica para badge de disponibilidade
                                    $disponivel = strtolower(trim($livro['disponivel']));
                                    if ($disponivel == 'sim' || $disponivel == '1') {
                                        $badgeClass = 'bg-estokei-accent/10 text-estokei-accent border-estokei-accent/20';
                                        $textoDisp = 'Sim';
                                    } else {
                                        $badgeClass = 'bg-estokei-warning/10 text-estokei-warning border-estokei-warning/20';
                                        $textoDisp = 'Não';
                                    }
                                ?>
                                <span class="px-3 py-1 rounded-full text-xs font-bold border inline-block <?php echo $badgeClass; ?>">
                                    <?php echo $textoDisp; ?>
                                </span>
                            </td>
                            
                            <td class="p-4 text-estokei-textMuted">
                                <?php 
                                    if (!empty($livro['data_devolucao'])) {
                                        echo date('d/m/Y', strtotime($livro['data_devolucao'])); 
                                    } else {
                                        echo '-';
                                    }
                                ?>
                            </td>
                            
                            <td class="p-4 text-center text-white">
                                <div class="flex items-center justify-center gap-1">
                                    <i class="ph-fill ph-heart text-red-500"></i>
                                    <span><?php echo (int)$livro['likes']; ?></span>
                                </div>
                            </td>
                            
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button class="p-2 rounded-lg text-estokei-textMuted hover:text-estokei-accent hover:bg-estokei-accent/10 transition-colors" title="Editar">
                                        <i class="ph ph-pencil-simple text-lg"></i>
                                    </button>
                                    
                                    <button onclick="if(confirm('Tem certeza que deseja excluir o livro <?php echo addslashes($livro['titulo']); ?>?')) location.href='api/delete.php?id=<?php echo $livro['id_livro']; ?>'" class="p-2 rounded-lg text-estokei-textMuted hover:text-estokei-danger hover:bg-estokei-danger/10 transition-colors" title="Excluir">
                                        <i class="ph ph-trash text-lg"></i>
                                    </button>

                                    <button onclick="location.href='api/emprestar.php?id=<?php echo $livro['id_livro']; ?>&tempo=15'" class="p-2 rounded-lg text-estokei-textMuted hover:text-estokei-danger hover:bg-estokei-danger/10 transition-colors" title="sobre">
                                        <i class="ph ph-eye text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="p-8 text-center text-estokei-textMuted">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="ph ph-books text-4xl mb-2"></i>
                                <p>Nenhum livro cadastrado no acervo.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>
</div>