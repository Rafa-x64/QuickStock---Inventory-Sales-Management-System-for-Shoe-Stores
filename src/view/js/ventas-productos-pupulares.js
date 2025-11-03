// =============================
// ESTADÍSTICAS DE VENTAS (MER QuickStock)
// =============================
Chart.defaults.maintainAspectRatio = false;
Chart.defaults.responsive = true;

// 1️⃣ Productos más vendidos
const ctxProductosVendidos = document.getElementById('chartProductosVendidos');
new Chart(ctxProductosVendidos, {
    type: 'bar',
    data: {
        labels: ['Zapatilla Pro 42', 'Botín Cuero 40', 'Mocasín Casual', 'Sandalia Dama 37', 'Oxford Negro 43'],
        datasets: [{
            label: 'Unidades Vendidas',
            data: [320, 290, 250, 200, 180],
            backgroundColor: 'rgba(75, 192, 192, 0.7)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1,
            borderRadius: 5
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Top 5 productos más vendidos'
            },
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});

// 2️⃣ Categorías más vendidas
const ctxCategoriasVendidas = document.getElementById('chartCategoriasVendidas');
new Chart(ctxCategoriasVendidas, {
    type: 'pie',
    data: {
        labels: ['Deportivo', 'Formal', 'Casual', 'Sandalias', 'Botas'],
        datasets: [{
            label: 'Ventas por Categoría',
            data: [520, 430, 390, 260, 310],
            backgroundColor: [
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 99, 132, 0.7)',
                'rgba(255, 205, 86, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ],
            borderWidth: 2,
            borderColor: '#fff'
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Ventas agrupadas por categoría'
            }
        }
    }
});

// 3️⃣ Ventas por Sucursal
const ctxSucursalesVentas = document.getElementById('chartSucursalesVentas');
new Chart(ctxSucursalesVentas, {
    type: 'bar',
    data: {
        labels: ['Sucursal Centro', 'Sucursal Norte', 'Sucursal Este', 'Sucursal Oeste'],
        datasets: [{
            label: 'Monto Total Vendido (Bs)',
            data: [82000, 67000, 71000, 59000],
            backgroundColor: 'rgba(255, 206, 86, 0.7)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1,
            borderRadius: 5
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Ventas totales por sucursal'
            },
            legend: { display: false }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});

// 4️⃣ Tendencia mensual de ventas
const ctxTendenciaMensual = document.getElementById('chartTendenciaMensual');
new Chart(ctxTendenciaMensual, {
    type: 'line',
    data: {
        labels: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct'],
        datasets: [{
            label: 'Ventas Mensuales (Bs)',
            data: [42000, 48000, 46000, 52000, 58000, 60000, 62000, 59000, 64000, 68000],
            fill: true,
            borderColor: 'rgba(54, 162, 235, 1)',
            backgroundColor: 'rgba(54, 162, 235, 0.2)',
            tension: 0.3
        }]
    },
    options: {
        plugins: {
            title: {
                display: true,
                text: 'Tendencia de ventas mensual'
            }
        },
        scales: {
            y: { beginAtZero: true }
        }
    }
});

// 5️⃣ Calcular valor total de ventas (ejemplo simulado)
const valorTotalVentas = [82000, 67000, 71000, 59000].reduce((a, b) => a + b, 0);
document.getElementById('valorTotalVentas').textContent = `${valorTotalVentas.toLocaleString('es-BO')} Bs.`;
