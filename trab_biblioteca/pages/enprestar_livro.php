<?php
    include "config/config.php";
    
    // Mantendo sua lógica de trazer apenas os indisponíveis
    $sql = "SELECT * FROM livros WHERE disponivel = false ORDER BY data_devolucao ASC";
    $consulta = $pdo->query($sql);
    $livros = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
    <div>
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-1">Livros Emprestados</h2>
        <p class="text-estokei-textMuted text-sm">Controle de obras que estão fora do acervo e suas respectivas datas de retorno.</p>
    </div>
    
    <div class="bg-white/5 border border-white/10 rounded-xl px-4 py-2 text-sm text-estokei-textMuted">
        Total Emprestado: <span class="text-estokei-warning font-bold"><?php echo count($livros); ?></span>
    </div>
</div>

<div class="bg-estokei-panel rounded-2xl border border-white/5 overflow-hidden">
    
    <div class="p-6 border-b border-white/5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h3 class="text-lg font-bold text-white">Controle de Devoluções</h3>
        <div class="relative w-full sm:w-64">
            <i class="ph ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted"></i>
            <input type="text" placeholder="Pesquisar livro emprestado..." class="bg-estokei-bg border border-white/10 rounded-lg py-2 pl-9 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all placeholder-estokei-textMuted text-white w-full">
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
                    <th class="p-4 font-semibold text-center">Classificação</th>
                    <th class="p-4 font-semibold text-center">Status</th>
                    <th class="p-4 font-semibold">Previsão de Devolução</th>
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
                                    <i class="ph ph-book-bookmark text-xl text-estokei-warning"></i>
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
                                <span class="px-3 py-1 rounded-full text-xs font-bold border inline-block bg-estokei-warning/10 text-estokei-warning border-estokei-warning/20">
                                    Emprestado
                                </span>
                            </td>
                            
                            <td class="p-4 text-white font-medium">
                                <div class="flex items-center gap-2">
                                    <i class="ph ph-calendar-blank text-estokei-textMuted"></i>
                                    <span>
                                        <?php 
                                            if (!empty($livro['data_devolucao'])) {
                                                echo date('d/m/Y', strtotime($livro['data_devolucao'])); 
                                            } else {
                                                echo '<span class="text-estokei-textMuted italic">Não informada</span>';
                                            }
                                        ?>
                                    </span>
                                </div>
                            </td>
                            
                            <td class="p-4 text-center text-white">
                                <div class="flex items-center justify-center gap-1">
                                    <i class="ph-fill ph-heart text-red-500"></i>
                                    <span><?php echo (int)$livro['likes']; ?></span>
                                </div>
                            </td>
                            
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <button onclick="location.href='index.php?page=sobre.php&id=<?php echo $livro['id_livro']; ?>'" class="p-2 rounded-lg text-estokei-textMuted hover:text-white hover:bg-white/5 transition-colors" title="Visualizar Detalhes">
                                        <i class="ph ph-eye text-lg"></i>
                                    </button>
                                    <button onclick="location.href='api/emprestar.php?id=<?php echo $livro['id_livro']; ?>&tempo=0'" class="p-2 rounded-lg text-estokei-textMuted hover:text-white hover:bg-white/5 transition-colors" title="Visualizar Detalhes">
                                        <i class="ph ph-arrow-arc-left"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="9" class="p-8 text-center text-estokei-textMuted">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="ph ph-check-square text-4xl mb-2 text-estokei-accent"></i>
                                <p class="text-white font-semibold">Tudo em ordem!</p>
                                <p class="text-xs">Nenhum livro encontra-se emprestado ou fora do acervo no momento.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>
</div>