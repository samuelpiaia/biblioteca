<?php 
    include("config/config.php");

    $sql = "SELECT * FROM produtos ORDER BY id DESC";
    $consulta = $pdo->query($sql);
    
    // CORREÇÃO: Usar fetchAll() para retornar todos os registros, não apenas um
    $produtos = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Cabeçalho da Página de Produtos -->
<div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
    <div>
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-1">Produtos</h2>
        <p class="text-estokei-textMuted text-sm">Gerencie o seu catálogo, preços, identificadores (SKU) e localização.</p>
    </div>
    <button class="flex items-center justify-center gap-2 bg-estokei-accent hover:bg-estokei-accentHover text-estokei-bg font-bold py-2 px-5 rounded-full transition-all shadow-neon hover:shadow-neon-strong transform hover:-translate-y-0.5">
        <i class="ph ph-package text-lg"></i>
        <span>Novo Produto</span>
    </button>
</div>

<!-- Tabela Container Padronizada -->
<div class="bg-estokei-panel rounded-2xl border border-white/5 overflow-hidden">
    
    <!-- Barra superior da Tabela (Busca) -->
    <div class="p-6 border-b border-white/5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h3 class="text-lg font-bold text-white">Catálogo de Produtos</h3>
        <div class="relative w-full sm:w-80">
            <i class="ph ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted"></i>
            <input type="text" placeholder="Pesquisar nome, SKU ou código..." class="bg-estokei-bg border border-white/10 rounded-lg py-2 pl-9 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all placeholder-estokei-textMuted text-white w-full">
        </div>
    </div>

    <!-- Tabela Responsiva -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse min-w-[900px]">
            <thead>
                <tr class="bg-white/5 text-estokei-textMuted text-xs uppercase tracking-wider">
                    <th class="p-4 font-semibold w-16">ID</th>
                    <th class="p-4 font-semibold">Produto</th>
                    <th class="p-4 font-semibold">Identificação</th>
                    <th class="p-4 font-semibold text-right">Custo</th>
                    <th class="p-4 font-semibold text-right">Venda</th>
                    <th class="p-4 font-semibold text-center">Estq. Mín.</th>
                    <th class="p-4 font-semibold">Local</th>
                    <th class="p-4 font-semibold text-center w-24">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                
                <?php if (count($produtos) > 0): ?>
                    <?php foreach($produtos as $produto): ?>
                        <tr class="hover:bg-white/5 transition-colors group">
                            
                            <!-- ID -->
                            <td class="p-4 text-estokei-textMuted font-medium">
                                #<?php echo str_pad($produto['id'], 4, '0', STR_PAD_LEFT); ?>
                            </td>
                            
                            <!-- Nome e Descrição -->
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-lg bg-gray-800 flex items-center justify-center border border-white/10 shrink-0">
                                        <i class="ph ph-box-box text-xl text-gray-300"></i>
                                    </div>
                                    <div class="min-w-0">
                                        <p class="font-semibold text-white truncate max-w-[180px]" title="<?php echo htmlspecialchars($produto['nome']); ?>">
                                            <?php echo htmlspecialchars($produto['nome']); ?>
                                        </p>
                                        <p class="text-xs text-estokei-textMuted truncate max-w-[180px]" title="<?php echo htmlspecialchars($produto['descricao']); ?>">
                                            <?php echo htmlspecialchars($produto['descricao']); ?>
                                        </p>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Identificação (SKU e Código de Barras agrupados) -->
                            <td class="p-4">
                                <div class="flex flex-col gap-1.5">
                                    <!-- SKU Badge -->
                                    <div class="w-fit">
                                        <span class="px-2 py-0.5 bg-white/10 border border-white/20 text-white rounded text-[10px] font-bold tracking-wider uppercase">
                                            SKU: <?php echo htmlspecialchars($produto['sku']); ?>
                                        </span>
                                    </div>
                                    <!-- Barcode Badge -->
                                    <div class="flex items-center gap-1.5 text-estokei-textMuted">
                                        <i class="ph ph-barcode text-lg text-estokei-textMuted"></i>
                                        <span class="font-mono text-xs"><?php echo htmlspecialchars($produto['codigo_barra']); ?></span>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Preço de Custo -->
                            <td class="p-4 text-right text-estokei-textMuted">
                                R$ <?php echo number_format($produto['preco_custo'], 2, ',', '.'); ?>
                            </td>
                            
                            <!-- Preço de Venda (Destacado em Branco) -->
                            <td class="p-4 text-right font-medium text-white">
                                R$ <?php echo number_format($produto['preco_venda'], 2, ',', '.'); ?>
                            </td>
                            
                            <!-- Estoque Mínimo -->
                            <td class="p-4 text-center">
                                <span class="px-2 py-1 bg-estokei-warning/10 text-estokei-warning border border-estokei-warning/20 rounded-lg text-xs font-bold">
                                    <?php echo htmlspecialchars($produto['estoque_minimo']); ?> un
                                </span>
                            </td>

                            <!-- Localização -->
                            <td class="p-4">
                                <div class="flex items-center gap-1.5 text-estokei-textMuted text-sm whitespace-nowrap">
                                    <i class="ph ph-map-pin"></i>
                                    <?php echo htmlspecialchars($produto['localizacao']); ?>
                                </div>
                            </td>
                            
                            <!-- Ações -->
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition-opacity">
                                    <button class="p-2 rounded-lg text-estokei-textMuted hover:text-estokei-accent hover:bg-estokei-accent/10 transition-colors" title="Editar Produto">
                                        <i class="ph ph-pencil-simple text-lg"></i>
                                    </button>
                                    
                                    <button onclick="location.href='api/delete.php?table=produtos&id=<?php echo $produto['id']; ?>'"  class="p-2 rounded-lg text-estokei-textMuted hover:text-estokei-danger hover:bg-estokei-danger/10 transition-colors" title="Excluir Produto" onclick="return confirm('Tem certeza que deseja excluir o produto <?php echo htmlspecialchars($produto['nome']); ?>?');">
                                        <i class="ph ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" class="p-8 text-center text-estokei-textMuted">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="ph ph-package-x text-4xl mb-2 opacity-50"></i>
                                <p>Nenhum produto cadastrado no catálogo.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>
</div>