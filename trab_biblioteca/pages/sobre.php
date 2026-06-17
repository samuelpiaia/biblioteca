<?php
    include "config/config.php";

    $livro = null;
    
    if (isset($_GET['id'])) {
        $id = $_GET['id']; 

        // CORREÇÃO DE SEGURANÇA: Utilizando prepare() e execute() para evitar SQL Injection
        $sql = "SELECT * FROM livros WHERE id_livro = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(['id' => $id]);
        $livro = $stmt->fetch(PDO::FETCH_ASSOC);
    }
?>

<div class="mb-6">
    <a href="javascript:history.back()" class="inline-flex items-center gap-2 text-estokei-textMuted hover:text-white transition-colors text-sm font-medium">
        <i class="ph ph-arrow-left text-lg"></i>
        <span>Voltar para a lista</span>
    </a>
</div>

<?php if ($livro): ?>
    <div class="mb-6 flex flex-col sm:flex-row sm:justify-between sm:items-start gap-4">
        <div class="flex items-center gap-4">
            <div class="w-16 h-16 rounded-xl bg-estokei-accent/10 flex items-center justify-center border border-estokei-accent/20 shrink-0">
                <i class="ph ph-book-open text-3xl text-estokei-accent"></i>
            </div>
            <div>
                <h2 class="text-2xl sm:text-3xl font-bold text-white mb-1"><?php echo htmlspecialchars($livro['titulo']); ?></h2>
                <p class="text-estokei-textMuted flex items-center gap-2">
                    <i class="ph ph-hash"></i> ID do Acervo: <?php echo str_pad($livro['id_livro'], 4, '0', STR_PAD_LEFT); ?>
                </p>
            </div>
        </div>
        
        <button class="flex items-center justify-center gap-2 bg-white/5 hover:bg-white/10 border border-white/10 text-white font-medium py-2 px-4 rounded-lg transition-all">
            <i class="ph ph-pencil-simple"></i>
            <span>Editar Livro</span>
        </button>
    </div>

    <div class="bg-estokei-panel rounded-2xl border border-white/5 overflow-hidden p-6 sm:p-8">
        <h3 class="text-lg font-bold text-white mb-6 border-b border-white/5 pb-4">Informações da Obra</h3>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <div class="flex flex-col gap-1">
                <span class="text-xs uppercase tracking-wider text-estokei-textMuted font-semibold">Autor</span>
                <span class="text-white font-medium text-base"><?php echo htmlspecialchars($livro['autor']); ?></span>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-xs uppercase tracking-wider text-estokei-textMuted font-semibold">Gênero Literário</span>
                <span class="text-white font-medium text-base"><?php echo htmlspecialchars($livro['genero']); ?></span>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-xs uppercase tracking-wider text-estokei-textMuted font-semibold">Classificação</span>
                <span class="text-white font-medium text-base"><?php echo htmlspecialchars($livro['faixa_etaria']); ?></span>
            </div>

            <div class="flex flex-col gap-2">
                <span class="text-xs uppercase tracking-wider text-estokei-textMuted font-semibold">Status de Disponibilidade</span>
                <div>
                    <?php 
                        $disponivel = strtolower(trim($livro['disponivel']));
                        if ($disponivel == 'sim' || $disponivel == '1') {
                            $badgeClass = 'bg-estokei-accent/10 text-estokei-accent border-estokei-accent/20';
                            $textoDisp = 'Disponível no Acervo';
                            $iconDisp = 'ph-check-circle';
                        } else {
                            $badgeClass = 'bg-estokei-warning/10 text-estokei-warning border-estokei-warning/20';
                            $textoDisp = 'Emprestado / Indisponível';
                            $iconDisp = 'ph-warning-circle';
                        }
                    ?>
                    <span class="px-3 py-1.5 rounded-lg text-sm font-bold border inline-flex items-center gap-2 <?php echo $badgeClass; ?>">
                        <i class="ph <?php echo $iconDisp; ?> text-lg"></i>
                        <?php echo $textoDisp; ?>
                    </span>
                </div>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-xs uppercase tracking-wider text-estokei-textMuted font-semibold">Data Prevista de Devolução</span>
                <span class="text-white font-medium text-base">
                    <?php 
                        if (!empty($livro['data_devolucao'])) {
                            echo date('d/m/Y', strtotime($livro['data_devolucao'])); 
                        } else {
                            echo '<span class="text-estokei-textMuted italic">Não se aplica</span>';
                        }
                    ?>
                </span>
            </div>

            <div class="flex flex-col gap-1">
                <span class="text-xs uppercase tracking-wider text-estokei-textMuted font-semibold">Popularidade</span>
                <div class="flex items-center gap-2 text-white font-medium text-base">
                    <i onclick="location.href='api/likes.php?id=<?php echo $livro['id_livro']; ?>&tipo=1'" style="cursor: pointer;" class="ph-fill ph-thumbs-up text-green-500 text-xl"></i>
                    <span><?php echo (int)$livro['likes']; ?> curtidas</span>
                    <i onclick="location.href='api/likes.php?id=<?php echo $livro['id_livro']; ?>&tipo=0'" style="cursor: pointer;" class="ph-fill ph-thumbs-down text-red-500 text-xl"></i>
                </div>
            </div>


            <?php if ($livro['disponivel'] == 1) { ?>
            <div class="flex flex-col gap-1">
                <span class="text-xs uppercase tracking-wider text-estokei-textMuted font-semibold">alugar</span>
                <div class="flex items-center gap-2 text-white font-medium text-base">
                <button onclick="location.href='api/emprestar.php?id=<?php echo $livro['id_livro']; ?>&tempo=15'" class="p-2 rounded-lg text-estokei-textMuted hover:text-white hover:bg-white/5 transition-colors" title="Visualizar Detalhes">
                    <i class="ph ph-book text-lg"></i>15 dias
                </button>

                <button onclick="location.href='api/emprestar.php?id=<?php echo $livro['id_livro']; ?>&tempo=30'" class="p-2 rounded-lg text-estokei-textMuted hover:text-white hover:bg-white/5 transition-colors" title="Visualizar Detalhes">
                    <i class="ph ph-book text-lg"></i>30 dias
                </button>

                <button onclick="location.href='api/emprestar.php?id=<?php echo $livro['id_livro']; ?>&tempo=60'" class="p-2 rounded-lg text-estokei-textMuted hover:text-white hover:bg-white/5 transition-colors" title="Visualizar Detalhes">
                    <i class="ph ph-book text-lg"></i>60 dias
                </button>

                </div>
            </div>
            <?php } ?>
            
        </div>
    </div>

<?php else: ?>
    <div class="bg-estokei-panel rounded-2xl border border-white/5 p-12 text-center">
        <div class="flex flex-col items-center justify-center gap-4">
            <div class="w-20 h-20 rounded-full bg-white/5 flex items-center justify-center mb-2">
                <i class="ph ph-magnifying-glass-minus text-4xl text-estokei-textMuted"></i>
            </div>
            <h3 class="text-xl font-bold text-white">Livro não encontrado</h3>
            <p class="text-estokei-textMuted max-w-md mx-auto">O livro que você está tentando acessar não existe no banco de dados ou o ID informado é inválido.</p>
        </div>
    </div>
<?php endif; ?>