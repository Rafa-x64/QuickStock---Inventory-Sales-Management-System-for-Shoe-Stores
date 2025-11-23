import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

// 📦 OBJETO GLOBAL PARA GUARDAR EL ESTADO DE LOS FILTROS
let filtrosActivos = {
    // Mantendremos solo los filtros relevantes para sucursales
    nombre: "",
    estado: ""  // Valores posibles: "", "true", "false"
    // Los filtros de código, categoría, proveedor y sucursal de producto se eliminan o se ignoran
    // para este listado.
};

// 🔄 FUNCIÓN REUTILIZABLE PARA CARGAR SUCURSALES APLICANDO LOS FILTROS
function cargarSucursales() { // Renombrada para mayor claridad
    // La acción para obtener el listado de sucursales es "obtener_sucursales".
    // Nota: Es crucial que tu backend (index.php) en la acción "obtener_sucursales" 
    // esté preparado para recibir y aplicar los filtros 'nombre' y 'estado' si se envían.
    api({
        accion: "obtener_sucursales",
        ...filtrosActivos
    }).then(res => {
        // La función PHP obtenerSucursales devuelve los datos en la clave "filas" (no "data")
        const tabla = document.getElementById("tabla_sucursales"); // ID de la tabla de sucursales
        tabla.innerHTML = ""; // Limpia la tabla antes de cargar nuevos datos
        const sucursales = res.filas || []; // ¡Usar 'res.filas'!

        if (sucursales.length === 0) {
            // Ajustar el colspan según la estructura final de tu tabla de sucursales
            tabla.innerHTML = '<tr><td colspan="6" class="text-center">No se encontraron sucursales con estos filtros.</td></tr>';
            return;
        }

        // Mapeo y renderizado de las filas de SUCURSALES
        sucursales.forEach(suc => {
            // El campo de estado debe ser el de la tabla core.sucursal (asumimos 'activo' o similar)
            // Asumo que el campo de estado de la sucursal es 'activo'
            const estadoTexto = (suc.activo == 1 || suc.activo === "t" || suc.activo === true)
                ? '<span class="badge text-bg-success">Activa</span>'
                : '<span class="badge text-bg-danger">Inactiva</span>';

            const fila = document.createElement("tr");
            fila.innerHTML = `
                <td>${suc.id_sucursal ?? '-'}</td>
                <td>${suc.nombre ?? '-'}</td>
                <td>${suc.direccion ?? '-'}</td>
                <td>${suc.telefono ?? '-'}</td>
                <td>${estadoTexto}</td>
                <td class="text-center">
                    <div class="container-fluid p-0">
                        <div class="row g-1">
                            
                            <div class="col-6">
                                <form action="sucursales-editar" method="POST" class="d-inline">
                                    <input type="hidden" name="accion" value="editar">
                                    <input type="hidden" name="id_sucursal" value="${suc.id_sucursal}">
                                    <input type="submit" class="btn btn-warning btn-sm w-100" value="Editar">
                                </form>
                            </div>
                            
                            <div class="col-6">
                                <form action="" method="POST" class="d-inline" onsubmit="return confirm('¿Está seguro de que desea eliminar esta sucursal?');">
                                    <input type="hidden" name="accion" value="eliminar_sucursal">
                                    <input type="hidden" name="id_sucursal" value="${suc.id_sucursal}">
                                    <input type="submit" class="btn btn-danger btn-sm w-100" value="Eliminar">
                                </form>
                            </div>

                            <div class="col-12 mt-1">
                                <form action="sucursales-detalle" method="POST" class="d-inline">
                                    <input type="hidden" name="accion" value="ver_detalle">
                                    <input type="hidden" name="id_sucursal" value="${suc.id_sucursal}">
                                    <input type="submit" class="btn btn-primary btn-sm w-100" value="Ver detalle">
                                </form>
                            </div>

                        </div>
                    </div>
                </td>
            `;
            tabla.appendChild(fila);
        });
    }).catch(error => {
        console.error("Error al cargar sucursales:", error);
        // Asegúrate de usar el ID de la tabla correcto aquí
        document.getElementById("tabla_sucursales").innerHTML = '<tr><td colspan="6" class="text-center text-danger">Error al cargar los datos.</td></tr>';
    });
}

// 🎛️ FUNCIÓN PARA INICIALIZAR EVENTOS DE FILTRO
function inicializarFiltros() {
    // Función auxiliar para adjuntar eventos a selects e inputs
    const addEventListener = (id, eventType, filterKey) => {
        const element = document.getElementById(id);
        if (element) {
            element.addEventListener(eventType, (e) => {
                filtrosActivos[filterKey] = e.target.value.trim();
                cargarSucursales(); // Llamar a cargarSucursales
            });
        }
    };

    // Filtros de texto (Solo 'nombre' y 'codigo' si lo tuviera)
    // Usamos el 'filtro_nombre' si existe en la vista de sucursales
    addEventListener("filtro_nombre", "input", "nombre");

    // Filtros de Select (Solo 'estado' si existe)
    addEventListener("filtro_estado", "change", "estado");

    // Si tu vista de sucursales usa otros IDs de filtro, ajústalos aquí.
    // Los filtros no relevantes (sucursal, categoria, proveedor) se ignoran.

    // 🗑️ BOTÓN REESTABLECER FILTROS
    document.getElementById("btn-reestablecer")?.addEventListener("click", () => {
        // 1. Resetear el objeto de filtros
        filtrosActivos = {
            nombre: "",
            estado: ""
        };

        // 2. Resetear los valores de los elementos de la vista
        // Solo reseteamos los filtros que realmente usamos para las sucursales.
        const nombreInput = document.getElementById("filtro_nombre");
        if (nombreInput) nombreInput.value = "";

        const estadoSelect = document.getElementById("filtro_estado");
        if (estadoSelect) estadoSelect.value = "";

        // 3. Recargar sucursales sin filtros
        cargarSucursales();
    });
}

// ⚙️ FUNCIÓN PARA CARGAR OPCIONES DINÁMICAS EN LOS SELECTS
// En el listado de sucursales, no se necesita cargar opciones dinámicas
// a menos que haya otros filtros (ej. zonas). Si solo tienes los filtros
// 'nombre' y 'estado', esta función se puede simplificar o omitir.
function cargarOpcionesSelects() {
    // Esta función se deja vacía si los únicos selects son los fijos (estado)
    // o si los filtros de categoría/proveedor ya no existen en la vista de sucursales.
    console.log("Carga de opciones de selects específicos para sucursales no requerida.");
}


// 🚀 PUNTO DE ENTRADA: CUANDO CARGA LA PÁGINA
document.addEventListener("DOMContentLoaded", () => {
    // Si solo hay selects estáticos (como el de 'estado'), esta función no hace nada, lo cual está bien.
    // Si tienes selects dinámicos (ej. 'zona'), podrías implementarlos aquí.
    cargarOpcionesSelects();

    // Configurar los listeners
    inicializarFiltros();

    // Cargar la lista inicial de sucursales
    cargarSucursales();
});