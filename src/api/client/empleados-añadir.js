//obligatorio uso de import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js" 
import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

//dispara el codigo cuando se carga la pagina
document.addEventListener("DOMContentLoaded", () => {

    const select_rol = document.getElementById("id_rol");

    //realizar peticion y hacer una funcion para utilizar el objeto recibido como respuesta
    api({ accion: "obtener_roles" }).then(res => {
        //aplican la logica para operar con la respuesta
        res.filas.forEach(rol => {

            if (rol.id_rol == 1) {
                return;
            }

            const nueva_opcion = document.createElement("option");
            nueva_opcion.value = rol.id_rol;
            nueva_opcion.textContent = rol.nombre_rol;
            select_rol.appendChild(nueva_opcion);
        });
    });

    const select_sucursal = document.getElementById("id_sucursal");

    api({ accion: "obtener_sucursales" }).then(res => {
        res.filas.forEach(sucursal => {
            const nueva_opcion = document.createElement("option");
            nueva_opcion.value = sucursal.id_sucursal;
            nueva_opcion.textContent = sucursal.nombre;
            select_sucursal.appendChild(nueva_opcion);
        });
    });

});