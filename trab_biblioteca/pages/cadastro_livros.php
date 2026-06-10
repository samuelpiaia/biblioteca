<div class="max-w-4xl mx-auto py-8 px-4 sm:px-6 lg:px-8 bg-transparent">
    
    <div class="mb-8 flex items-center gap-4">
        <div class="p-3 bg-biblioteca-panel rounded-xl shadow-neon border border-biblioteca-accent/20">
            <i class="ph ph-book-open text-3xl text-biblioteca-accent"></i>
        </div>
        <div>
            <h2 class="text-2xl font-bold text-white">Cadastrar Novo Livro</h2>
            <p class="text-sm text-biblioteca-textMuted mt-1">Adicione uma nova obra ao acervo literário</p>
        </div>
    </div>

    <div class="bg-biblioteca-panel rounded-2xl shadow-xl border border-white/5 p-6 sm:p-8">
        
        <form action="salvar_livro.php" method="POST" class="space-y-6">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="md:col-span-2">
                    <label for="titulo" class="block text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">
                        Título da Obra *
                    </label>
                    <div class="relative group">
                        <i class="ph ph-text-aa absolute left-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors text-lg"></i>
                        <input type="text" id="titulo" name="titulo" required
                            placeholder="Ex: O Senhor dos Anéis: A Sociedade do Anel" 
                            class="w-full bg-biblioteca-bg border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all placeholder-biblioteca-textMuted/50">
                    </div>
                </div>

                <div class="md:col-span-2">
                    <label for="autor" class="block text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">
                        Autor(a) *
                    </label>
                    <div class="relative group">
                        <i class="ph ph-pen-nib absolute left-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors text-lg"></i>
                        <input type="text" id="autor" name="autor" required
                            placeholder="Ex: J.R.R. Tolkien" 
                            class="w-full bg-biblioteca-bg border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all placeholder-biblioteca-textMuted/50">
                    </div>
                </div>

                <div>
                    <label for="genero" class="block text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">
                        Gênero Literário
                    </label>
                    <div class="relative group">
                        <i class="ph ph-bookmarks absolute left-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors text-lg"></i>
                        <input type="text" id="genero" name="genero" 
                            placeholder="Ex: Fantasia, Ficção Científica, Romance..." 
                            class="w-full bg-biblioteca-bg border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all placeholder-biblioteca-textMuted/50">
                    </div>
                </div>

                <div>
                    <label for="faixa_etaria" class="block text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">
                        Faixa Etária
                    </label>
                    <div class="relative group">
                        <i class="ph ph-users-three absolute left-4 top-1/2 -translate-y-1/2 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors text-lg z-10"></i>
                        <select id="faixa_etaria" name="faixa_etaria" 
                            class="w-full bg-biblioteca-bg border border-white/10 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all appearance-none cursor-pointer">
                            <option value="Livre">Livre para todos os públicos</option>
                            <option value="+10">Maiores de 10 anos</option>
                            <option value="+12">Maiores de 12 anos</option>
                            <option value="+14">Maiores de 14 anos</option>
                            <option value="+16">Maiores de 16 anos</option>
                            <option value="+18">Maiores de 18 anos</option>
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
                    <i class="ph ph-check-circle text-xl"></i>
                    Salvar no Acervo
                </button>
            </div>

        </form>
    </div>
</div>