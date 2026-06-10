<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca | Gestão de Acervo</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script src="https://cdn.tailwindcss.com"></script>
    
    <script type="text/javascript" src="assets/js/tailwind.js"></script>

    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
</head>
<body class="bg-biblioteca-bg text-biblioteca-textMain font-sans overflow-hidden antialiased selection:bg-biblioteca-accent selection:text-biblioteca-bg">

    <div class="flex h-screen w-full">

        <div id="sidebarOverlay" class="fixed inset-0 bg-black/50 z-40 hidden lg:hidden transition-opacity" onclick="toggleSidebar()"></div>
        
        <?php include "sidebar.php";?>

        <div class="flex-1 flex flex-col min-w-0 bg-biblioteca-bg relative">
            
            <header class="h-20 glass sticky top-0 z-30 flex items-center justify-between px-4 sm:px-8">
                <div class="flex items-center gap-4">
                    <button onclick="toggleSidebar()" class="lg:hidden p-2 rounded-lg text-biblioteca-textMuted hover:text-white hover:bg-white/5 transition-colors">
                        <i class="ph ph-list text-2xl"></i>
                    </button>
                    
                    <div class="hidden sm:flex items-center relative group">
                        <i class="ph ph-magnifying-glass absolute left-3 text-biblioteca-textMuted group-focus-within:text-biblioteca-accent transition-colors"></i>
                        <input type="text" placeholder="Buscar no acervo..." class="bg-biblioteca-panel border border-white/10 rounded-full py-2 pl-10 pr-4 w-64 md:w-96 text-sm focus:outline-none focus:border-biblioteca-accent focus:ring-1 focus:ring-biblioteca-accent transition-all placeholder-biblioteca-textMuted text-white">
                    </div>
                </div>

                <div class="flex items-center gap-2 sm:gap-4">
                    <button class="p-2 rounded-full relative text-biblioteca-textMuted hover:text-white hover:bg-white/5 transition-colors">
                        <i class="ph ph-bell text-xl"></i>
                        <span class="absolute top-1 right-1 w-2.5 h-2.5 bg-biblioteca-accent rounded-full border-2 border-biblioteca-bg shadow-[0_0_8px_rgba(0,255,127,0.8)]"></span>
                    </button>
                    <button class="hidden sm:flex items-center gap-2 bg-biblioteca-accent hover:bg-biblioteca-accentHover text-biblioteca-bg font-bold py-2 px-5 rounded-full transition-all shadow-neon hover:shadow-neon-strong transform hover:-translate-y-0.5">
                        <i class="ph ph-books text-lg"></i>
                        <span>Novo Livro</span>
                    </button>
                </div>
            </header>
            
            </div>
    </div>
</body>
</html>