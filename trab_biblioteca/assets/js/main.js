// --- 1. Sidebar Toggle Logic (Mobile) ---
const sidebar = document.getElementById('sidebar');
const overlay = document.getElementById('sidebarOverlay');
let isSidebarOpen = false;

function toggleSidebar() {
    isSidebarOpen = !isSidebarOpen;
    if (isSidebarOpen) {
        sidebar.classList.remove('-translate-x-full');
        overlay.classList.remove('hidden');
        setTimeout(() => overlay.classList.add('opacity-100'), 10);
    } else {
        sidebar.classList.add('-translate-x-full');
        overlay.classList.remove('opacity-100');
        setTimeout(() => overlay.classList.add('hidden'), 300);
    }
}

// --- 2. Chart.js Initialization ---
document.addEventListener('DOMContentLoaded', function() {
    
    // Common Chart Setup for Dark Theme (Atualizado para Roxo/Verde)
    Chart.defaults.color = '#A798B8'; // biblioteca-textMuted
    Chart.defaults.font.family = 'Inter, sans-serif';
    const brandAccent = '#00FF7F';    // Verde Neon
    const brandPanel = '#201233';     // Roxo do painel
    
    // --- GRÁFICO DE BARRAS (MOVIMENTAÇÃO) ---
    const canvasMovement = document.getElementById('movementChart');
    
    // Só renderiza se o elemento existir na página atual
    if (canvasMovement) {
        const ctxMovement = canvasMovement.getContext('2d');
        
        // Create Gradient for Bars
        const gradientIn = ctxMovement.createLinearGradient(0, 0, 0, 400);
        gradientIn.addColorStop(0, 'rgba(0, 255, 127, 0.8)'); // Verde Neon Accent
        gradientIn.addColorStop(1, 'rgba(0, 255, 127, 0.1)');

        const gradientOut = ctxMovement.createLinearGradient(0, 0, 0, 400);
        gradientOut.addColorStop(0, 'rgba(239, 68, 68, 0.8)'); // Danger red
        gradientOut.addColorStop(1, 'rgba(239, 68, 68, 0.1)');

        new Chart(ctxMovement, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Ago', 'Set', 'Out', 'Nov', 'Dez'],
                datasets: [
                    {
                        label: 'Devoluções (Entradas)',
                        data: [650, 590, 800, 810, 560, 550, 400, 700, 650, 820, 900, 1000],
                        backgroundColor: gradientIn,
                        borderRadius: 6,
                        borderWidth: 0,
                        barPercentage: 0.6,
                        categoryPercentage: 0.8
                    },
                    {
                        label: 'Empréstimos (Saídas)',
                        data: [400, 450, 500, 600, 450, 400, 300, 500, 480, 600, 750, 800],
                        backgroundColor: gradientOut,
                        borderRadius: 6,
                        borderWidth: 0,
                        barPercentage: 0.6,
                        categoryPercentage: 0.8
                    }
                ]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    mode: 'index',
                    intersect: false,
                },
                plugins: {
                    legend: {
                        position: 'top',
                        align: 'end',
                        labels: {
                            usePointStyle: true,
                            boxWidth: 8,
                            padding: 20
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(19, 10, 30, 0.9)', // biblioteca-bg (Fundo roxo escuro)
                        titleColor: '#fff',
                        bodyColor: '#F8F9FA', // biblioteca-textMain
                        borderColor: 'rgba(255,255,255,0.1)',
                        borderWidth: 1,
                        padding: 12,
                        cornerRadius: 8,
                        displayColors: true,
                        boxPadding: 4
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: {
                            color: 'rgba(255, 255, 255, 0.05)',
                            drawBorder: false,
                        },
                        border: { display: false }
                    },
                    x: {
                        grid: {
                            display: false,
                            drawBorder: false,
                        },
                        border: { display: false }
                    }
                }
            }
        });
    }

    // --- GRÁFICO ROSCA (CATEGORIAS) ---
    const canvasCategory = document.getElementById('categoryChart');
    
    // Só renderiza se o elemento existir na página atual
    if (canvasCategory) {
        const ctxCategory = canvasCategory.getContext('2d');
        
        new Chart(ctxCategory, {
            type: 'doughnut',
            data: {
                labels: ['Ficção', 'Didáticos', 'Romance', 'Infantil'], 
                datasets: [{
                    data: [45, 25, 20, 10],
                    backgroundColor: [
                        '#00FF7F', // Brand Accent (Verde Neon)
                        '#8B5CF6', // Purple
                        '#38BDF8', // Light Blue
                        '#F59E0B'  // Orange/Warning
                    ],
                    borderWidth: 4,
                    borderColor: brandPanel, // Fundo roxo do card
                    hoverOffset: 10
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                cutout: '75%',
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            usePointStyle: true,
                            padding: 20,
                            color: '#A798B8' // biblioteca-textMuted
                        }
                    },
                    tooltip: {
                        backgroundColor: 'rgba(19, 10, 30, 0.9)', // biblioteca-bg
                        padding: 12,
                        cornerRadius: 8,
                        borderColor: 'rgba(255,255,255,0.1)',
                        borderWidth: 1
                    }
                }
            }
        });
    }

    // --- 3. Lógica de Pesquisa da Tabela em Tempo Real ---
    const searchInput = document.getElementById('tableSearch');
    const tableBody = document.getElementById('movementsTableBody');
    
    if (searchInput && tableBody) {
        searchInput.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const rows = tableBody.getElementsByTagName('tr');
            
            Array.from(rows).forEach(row => {
                const rowText = row.textContent.toLowerCase();
                
                if (rowText.includes(searchTerm)) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        });
    }
});