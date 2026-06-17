<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 bg-transparent">
    
    <div class="mb-8 flex items-center gap-4">
        <div class="p-3 bg-biblioteca-panel rounded-xl shadow-neon border border-biblioteca-accent/20">
            <i class="ph ph-user-plus text-3xl text-biblioteca-accent"></i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-white">Cadastrar Novo Usuário</h2>
            <p class="text-sm text-biblioteca-textMuted mt-1">Adicione um novo usuário ao sistema</p>
        </div>
    </div>

    <div class="bg-biblioteca-panel rounded-2xl shadow-xl border border-white/5 p-6 sm:p-8">
        
        <form action="api/cadastrar_usuario.php" method="POST" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                
                <div class="md:col-span-2">
                    <label for="nome" class="block text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">
                        Nome Completo *
                    </label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors text-lg"></i>
                        <input type="text" id="nome" name="nome" required
                            placeholder="Ex: João da Silva" 
                            class="w-full bg-biblioteca-bg border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all placeholder-biblioteca-textMuted/50">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label for="email" class="block text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">
                        E-mail Corporativo *
                    </label>
                    <div class="relative group">
                        <i class="ph ph-envelope-simple absolute left-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors text-lg"></i>
                        <input type="email" id="email" name="email" required
                            placeholder="joao@empresa.com.br" 
                            class="w-full bg-biblioteca-bg border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all placeholder-biblioteca-textMuted/50">
                    </div>
                </div>

                <div>
                    <label for="senha" class="block text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">
                        Senha de Acesso *
                    </label>
                    <div class="relative group">
                        <i class="ph ph-lock-key absolute left-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors text-lg"></i>
                        <input type="password" id="senha" name="senha" required
                            placeholder="••••••••" 
                            class="w-full bg-biblioteca-bg border border-white/10 rounded-xl py-3 pl-12 pr-12 text-white focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all placeholder-biblioteca-textMuted/50">
                        <button type="button" class="absolute right-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted hover:text-white transition-colors">
                            <i class="ph ph-eye text-lg"></i>
                        </button>
                    </div>
                </div>

                <div>
                    <label for="tipo_user" class="block text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">
                        Perfil de Acesso
                    </label>
                    <div class="relative group">
                        <i class="ph ph-shield-check absolute left-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors text-lg z-10"></i>
                        <select id="tipo_user" name="tipo" 
                            class="w-full bg-biblioteca-bg border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all appearance-none cursor-pointer">
                            <option value="cliente" class="bg-biblioteca-panel">Cliente</option>
                            <option value="ADMIN" class="bg-biblioteca-panel">Administrador</option>
                        </select>
                        <i class="ph ph-caret-down absolute right-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted pointer-events-none"></i>
                    </div>
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-white/5 flex flex-col-reverse sm:flex-row justify-end gap-3 sm:gap-4">
                <button type="button" onclick="window.history.back();" class="px-6 py-3 rounded-xl border border-white/10 text-white font-medium hover:bg-white/5 transition-colors">
                    Cancelar
                </button>
                <button type="submit" class="flex items-center justify-center gap-2 px-6 py-3 rounded-xl bg-biblioteca-accent hover:bg-biblioteca-accentHover text-biblioteca-bg font-bold transition-all shadow-neon hover:shadow-neon-strong transform hover:-translate-y-0.5">
                    <i class="ph ph-user-plus text-xl"></i>
                    Cadastrar
                </button>
            </div>

        </form>
    </div>
</div>