import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

document.addEventListener("DOMContentLoaded", () => {

    const email = document.getElementById("id_email")?.value;

    if (!email) {
        console.error("No se recibió un email para mostrar el detalle.");
        return;
    }

    // Elementos a rellenar
    const detNombre = document.getElementById("det_nombre");
    const detApellido = document.getElementById("det_apellido");
    const detCedula = document.getElementById("det_cedula");
    const detRol = document.getElementById("det_rol");
    const detSucursal = document.getElementById("det_sucursal");
    const detEmail = document.getElementById("det_email");
    const detTelefono = document.getElementById("det_telefono");
    const detEstado = document.getElementById("det_estado");

    const detDireccion = document.getElementById("det_direccion");
    const detFecha = document.getElementById("det_fecha");

    const detBreadcrumb = document.getElementById("det_breadcrumb");

    // Petición principal
    api({ accion: "obtener_un_usuario", email }).then(res => {

        if (!res.empleado) {
            console.error("Empleado no encontrado");
            return;
        }

        const emp = res.empleado;

        // Información general
        detNombre.textContent = emp.nombre ?? "";
        detApellido.textContent = emp.apellido ?? "";
        detCedula.textContent = emp.cedula ?? "";
        detRol.textContent = emp.nombre_rol ?? "";
        detSucursal.textContent = emp.sucursal_nombre ?? "Sin asignar";
        detEmail.textContent = emp.email ?? "";
        detTelefono.textContent = emp.telefono ?? "";

        // Estado (badge)
        let badge =
            emp.activo
                ? `<span class="badge bg-success">Activo</span>`
                : `<span class="badge bg-danger">Inactivo</span>`;

        detEstado.innerHTML = badge;

        // Información adicional
        detDireccion.textContent = emp.direccion ?? "";
        detFecha.textContent = emp.fecha_registro?.split(" ")[0] ?? "";

        // Breadcrumb dinámico
        detBreadcrumb.textContent = `${emp.nombre} ${emp.apellido}`;

    }).catch(err => {
        console.log("Error al cargar el detalle del empleado:", err);
    });

});
