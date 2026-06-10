<?php 
    include("config/config.php");

    $sql = "SELECT * FROM usuarios ORDER BY id DESC";
    $consulta = $pdo->query($sql);
    
    // CORREÇÃO: Usar fetchAll() em vez de fetch() para pegar todos os registros do banco de dados
    $usuarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Cabeçalho da Página de Usuários -->
<div class="mb-8 flex flex-col sm:flex-row sm:justify-between sm:items-end gap-4">
    <div>
        <h2 class="text-2xl sm:text-3xl font-bold text-white mb-1">Usuários</h2>
        <p class="text-estokei-textMuted text-sm">Gerencie os acessos, permissões e perfis do sistema.</p>
    </div>
    <button class="flex items-center justify-center gap-2 bg-estokei-accent hover:bg-estokei-accentHover text-estokei-bg font-bold py-2 px-5 rounded-full transition-all shadow-neon hover:shadow-neon-strong transform hover:-translate-y-0.5">
        <i class="ph ph-user-plus text-lg"></i>
        <span>Novo Usuário</span>
    </button>
</div>

<!-- Tabela Container Padronizada -->
<div class="bg-estokei-panel rounded-2xl border border-white/5 overflow-hidden">
    
    <!-- Barra superior da Tabela (Busca) -->
    <div class="p-6 border-b border-white/5 flex flex-col sm:flex-row sm:justify-between sm:items-center gap-4">
        <h3 class="text-lg font-bold text-white">Lista de Cadastros</h3>
        <div class="relative w-full sm:w-64">
            <i class="ph ph-magnifying-glass absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted"></i>
            <input type="text" placeholder="Pesquisar usuário..." class="bg-estokei-bg border border-white/10 rounded-lg py-2 pl-9 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all placeholder-estokei-textMuted text-white w-full">
        </div>
    </div>

    <!-- Tabela Responsiva -->
    <div class="overflow-x-auto">
        <table class="w-full text-left border-collapse">
            <thead>
                <tr class="bg-white/5 text-estokei-textMuted text-xs uppercase tracking-wider">
                    <th class="p-4 font-semibold w-20">ID</th>
                    <th class="p-4 font-semibold">Usuário</th>
                    <th class="p-4 font-semibold">E-mail</th>
                    <th class="p-4 font-semibold">Perfil</th>
                    <th class="p-4 font-semibold">Data de Criação</th>
                    <th class="p-4 font-semibold text-center w-24">Ações</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-white/5 text-sm">
                
                <?php if (count($usuarios) > 0): ?>
                    <?php foreach($usuarios as $usuario): ?>
                        <tr class="hover:bg-white/5 transition-colors">
                            
                            <!-- ID -->
                            <td class="p-4 text-estokei-textMuted font-medium">
                                #<?php echo str_pad($usuario['id'], 4, '0', STR_PAD_LEFT); ?>
                            </td>
                            
                            <!-- Nome com Ícone/Avatar -->
                            <td class="p-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-gray-800 flex items-center justify-center border border-white/10">
                                    <i class="ph ph-user text-xl text-gray-300"></i>
                                </div>
                                <div>
                                    <p class="font-semibold text-white"><?php echo htmlspecialchars($usuario['nome']); ?></p>
                                </div>
                            </td>
                            
                            <!-- Email -->
                            <td class="p-4 text-estokei-textMuted">
                                <?php echo htmlspecialchars($usuario['email']); ?>
                            </td>
                            
                            <!-- Perfil (Renderizado como Badge) -->
                            <td class="p-4">
                                <?php 
                                    $perfil = strtolower($usuario['perfil']);
                                    $badgeClass = 'bg-white/10 text-white border-white/20'; // Padrão
                                    
                                    if ($perfil == 'admin' || $perfil == 'administrador') {
                                        $badgeClass = 'bg-estokei-accent/10 text-estokei-accent border-estokei-accent/20';
                                    } elseif ($perfil == 'gerente') {
                                        $badgeClass = 'bg-estokei-warning/10 text-estokei-warning border-estokei-warning/20';
                                    }
                                ?>
                                <span class="px-3 py-1 rounded-full text-xs font-bold border <?php echo $badgeClass; ?>">
                                    <?php echo htmlspecialchars($usuario['perfil']); ?>
                                </span>
                            </td>
                            
                            <!-- Data -->
                            <td class="p-4 text-estokei-textMuted">
                                <?php echo date('d/m/Y H:i', strtotime($usuario['criado_em'])); ?>
                            </td>
                            
                            <!-- Ações -->
                            <td class="p-4">
                                <div class="flex items-center justify-center gap-2">
                                    <!-- Botão Editar -->
                                    <button class="p-2 rounded-lg text-estokei-textMuted hover:text-estokei-accent hover:bg-estokei-accent/10 transition-colors" title="Editar">
                                        <i class="ph ph-pencil-simple text-lg"></i>
                                    </button>
                                    
                                    <!-- Botão Excluir -->
                                    <button onclick="location.href='api/delete.php?table=usuarios&id=<?php echo $usuario['id']; ?>'" class="p-2 rounded-lg text-estokei-textMuted hover:text-estokei-danger hover:bg-estokei-danger/10 transition-colors" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir o usuário <?php echo htmlspecialchars($usuario['nome']); ?>?');">
                                        <i class="ph ph-trash text-lg"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="p-8 text-center text-estokei-textMuted">
                            <div class="flex flex-col items-center justify-center gap-2">
                                <i class="ph ph-users-slash text-4xl mb-2"></i>
                                <p>Nenhum usuário cadastrado no sistema.</p>
                            </div>
                        </td>
                    </tr>
                <?php endif; ?>
                
            </tbody>
        </table>
    </div>
</div>