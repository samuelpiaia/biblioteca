<main class="flex-1 overflow-x-hidden overflow-y-auto p-4 sm:p-8">
    
    <!-- Wrapper para centralizar o conteúdo horizontalmente -->
    <div class="w-full max-w-2xl mx-auto space-y-8">
        
        <!-- Page Title (Centralizado) -->
        <div class="text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-1">Cadastro de Usuário</h2>
            <p class="text-estokei-textMuted text-sm">Adicione um novo usuarioa ao sistema.</p>
        </div>

        <!-- Painel do Formulário -->
        <div class="bg-estokei-panel rounded-2xl p-6 sm:p-8 border border-white/5 relative overflow-hidden">
            <!-- Efeito Glow de fundo (semelhante aos cards) -->
            <div class="absolute -right-12 -top-12 w-40 h-40 bg-estokei-accent/10 rounded-full blur-3xl pointer-events-none"></div>

            <form action="api/cadastrar_usuario.php" method="POST" class="space-y-6 relative z-10" >
                
                <!-- Campo Nome -->
                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">Nome Completo</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            type="text" 
                            id="nome" 
                            name="nome" 
                            placeholder="Ex: João da Silva" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <!-- Campo E-mail -->
                <div>
                    <label for="email" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">E-mail Corporativo</label>
                    <div class="relative group">
                        <i class="ph ph-envelope-simple absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="joao@empresa.com.br" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <!-- Campo Senha -->
                <div>
                    <label for="senha" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">Senha de Acesso</label>
                    <div class="relative group">
                        <i class="ph ph-lock-key absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            type="password" 
                            id="senha" 
                            name="senha" 
                            placeholder="••••••••" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                        <!-- Opcional: Ícone para mostrar/ocultar senha -->
                        <button type="button" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted hover:text-white transition-colors">
                            <i class="ph ph-eye"></i>
                        </button>
                    </div>
                </div>

                <!-- Campo Tipo de Usuário -->
                <div>
                    <label for="tipo_user" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">Perfil de Acesso</label>
                    <div class="relative group">
                        <i class="ph ph-shield-check absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors z-10"></i>
                        <select 
                            name="tipo" 
                            id="tipo_user"
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-10 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white appearance-none relative z-0 cursor-pointer"
                        >
                            <option value="cliente" class="bg-estokei-panel">cliente</option>
                            <option value="ADMIN" class="bg-estokei-panel">Administrador</option>
                        </select>
                        <!-- Ícone customizado de seta para o select -->
                        <i class="ph ph-caret-down absolute right-4 top-1/2 transform -translate-y-1/2 text-estokei-textMuted pointer-events-none"></i>
                    </div>
                </div>

                <!-- Botões de Ação -->
                <div class="pt-6 mt-8 border-t border-white/5 flex gap-4">
                    <button type="button" class="flex-1 py-3 px-4 rounded-xl font-semibold text-sm text-estokei-textMuted hover:text-white hover:bg-white/5 transition-all border border-transparent hover:border-white/10">
                        Cancelar
                    </button>
                    <button type="submit" class="flex-1 bg-estokei-accent hover:bg-estokei-accentHover text-estokei-bg font-bold py-3 px-4 rounded-xl transition-all shadow-neon hover:shadow-neon-strong transform hover:-translate-y-1 flex justify-center items-center gap-2">
                        <i class="ph ph-user-plus text-lg"></i>
                        Cadastrar
                    </button>
                </div>
            </form>
        </div>
    </div>

</main>