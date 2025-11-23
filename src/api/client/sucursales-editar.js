import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

/**
 * 🔄 Función que realiza la petición al servidor y rellena los campos del formulario.
 * @param {string} id_sucursal El ID de la sucursal a cargar.
 */
function cargarDatosSucursal(id_sucursal) {
    if (!id_sucursal) {
        console.error("ID de sucursal no encontrado en el formulario.");
        return;
    }

    // 1. Realizar la petición AJAX al index.php
    api({
        accion: "obtener_una_sucursal",
        id_sucursal: id_sucursal
    }).then(res => {
        // 2. Manejo de errores de la respuesta del servidor (PHP)
        if (res.error) {
            alert("Error al cargar la sucursal: " + res.error);
            console.error(res.detalle || res.error);
            return;
        }

        const suc = res.sucursal;

        // 3. Rellenar los campos si se obtienen datos
        if (suc) {
            // Rellenar campos de texto y textarea
            document.getElementById("nombre_sucursal_editar").value = suc.nombre;
            document.getElementById("rif_sucursal_editar").value = suc.rif;
            document.getElementById("direccion_sucursal_editar").value = suc.direccion;
            document.getElementById("telefono_sucursal_editar").value = suc.telefono;
            document.getElementById("fecha_registro_editar").value = suc.fecha_registro;

            // Rellenar el Select de Estado (activo)
            const activoSelect = document.getElementById("activo_sucursal_editar");

            if (activoSelect) {
                // La normalización robusta ahora está en PHP, por lo que suc.activo debe ser "true" o "false".
                let estadoActivo = String(suc.activo).toLowerCase();

                // Si el valor recibido es "true" (o su variante), lo asignamos.
                if (estadoActivo === 'true' || estadoActivo === 't') {
                    activoSelect.value = "true";
                }
                // En cualquier otro caso (incluyendo "false", "f", o valores erróneos), asignamos "false".
                else {
                    activoSelect.value = "false";
                }

            }

        } else {
            alert("Sucursal no encontrada.");
        }
    }).catch(error => {
        // 4. Manejo de errores de conexión (Red)
        alert("Ocurrió un error de conexión al cargar los datos.");
        console.error("Error en la petición API:", error);
    });
}


// 🚀 PUNTO DE ENTRADA: Ejecutar al cargar la página
document.addEventListener("DOMContentLoaded", () => {
    const idInput = document.getElementById("id_sucursal");
    const idSucursal = idInput ? idInput.value : null;

    if (idSucursal) {
        cargarDatosSucursal(idSucursal);
    } else {
        alert("No se pudo obtener el ID de la sucursal para editar.");
    }
});