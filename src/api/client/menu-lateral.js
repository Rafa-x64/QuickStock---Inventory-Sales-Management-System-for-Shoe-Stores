import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

document.addEventListener("DOMContentLoaded", ()=>{

    const menu_pequeño = document.getElementById("offcanvasMenuLabel");
    const menu_grande = document.getElementById("nombre_menu_grande");

    api("api/server/index.php", {accion: "obtener_nombre_apellido"}).then(res=>{
        if(!res.nombre || !res.apellido){
            menu_pequeño.textContent = "error";
            menu_grande.textContent = "error";
            exit();
        }

        menu_pequeño.textContent = res.nombre + " " + res.apellido;
        menu_grande.textContent = res.nombre + " " + res.apellido;
        
    });

});