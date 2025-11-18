import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

// Función para formatear valores monetarios
function formatMoneda(valor) {
    if (valor === null || valor === undefined) return '-';
    // Ajusta el idioma y la moneda según tu configuración local (ej: 'es-CL', 'CLP')
    return parseFloat(valor).toLocaleString('es-CL', {
        style: 'currency',
        currency: 'USD', // Cambia a tu moneda (ej: 'CLP', 'USD', 'EUR')
        minimumFractionDigits: 2,
    });
}

// Función principal para cargar y renderizar los datos
async function cargarDetalleProducto() {
    // 1. Obtener el ID del producto inyectado por PHP en la vista
    // Asumimos que has agregado un elemento oculto para pasar el ID
    const idProductoElement = document.getElementById('id_producto_hidden');
    if (!idProductoElement) {
        console.error("ID del producto no encontrado en la vista.");
        return;
    }
    const id_producto = idProductoElement.value;

    if (!id_producto) {
        document.getElementById('mainContent').innerHTML = '<div class="alert alert-danger">Error: No se ha proporcionado un ID de producto válido.</div>';
        return;
    }

    try {
        // 2. Realizar la petición AJAX al backend
        const res = await api({
            accion: "obtener_detalle_producto", // La nueva función PHP
            id_producto: id_producto
        });

        if (res.status !== "success") {
            console.error("Error del servidor:", res.message, res.detalle);
            document.getElementById('mainContent').innerHTML = '<div class="alert alert-danger">Error al cargar el detalle: ' + (res.message || 'Desconocido') + '</div>';
            return;
        }

        const { producto, inventario, estadisticas } = res;

        // --- 3. Rellenar Información General del Producto ---

        // Función auxiliar para obtener el valor o un placeholder
        const getVal = (val) => val ?? '-';

        document.getElementById('breadcrumb-nombre').textContent = producto.nombre || 'Detalle';

        // Mapeo de datos a IDs
        document.getElementById('p_codigo_barra').textContent = getVal(producto.codigo_barra);
        document.getElementById('p_nombre').textContent = getVal(producto.nombre);
        document.getElementById('p_categoria').textContent = getVal(producto.categoria_nombre);
        document.getElementById('p_color').textContent = getVal(producto.color_nombre);
        document.getElementById('p_talla').textContent = getVal(producto.talla);
        document.getElementById('p_precio_venta').textContent = formatMoneda(producto.precio_venta);
        document.getElementById('p_precio_compra').textContent = formatMoneda(producto.precio_compra);
        document.getElementById('p_proveedor').textContent = getVal(producto.proveedor_nombre);
        document.getElementById('p_descripcion').textContent = getVal(producto.descripcion);

        // Estado (convertir booleano/string a etiqueta)
        const estadoHTML = producto.estado == true || producto.estado === 't'
            ? '<span class="badge text-bg-success">Activo</span>'
            : '<span class="badge text-bg-danger">Inactivo</span>';
        document.getElementById('p_estado').innerHTML = estadoHTML;

        // --- 4. Rellenar Inventario por Sucursal (Tabla) ---
        const tablaInventarioBody = document.querySelector('#tabla_inventario tbody');
        tablaInventarioBody.innerHTML = ''; // Limpiar la tabla

        if (inventario.length === 0) {
            tablaInventarioBody.innerHTML = '<tr><td colspan="4" class="text-center text-muted">No hay inventario registrado en sucursales.</td></tr>';
        } else {
            inventario.forEach(item => {
                const stock = parseInt(item.stock);
                const minimo = parseInt(item.minimo);

                // Color de la celda de stock
                let stockClass = '';
                if (stock < minimo) {
                    stockClass = 'table-danger fw-bold';
                } else if (stock === minimo) {
                    stockClass = 'table-warning';
                }

                const fecha = item.ultima_actualizacion ? new Date(item.ultima_actualizacion).toLocaleString() : '-';

                const row = `
                    <tr>
                        <td>${item.sucursal_nombre}</td>
                        <td class="${stockClass}">${stock}</td>
                        <td>${minimo}</td>
                        <td>${fecha}</td>
                    </tr>
                `;
                tablaInventarioBody.insertAdjacentHTML('beforeend', row);
            });
        }

        // --- 5. Rellenar Estadísticas Globales ---
        document.getElementById('total_inventario').textContent = estadisticas.total_inventario;
        document.getElementById('stock_minimo_global').textContent = estadisticas.stock_minimo_global;
        document.getElementById('sucursales_bajo_stock').textContent = estadisticas.sucursales_bajo_stock;

    } catch (error) {
        console.error("Error al cargar detalle del producto:", error);
        document.getElementById('mainContent').innerHTML = '<div class="alert alert-danger">Ocurrió un error inesperado al procesar los datos.</div>';
    }
}

// Inicialización: Cargar el detalle cuando el DOM esté listo
document.addEventListener("DOMContentLoaded", cargarDetalleProducto);