<aside id="sidebar" class="fixed lg:static inset-y-0 left-0 z-50 w-72 bg-biblioteca-panel border-r border-white/5 transform -translate-x-full lg:translate-x-0 transition-transform duration-300 ease-in-out flex flex-col h-full shadow-2xl lg:shadow-none">
            
    <div class="h-20 flex items-center px-8 border-b">
        <div class="flex items-center gap-3">
            <div class="p-2 bg-biblioteca-bg rounded-xl shadow-neon border border-biblioteca-accent/20">
                <i class="ph ph-books text-2xl text-biblioteca-accent"></i>
            </div>
            <h1 class="text-3xl font-extrabold tracking-tight">
                bibrio<span class="text-biblioteca-accent">t</span>eca
            </h1>
        </div>
    </div>

    <nav class="flex-1 overflow-y-auto py-6 px-4 space-y-2">
        <p class="px-4 text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2">Menu Principal</p>
        
        <a href="index.php?page=" class="flex items-center gap-3 px-4 py-3 rounded-xl bg-biblioteca-bg text-biblioteca-accent border border-biblioteca-accent/20 shadow-neon transition-all">
            <i class="ph ph-squares-four text-xl"></i>
            <span class="font-medium">Painel Principal</span>
        </a>
        
        <p class="px-4 text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2 mt-6">Cadastros</p>
        
        <a href="index.php?page=cadastro_usuario.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-biblioteca-textMuted hover:text-white hover:bg-biblioteca-panelHover transition-all group">
            <i class="ph ph-user-circle-plus text-xl group-hover:text-biblioteca-accent transition-colors"></i>
            <span class="font-medium">Cadastro de usuarios</span>
        </a>
        
        <a href="index.php?page=cadastro_livro.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-biblioteca-textMuted hover:text-white hover:bg-biblioteca-panelHover transition-all group">
            <i class="ph ph-book-open text-xl group-hover:text-biblioteca-accent transition-colors"></i>
            <span class="font-medium">Cadastro de Livros</span>
        </a>

        <p class="px-4 text-xs font-semibold text-biblioteca-textMuted uppercase tracking-wider mb-2 mt-6">Listagens</p>
        
        <a href="index.php?page=lista_usuarios.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-biblioteca-textMuted hover:text-white hover:bg-biblioteca-panelHover transition-all group">
            <i class="ph ph-users text-xl group-hover:text-biblioteca-accent transition-colors"></i>
            <span class="font-medium">Lista de usuarios</span>
        </a>
        
        <a href="index.php?page=lista_livros.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-biblioteca-textMuted hover:text-white hover:bg-biblioteca-panelHover transition-all group">
            <i class="ph ph-bookshelf text-xl group-hover:text-biblioteca-accent transition-colors"></i>
            <span class="font-medium">Acervo de Livros</span>
        </a>

        
        <a href="index.php?page=enprestar_livro.php" class="flex items-center gap-3 px-4 py-3 rounded-xl text-biblioteca-textMuted hover:text-white hover:bg-biblioteca-panelHover transition-all group">
            <i class="ph ph-book text-xl group-hover:text-biblioteca-accent transition-colors"></i>
            <span class="font-medium">alocados</span>
        </a>
        
    </nav>

    <div class="p-4 border-t border-white/5">
        <div class="flex items-center gap-3 p-3 rounded-xl hover:bg-biblioteca-panelHover cursor-pointer transition-all">
            <img src="https://i.pravatar.cc/150?img=32" alt="User Profile" class="w-10 h-10 rounded-full border-2 border-biblioteca-accent/50">
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">Admin Sistema</p>
                <p class="text-xs text-biblioteca-textMuted truncate">admin@biblioteca.com.br</p>
            </div>
            <i class="ph ph-sign-out text-biblioteca-textMuted hover:text-red-500 transition-colors text-xl"></i>
        </div>
    </div>
</aside>