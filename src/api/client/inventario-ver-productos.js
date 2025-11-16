import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

// --- OBJETO GLOBAL PARA GUARDAR FILTROS ACTIVOS ---
let filtrosActivos = {
    nombre: "",
    codigo: "",
    categoria: "",
    proveedor: "",
    sucursal: "",
    estado: ""
};

// ---- FUNCION REUTILIZABLE PARA CARGAR PRODUCTOS ----
function cargarProductos() {
    api({
        accion: "obtener_todos_los_productos",
        ...filtrosActivos
    }).then(res => {
        const tabla = document.getElementById("tabla_productos");
        tabla.innerHTML = "";
        const productos = res.data || [];
        if (productos.length === 0) return;

        productos.forEach(prod => {
            const fila = document.createElement("tr");
            fila.innerHTML = `
                <td>${prod.codigo ?? '-'}</td>
                <td>${prod.nombre ?? '-'}</td>
                <td>${prod.categoria_nombre ?? '-'}</td>
                <td>${prod.talla ?? '-'}</td>
                <td>${prod.precio_compra ?? '-'}</td>
                <td>${prod.precio_venta ?? '-'}</td>
                <td>${prod.stock ?? 0}</td>
                <td>${prod.sucursal_nombre ?? 'Sin sucursal'}</td>
                <td>${prod.estado == 1 || prod.estado === "t" ? "Activo" : "Inactivo"}</td>
                <td class="text-center">
                    <div class="container-fluid p-0">
                        <div class="row g-1">
                            <div class="col-6">
                                <button class="btn btn-warning btn-sm w-100" data-id="${prod.id_producto}">Editar</button>
                            </div>
                            <div class="col-6">
                                <button class="btn btn-danger btn-sm w-100" data-id="${prod.id_producto}">Eliminar</button>
                            </div>
                            <div class="col-12">
                                <button class="btn btn-primary btn-sm w-100" data-id="${prod.id_producto}">Ver Detalle</button>
                            </div>
                        </div>
                    </div>
                </td>
            `;
            tabla.appendChild(fila);
        });
    });
}

// ---- CUANDO CARGA LA PAGINA ----
document.addEventListener("DOMContentLoaded", () => {
    const filtroSucursal = document.getElementById("filtro_sucursal");
    const filtroCategoria = document.getElementById("filtro_categoria");
    const filtroProveedor = document.getElementById("filtro_proveedor");
    const filtroEstado = document.getElementById("filtro_estado"); // nuevo select

    // --- CARGAR SUCURSALES ---
    api({ accion: "obtener_sucursales" }).then(res => {
        res.filas.forEach(sucursal => {
            const op = document.createElement("option");
            op.value = sucursal.id_sucursal;
            op.textContent = sucursal.nombre;
            filtroSucursal.appendChild(op);
        });
    });

    // --- CARGAR CATEGORIAS ---
    api({ accion: "obtener_categorias" }).then(res => {
        res.categorias.forEach(cat => {
            const op = document.createElement("option");
            op.value = cat.id_categoria;
            op.textContent = cat.nombre;
            filtroCategoria.appendChild(op);
        });
    });

    // --- CARGAR PROVEEDORES ---
    api({ accion: "obtener_proveedores" }).then(res => {
        res.proveedores.forEach(prov => {
            const op = document.createElement("option");
            op.value = prov.id_proveedor;
            op.textContent = prov.nombre;
            filtroProveedor.appendChild(op);
        });
    });

    // --- CARGAR PRODUCTOS INICIALES ---
    cargarProductos();
});

// ------ FILTROS ------

document.getElementById("filtro_nombre").addEventListener("keyup", e => {
    filtrosActivos.nombre = e.target.value.trim();
    cargarProductos();
});

document.getElementById("filtro_codigo").addEventListener("keyup", e => {
    filtrosActivos.codigo = e.target.value.trim();
    cargarProductos();
});

document.getElementById("filtro_sucursal").addEventListener("change", e => {
    filtrosActivos.sucursal = e.target.value;
    cargarProductos();
});

document.getElementById("filtro_categoria").addEventListener("change", e => {
    filtrosActivos.categoria = e.target.value;
    cargarProductos();
});

document.getElementById("filtro_proveedor").addEventListener("change", e => {
    filtrosActivos.proveedor = e.target.value;
    cargarProductos();
});

// NUEVO: filtro por estado
document.getElementById("filtro_estado")?.addEventListener("change", e => {
    filtrosActivos.estado = e.target.value; // "" | "1" | "0"
    cargarProductos();
});

// BOTÓN REESTABLECER
document.getElementById("btn_reiniciar_filtros")?.addEventListener("click", () => {
    filtrosActivos = { nombre: "", codigo: "", categoria: "", proveedor: "", sucursal: "", estado: "" };

    document.getElementById("filtro_nombre").value = "";
    document.getElementById("filtro_codigo").value = "";
    document.getElementById("filtro_categoria").selectedIndex = 0;
    document.getElementById("filtro_proveedor").selectedIndex = 0;
    document.getElementById("filtro_sucursal").selectedIndex = 0;
    if (document.getElementById("filtro_estado")) document.getElementById("filtro_estado").selectedIndex = 0;

    cargarProductos();
});
