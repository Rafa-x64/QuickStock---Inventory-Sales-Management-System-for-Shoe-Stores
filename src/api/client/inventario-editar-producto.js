import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js";

document.addEventListener("DOMContentLoaded", () => {
    const idProductoInput = document.getElementById("id_producto");
    if (!idProductoInput || !idProductoInput.value) {
        console.error("No se encontró el ID del producto");
        return;
    }
    const idProducto = idProductoInput.value;

    // Referencias a campos del formulario
    const codigoInput = document.getElementById("codigo_barra");
    const nombreInput = document.getElementById("nombre");
    const descripcionInput = document.getElementById("descripcion");
    const categoriaSelect = document.getElementById("id_categoria");
    const nombreCategoriaInput = document.getElementById("nombre_categoria");
    const proveedorSelect = document.getElementById("id_proveedor");
    const colorSelect = document.getElementById("id_color");
    const nombreColorInput = document.getElementById("nombre_color");
    const tallaSelect = document.getElementById("id_talla");
    const rangoTallaInput = document.getElementById("rango_talla");
    const precioInput = document.getElementById("precio");
    const sucursalSelect = document.getElementById("id_sucursal");
    const cantidadInput = document.getElementById("cantidad");
    const minimoInput = document.getElementById("minimo");

    // Traer producto
    api({ accion: "obtener_un_producto", id_producto: idProducto })
        .then(res => {
            const p = res; // Ya no necesitamos res.producto, el PHP devuelve directamente el producto
            if (!p) {
                console.error("Producto no encontrado");
                return;
            }

            // Rellenar campos simples
            codigoInput.value = p.codigo_barra ?? "";
            nombreInput.value = p.nombre ?? "";
            descripcionInput.value = p.descripcion ?? "";
            precioInput.value = p.precio ?? 0;
            nombreCategoriaInput.value = p.nombre_categoria ?? "";
            nombreColorInput.value = p.nombre_color ?? "";
            rangoTallaInput.value = p.rango_talla ?? "";

            // Rellenar selects y seleccionar valor actual

            // Categorías
            api({ accion: "obtener_categorias" }).then(rCat => {
                rCat.categorias.forEach(cat => {
                    const op = document.createElement("option");
                    op.value = cat.id_categoria;
                    op.textContent = cat.nombre;
                    if (cat.id_categoria == p.id_categoria) op.selected = true;
                    categoriaSelect.appendChild(op);
                });
            });

            // Proveedores
            api({ accion: "obtener_proveedores" }).then(rProv => {
                rProv.proveedores.forEach(prov => {
                    const op = document.createElement("option");
                    op.value = prov.id_proveedor;
                    op.textContent = prov.nombre;
                    if (prov.id_proveedor == p.id_proveedor) op.selected = true;
                    proveedorSelect.appendChild(op);
                });
            });

            // Colores
            api({ accion: "obtener_colores" }).then(rCol => {
                rCol.colores.forEach(c => {
                    const op = document.createElement("option");
                    op.value = c.id_color;
                    op.textContent = c.nombre;
                    if (c.id_color == p.id_color) op.selected = true;
                    colorSelect.appendChild(op);
                });
            });

            // Tallas
            api({ accion: "obtener_tallas" }).then(rTall => {
                rTall.tallas.forEach(t => {
                    const op = document.createElement("option");
                    op.value = t.id_talla;
                    op.textContent = t.rango_talla;
                    if (t.id_talla == p.id_talla) op.selected = true;
                    tallaSelect.appendChild(op);
                });
            });

            // Sucursales e inventario
            api({ accion: "obtener_sucursales" }).then(rSuc => {
                rSuc.filas.forEach(s => {
                    const op = document.createElement("option");
                    op.value = s.id_sucursal;
                    op.textContent = s.nombre;
                    // Buscar cantidad y mínimo de inventario
                    if (p.inventario && p.inventario.length > 0) {
                        const inv = p.inventario.find(i => i.id_sucursal == s.id_sucursal);
                        if (inv) {
                            cantidadInput.value = inv.cantidad ?? 0;
                            minimoInput.value = inv.minimo ?? 0;
                            if (inv.id_sucursal == p.inventario[0].id_sucursal) op.selected = true;
                        }
                    }
                    sucursalSelect.appendChild(op);
                });
            });

        })
        .catch(err => console.error("Error cargando producto:", err));
});