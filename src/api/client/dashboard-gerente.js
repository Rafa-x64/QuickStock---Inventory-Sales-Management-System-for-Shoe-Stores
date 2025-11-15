import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js"

    document.addEventListener("DOMContentLoaded", () => {
        const nombreSucursalInput = document.getElementById("nombre_sucursal");

        api({accion: "obtener_nombre_sucursal"}).then(res=>{
            console.log(res.nombre_sucursal);
            nombreSucursalInput.textContent = "" + res.nombre_sucursal;
        });
        
    });