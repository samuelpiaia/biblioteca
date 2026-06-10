tailwind.config = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            },
            colors: {
                biblioteca: {
                    bg: '#130A1E',       // Roxo Escuro Profundo (Fundo principal)
                    panel: '#201233',    // Roxo Escuro Médio (Cards/Sidebar/Inputs)
                    panelHover: '#2A1846',// Roxo para efeito Hover
                    accent: '#00FF7F',   // Verde Neon (Cor de destaque/identidade)
                    accentHover: '#00D169',// Verde Neon um pouco mais fechado para Hover
                    textMain: '#F8F9FA', // Texto Principal (Claro)
                    textMuted: '#A798B8',// Texto Secundário (Puxado pro roxo clarinho)
                    danger: '#EF4444',   // Vermelho (Padrão)
                    success: '#10B981',  // Verde Sucesso (Padrão)
                    warning: '#F59E0B'   // Amarelo Aviso (Padrão)
                }
            },
            boxShadow: {
                // Sombras atualizadas para o RGB do Verde Neon (0, 255, 127)
                'neon': '0 0 15px rgba(0, 255, 127, 0.3)',
                'neon-strong': '0 0 25px rgba(0, 255, 127, 0.5)',
            }
        }
    }
}