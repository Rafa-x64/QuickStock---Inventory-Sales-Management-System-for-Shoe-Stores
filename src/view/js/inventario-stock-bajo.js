// =============================
// ESTADÍSTICAS DE INVENTARIO
// =============================

// 1️⃣ Productos con Stock Bajo (menor a stock mínimo)
const ctxStockBajo = document.getElementById('chartStockBajo');

Chart.defaults.maintainAspectRatio = false;
Chart.defaults.responsive = true;

new Chart(ctxStockBajo, {
    type: 'bar',
    data: {
        labels: ['Zapatilla Pro 42', 'Oxford Negro 43', 'Sandalia Dama 37', 'Botín Cuero 40'],
        datasets: [{
            label: 'Unidades en stock',
            data: [5, 3, 2, 7],
            backgroundColor: 'rgba(255, 99, 132, 0.7)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1,
            borderRadius: 5
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Productos con bajo stock'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// 2️⃣ Productos con Mayor Stock
const ctxStockAlto = document.getElementById('chartStockAlto');
new Chart(ctxStockAlto, {
    type: 'bar',
    data: {
        labels: ['Zapatilla Running Pro', 'Sandalia Verano', 'Mocasín Casual', 'Zapato Deportivo Junior'],
        datasets: [{
            label: 'Unidades en stock',
            data: [120, 95, 85, 76],
            backgroundColor: 'rgba(75, 192, 192, 0.7)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            borderRadius: 5
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Productos con stock más alto'
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// 3️⃣ Distribución de Stock por Categoría
const ctxCategorias = document.getElementById('chartCategorias');
new Chart(ctxCategorias, {
    type: 'doughnut',
    data: {
        labels: ['Deportivo', 'Formal', 'Casual', 'Sandalias', 'Botas'],
        datasets: [{
            data: [250, 180, 200, 120, 150],
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 205, 86, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)',
                'rgba(75, 192, 192, 0.7)'
            ],
            borderColor: 'rgba(255, 255, 255, 0.3)',
            borderWidth: 2
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Distribución de stock por categoría'
            }
        }
    }
});

// 4️⃣ Stock por Sucursal
const ctxSucursales = document.getElementById('chartSucursales');
new Chart(ctxSucursales, {
    type: 'bar',
    data: {
        labels: ['Sucursal Centro', 'Sucursal Norte', 'Sucursal Este', 'Sucursal Oeste'],
        datasets: [{
            label: 'Cantidad total en stock',
            data: [480, 350, 410, 300],
            backgroundColor: 'rgba(255, 206, 86, 0.7)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1,
            borderRadius: 5
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: {
                display: true,
                text: 'Stock total por sucursal'
            },
            legend: {
                display: false
            }
        },
        scales: {
            y: {
                beginAtZero: true
            }
        }
    }
});

// 5️⃣ Valor total del inventario (sumatoria del costo total)
const valorTotal = 480 * 55 + 350 * 65 + 410 * 72 + 300 * 60; // Ejemplo calculado ficticio
document.getElementById('valorTotalInventario').textContent = `${valorTotal.toFixed(2)} Bs.`;

// =========================================
// 🧩 Recomendación visual:
// Para usar Flowchart.js además de esto,
// puedes representar el flujo de stock:
// “Entrada → Inventario → Venta → Ajuste”
// =========================================