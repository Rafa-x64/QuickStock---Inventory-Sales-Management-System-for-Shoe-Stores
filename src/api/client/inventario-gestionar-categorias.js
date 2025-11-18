import { api } from "/DEV/PHP/QuickStock/src/api/client/index.js"

document.addEventListener("DOMContentLoaded", () => {
    //obtener campo de busqueda
    const categoriaInput = document.getElementById("categoria_input");
    //obtener tabla
    const tablaCategorias = document.getElementById("tabla_categorias");


    api({ accion: "obtener_categorias" }).then(res => {

        let filas = '';

        res.categorias.forEach(categoria => {

            const esActivo = categoria.activo === 't' || categoria.activo === true;

            const estadoTexto = esActivo ? 'Activo' : 'Inactivo';
            const estadoClase = esActivo ? 'bg-success' : 'bg-danger';

            const estadoActivo = `
            <span class="badge ${estadoClase} text-white p-2">
                ${estadoTexto}
            </span>
        `;

            const nombrePadre = categoria.nombre_categoria_padre
                ? categoria.nombre_categoria_padre
                : '<span>Ninguno</span>';

            const descripcion = categoria.descripcion
                ? categoria.descripcion
                : '<span>Ninguno</span>';

            let fila =
                `<tr>
                    <td>${categoria.nombre}</td>
                    <td>${descripcion}</td>
                    <td>${nombrePadre}</td>
                    <td>${estadoActivo}</td>
                    <td>
                        <form action="inventario-editar-categorias" method="POST" class="d-inline">
                            <input type="hidden" name="accion" id="accion" value="editar">
                            <input type="hidden" name="id_categoria" id="id_categoria" value="${categoria.id_categoria}">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-pencil fs-5"></i>
                            </button>
                        </form>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="accion" id="accion" value="eliminar">
                            <input type="hidden" name="id_categoria" id="id_categoria" value="${categoria.id_categoria}">
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </form>
                    </td>
                </tr>`;

            filas += fila;
        });
        tablaCategorias.innerHTML = filas;
    });


    //traer todas las categroias de la bd
    const selectCatAñadir = document.getElementById("categoria_padre_añadir");
    const selectCatEditar = document.getElementById("categoria_padre_editar");

    api({ accion: "obtener_categorias" }).then(res => {
        res.categorias.forEach(categoria => {
            let fila = `<option value="${categoria.id_categoria}">${categoria.nombre}</option>`;
            selectCatAñadir.innerHTML += fila;
            selectCatEditar.innerHTML += fila;
        });
    });

    //cargar datos al formulario de editar
    const idCategoria = document.getElementById("id_categoria_editar");
    const nombreCategoriaInput = document.getElementById("nombre_categoria_editar");
    const descripcionCategoriaInput = document.getElementById("descripcion_categoria_editar");
    const categoriaPadreSelect = document.getElementById("categoria_padre_editar");
    const estadoCategoriaSelect = document.getElementById("activo_editar");

    if (idCategoria && idCategoria.value) {

        const id = idCategoria.value;

        api({ accion: "obtener_categoria_por_id", id_categoria: id }).then(res => {

            const cat = res.categoria;

            if (cat) {
                nombreCategoriaInput.value = cat.nombre || '';
                descripcionCategoriaInput.value = cat.descripcion || '';

                categoriaPadreSelect.value = cat.id_categoria_padre || '';

                const esActivo = cat.activo === 't' || cat.activo === true;

                estadoCategoriaSelect.value = esActivo ? 'activo' : 'inactivo';

            } else {
                console.error(`No se encontraron datos para la categoría con ID: ${id}`);
            }
        }).catch(error => {
            console.error("Error al obtener datos de la categoría:", error);
        });

    } else {
        console.log("No se ha seleccionado ninguna categoría para edición. El formulario de edición no se rellenará.");
    }

    //filtro de busqueda
    const filtroBusqueda = document.getElementById("categoria_input");

    filtroBusqueda.addEventListener("keyup", () => {
        const busqueda = filtroBusqueda.value.trim().toLowerCase();
        api({ accion: "obtener_categorias_filtro", string: busqueda }).then(res => {
            let filas = '';

            if (res.categorias && res.categorias.length > 0) {
                res.categorias.forEach(categoria => {

                    const esActivo = categoria.activo === 't' || categoria.activo === true;

                    const estadoTexto = esActivo ? 'Activo' : 'Inactivo';
                    const estadoClase = esActivo ? 'bg-success' : 'bg-danger';

                    const estadoActivo = `
            <span class="badge ${estadoClase} text-white p-2">
                ${estadoTexto}
            </span>
        `;

                    const nombrePadre = categoria.nombre_categoria_padre
                        ? categoria.nombre_categoria_padre
                        : '<span>Ninguno</span>';

                    const descripcion = categoria.descripcion
                        ? categoria.descripcion
                        : '<span>Ninguno</span>';

                    let fila =
                        `<tr>
                    <td>${categoria.nombre}</td>
                    <td>${descripcion}</td>
                    <td>${nombrePadre}</td>
                    <td>${estadoActivo}</td>
                    <td>
                        <form action="inventario-editar-categorias" method="POST" class="d-inline">
                            <input type="hidden" name="accion" id="accion" value="editar">
                            <input type="hidden" name="id_categoria" id="id_categoria" value="${categoria.id_categoria}">
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-pencil fs-5"></i>
                            </button>
                        </form>
                        <form action="" method="POST" class="d-inline">
                            <input type="hidden" name="accion" id="accion" value="eliminar">
                            <input type="hidden" name="id_categoria" id="id_categoria" value="${categoria.id_categoria}">
                            <button type="submit" class="btn btn-danger">
                                <i class="bi bi-trash fs-5"></i>
                            </button>
                        </form>
                    </td>
                </tr>`;

                    filas += fila;
                });
            } else {
                // No hay resultados, mostrar el mensaje de "no hay categorías"
                filas = `
                <tr>
                    <td colspan="5" class="text-center p-3">
                        <i class="bi bi-exclamation-triangle-fill"></i> No hay categorías con este nombre.
                    </td>
                </tr>
            `;
            }

            tablaCategorias.innerHTML = filas;
        });
    });

});
