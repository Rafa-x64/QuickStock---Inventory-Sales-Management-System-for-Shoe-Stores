import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

document.addEventListener("DOMContentLoaded", () => {
    const select_sucursal = document.getElementById("sucursal-filtro");
    const select_cargo = document.getElementById("cargo-filtro");
    const select_estado = document.getElementById("estado-filtro");
    const reestablecer_filtros = document.getElementById("reestablecer-filtros");
    const tabla_empleados = document.getElementById("lista_empleados");

    //filtros
    //peticion de sucursales para el select
    api({ accion: "obtener_sucursales" }).then(res => {
        res.filas.forEach(sucursal => {
            const nueva_opcion = document.createElement("option");
            nueva_opcion.value = sucursal.id_sucursal;
            nueva_opcion.textContent = sucursal.nombre;
            select_sucursal.appendChild(nueva_opcion);
        });
    });
    //peticion de roles para el select
    api({ accion: "obtener_roles" }).then(res => {
        res.filas.forEach(rol => {
            const nueva_opcion = document.createElement("option");
            nueva_opcion.value = rol.id_rol;
            nueva_opcion.textContent = rol.nombre_rol;
            select_cargo.appendChild(nueva_opcion);
        });
    });

    function renderizarEmpleados(empleados) {
        const tbody = document.querySelector("#lista_empleados tbody");
        tbody.innerHTML = ""; // limpiar tabla

        if (!empleados || empleados.length === 0) {
            tbody.innerHTML = `
            <tr>
                <td colspan="8" class="text-center">No se encontraron empleados</td>
            </tr>
        `;
            return;
        }

        empleados.forEach(emp => {
            const fila = document.createElement("tr");

            fila.innerHTML = `
            <td>${emp.id_usuario}</td>
            <td>${emp.nombre} ${emp.apellido}</td>
            <td>${emp.nombre_rol}</td>
            <td>${emp.sucursal_nombre ?? "Sin asignar"}</td>
            <td>${emp.telefono}</td>
            <td>${emp.cedula}</td>
            <td>
                <span class="badge ${emp.activo ? "bg-success" : "bg-danger"}">
                    ${emp.activo ? "Activo" : "Inactivo"}
                </span>
            </td>
            <td>
                <a href="#" class="btn btn-sm btn-info text-white btn-action">
                    <i class="bi bi-eye"></i>
                </a>
                <a href="#" class="btn btn-sm btn-warning btn-action">
                    <i class="bi bi-pencil"></i>
                </a>
                <a href="#" class="btn btn-sm btn-danger btn-action">
                    <i class="bi bi-person-x"></i>
                </a>
            </td>
        `;

            tbody.appendChild(fila);
        });
    }

    function aplicarFiltros() {
        const sucursal = select_sucursal.value;
        const rol = select_cargo.value;
        const estado = select_estado.value;

        // Aquí se hace la petición API con los datos de filtrado
        /*fetch("api/server/index.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify({
                accion: "obtener_todos_los_empleados",
                sucursal: sucursal,
                rol: rol,
                estado: estado })
        })
            .then(r => r.text())
            .then(t => console.log(t));*/
        api({
            accion: "obtener_todos_los_empleados",
            sucursal: sucursal,
            rol: rol,
            estado: estado
        })
            .then(res => {
                renderizarEmpleados(res.filas);
            })
            .catch(error => {
                console.log("Error al filtrar usuarios:", error.responseText);
            });
    }

    aplicarFiltros();

    //logica para cuando se cambie una opcion de cada select
    select_sucursal.addEventListener("change", aplicarFiltros);
    select_cargo.addEventListener("change", aplicarFiltros);
    select_estado.addEventListener("change", aplicarFiltros);

    //evento para reestablecer los filtros
    reestablecer_filtros.addEventListener("click", () => {
        select_sucursal.selectedIndex = 0;
        select_cargo.selectedIndex = 0;
        select_estado.selectedIndex = 0;

        aplicarFiltros();
    });

});