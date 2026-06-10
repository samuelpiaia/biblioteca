<?php
    include("config/config.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "SELECT * FROM usuarios WHERE id=$id";
        $consulta = $pdo->prepare($sql);
        $consulta->execute();

        $usuario = $consulta->fetch(PDO::FETCH_ASSOC);


    }
?>

<main class="flex-1 overflow-x-hidden overflow-y-auto p-4 sm:p-8">
    
    <!-- Wrapper para centralizar o conteúdo horizontalmente -->
    <div class="w-full max-w-2xl mx-auto space-y-8">
        
        <!-- Page Title (Centralizado) -->
        <div class="text-center">
            <h2 class="text-2xl sm:text-3xl font-bold text-white mb-1">Cadastro de fornecedor</h2>
            <br>
        <!-- Painel do Formulário -->
        <div class="bg-estokei-panel rounded-2xl p-6 sm:p-8 border border-white/5 relative overflow-hidden">
            <!-- Efeito Glow de fundo (semelhante aos cards) -->
            <div class="absolute -right-12 -top-12 w-40 h-40 bg-estokei-accent/10 rounded-full blur-3xl pointer-events-none"></div>

            <form action="api/cadastrar_produto.php" method="POST" class="space-y-6 relative z-10" >
                
                <!-- Campo Nome -->
                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">codigo de barras</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            value="<?php echo $usuario['codigo_barras']; ?>"
                            type="number" 
                            id="codigo_barras" 
                            name="codigo_barras" 
                            placeholder="Ex: 235127868398" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">nome do produto</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            value="<?php echo $usuario['nome']; ?>"
                            type="text" 
                            id="nome" 
                            name="nome" 
                            placeholder="Ex: notebook" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">descricao</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input
                        value="<?php echo $usuario['']; ?>" 
                            type="text" 
                            id="descricao" 
                            name="descricao" 
                            placeholder="Ex: produto eletronico de uso domestico" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">quantidade atual</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            value="<?php echo $usuario['']; ?>"
                            type="number" 
                            id="quatidade_atual" 
                            name="quatidade_atual" 
                            placeholder="Ex: 25" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">estoque minimo</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            value="<?php echo $usuario['']; ?>"
                            type="number" 
                            id="estoque_minimo" 
                            name="estoque_minimo" 
                            placeholder="Ex: 43" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">preco de custo</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            value="<?php echo $usuario['']; ?>"
                            type="number" 
                            id="preco_custo" 
                            name="preco_custo" 
                            placeholder="Ex: R$1657,00" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">preco venda</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            value="<?php echo $usuario['']; ?>"
                            type="number" 
                            id="preco_venda" 
                            name="preco_venda" 
                            placeholder="Ex: R$2765,00" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>

                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">localisado</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            value="<?php echo $usuario['']; ?>"
                            type="text" 
                            id="localizacao" 
                            name="localizacao" 
                            placeholder="Ex: Setor 5" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
                    </div>
                </div>
                <div>
                    <label for="nome" class="block text-xs font-semibold text-estokei-textMuted uppercase tracking-wider mb-2">sku</label>
                    <div class="relative group">
                        <i class="ph ph-user absolute left-3 top-1/2 transform -translate-y-1/2 text-estokei-textMuted group-focus-within:text-estokei-accent transition-colors"></i>
                        <input 
                            value="<?php echo $usuario['sku']; ?>"
                            type="text" 
                            id="sku" 
                            name="sku" 
                            placeholder="Ex: seila" 
                            required
                            class="w-full bg-estokei-bg border border-white/10 rounded-xl py-3 pl-10 pr-4 text-sm focus:outline-none focus:border-estokei-accent focus:ring-1 focus:ring-estokei-accent transition-all text-white placeholder-estokei-textMuted"
                        >
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