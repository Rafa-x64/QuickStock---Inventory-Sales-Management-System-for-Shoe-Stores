import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

document.addEventListener("DOMContentLoaded", () => {
    const categoriaSelect = document.getElementById("id_categoria");
    const categoriaInput = document.getElementById("nombre_categoria");

    api({ accion: "obtener_categorias" }).then(res => {

        if (!res.categorias || res.categorias.length === 0) {
            categoriaSelect.classList.add("d-none");
            categoriaInput.classList.remove("d-none");
            return;
        }

        categoriaInput.classList.add("d-none");
        categoriaSelect.classList.remove("d-none");

        categoriaSelect.innerHTML = `
            <option value="">Seleccione categoría</option>
        `;

        res.categorias.forEach(categoria => {
            categoriaSelect.innerHTML += `
                <option value="${categoria.id_categoria}">${categoria.nombre}</option>
            `;
        });
    });

    const proveedorSelect = document.getElementById("id_proveedor");

    api({ accion: "obtener_proveedores" }).then(res => {

        if (!res.proveedores || res.proveedores.length === 0) {
            proveedorSelect.innerHTML = `
            <option value="">Ninguno</option>
        `;
            return;
        }

        // Si sí hay → mostrar "Seleccione proveedor" + lista
        proveedorSelect.innerHTML = `
        <option value="">Seleccione proveedor</option>
    `;

        res.proveedores.forEach(p => {
            proveedorSelect.innerHTML += `
            <option value="${p.id_proveedor}">${p.nombre}</option>
        `;
        });
    });

    const colorSelect = document.getElementById("id_color");
    const colorInput = document.getElementById("nombre_color");

    api({ accion: "obtener_colores" }).then(res => {

        if (!res.colores || res.colores.length === 0) {
            colorSelect.classList.add("d-none");
            colorInput.classList.remove("d-none");
            return;
        }

        colorInput.classList.add("d-none");
        colorSelect.classList.remove("d-none");

        colorSelect.innerHTML = `<option value="">Seleccione color</option>`;

        res.colores.forEach(color => {
            colorSelect.innerHTML += `
                <option value="${color.id_color}">${color.nombre}</option>
            `;
        });
    });

    const tallaSelect = document.getElementById("id_talla");
    const tallaInput = document.getElementById("rango_talla");

    api({ accion: "obtener_tallas" }).then(res => {

        if (!res.tallas || res.tallas.length === 0) {
            tallaSelect.classList.add("d-none");
            tallaInput.classList.remove("d-none");
            return;
        }

        tallaInput.classList.add("d-none");
        tallaSelect.classList.remove("d-none");

        tallaSelect.innerHTML = `<option value="">Seleccione talla</option>`;

        res.tallas.forEach(talla => {
            tallaSelect.innerHTML += `
                <option value="${talla.id_talla}">${talla.rango_talla}</option>
            `;
        });
    });

    const sucursalSelect = document.getElementById("id_sucursal");

    api({ accion: "obtener_sucursales" }).then(res => {
        if (!res.filas || res.filas.length === 0) {
            sucursalSelect.innerHTML = `
                <option value="">Seleccione una sucursal</option>
            `;
            return;
        }
        res.filas.forEach(sucursal => {
            sucursalSelect.innerHTML += `
                <option value="${sucursal.id_sucursal}">${sucursal.nombre}</option>
            `;
        });
    });
});