<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 col-md-6 p-3 Quick-title">
                    <h1 class="m-0">Gestión de Categorías</h1>
                </div>

                <div class="col-12 col-md-6 p-3 d-flex flex-row justify-content-end align-items-center">
                    <form action="" class="d-flex flex-row w-100 justify-content-end">
                        <input type="search" placeholder="Buscar Categoría..." class="Quick-input me-2" id="categoria-buscar">
                        <button type="submit" class="btn btn-secondary">
                            <i class="bi bi-search fs-6"></i>
                        </button>
                    </form>
                </div>
            </div>

            <div class="col-12 col-md-6 p-3 mt-2 mt-md-3 Quick-title">
                <h1 class="m-0">Ver Categorias</h1>
            </div>
            <!-- Tabla responsive -->
            <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center Quick-widget">
                <div class="col-12 Quick-table pt-5 mb-3 table-responsive">
                    <table class="align-middle w-100">
                        <thead class="text-center">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Categoría Padre</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Zapatillas Deportivas</td>
                                <td>Calzado para correr y entrenamiento, materiales ligeros.</td>
                                <td>—</td>
                                <td class="text-center">
                                    <div class="container-fluid p-0">
                                        <div class="row g-1">
                                            <div class="col-6">
                                                <button class="btn btn-warning btn-sm w-100">Editar</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger btn-sm w-100">Eliminar</button>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-sm w-100">Ver Detalle</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Calzado Formal</td>
                                <td>Zapatos de vestir para hombre y mujer (ej: Oxford, Mocasín).</td>
                                <td>—</td>
                                <td class="text-center">
                                    <div class="container-fluid p-0">
                                        <div class="row g-1">
                                            <div class="col-6">
                                                <button class="btn btn-warning btn-sm w-100">Editar</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger btn-sm w-100">Eliminar</button>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-sm w-100">Ver Detalle</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>Botas de Invierno</td>
                                <td>Calzado con aislamiento térmico y suela antideslizante.</td>
                                <td>Calzado Formal</td>
                                <td class="text-center">
                                    <div class="container-fluid p-0">
                                        <div class="row g-1">
                                            <div class="col-6">
                                                <button class="btn btn-warning btn-sm w-100">Editar</button>
                                            </div>
                                            <div class="col-6">
                                                <button class="btn btn-danger btn-sm w-100">Eliminar</button>
                                            </div>
                                            <div class="col-12">
                                                <button class="btn btn-primary btn-sm w-100">Ver Detalle</button>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Formulario de registro -->
            <div class="col-12 col-md-6 p-3 mt-3 mt-md-3 Quick-title">
                <h1 class="m-0">Añadir una nueva categoria</h1>
            </div>
            <div class="Quick-widget col-12 col-md-8 p-0 mt-md-0 p-2">
                <div class="col-12 Quick-form px-5 rounded-2">
                    <form action="" method="POST" class="form">
                        <div class="row d-flex flex-row justify-content-center align-items-center">

                            <div class="col-12 col-md-6 d-flex flex-column py-3">
                                <label for="nombre_categoria" class="form-label Quick-title">Nombre de la Categoría</label>
                                <input type="text" id="nombre_categoria" name="nombre_categoria" class="Quick-form-input" required>
                            </div>

                            <div class="col-12 col-md-6 d-flex flex-column py-3">
                                <label for="categoria_padre" class="form-label Quick-title">Categoría Padre (opcional)</label>
                                <select id="categoria_padre" name="categoria_padre" class="Quick-select">
                                    <option value="">Ninguna (categoría principal)</option>
                                    <option value="1">Traer de la base de datos</option>
                                </select>
                            </div>

                            <div class="col-12 d-flex flex-column py-3">
                                <label for="descripcion_categoria" class="form-label Quick-title">Descripción</label>
                                <textarea id="descripcion_categoria" name="descripcion_categoria" class="Quick-form-input" rows="3" maxlength="255"></textarea>
                            </div>

                            <div class="col-12 d-flex flex-column py-3">
                                <div class="row p-0 m-0 d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-around align-items-md-center">
                                    <div class="col-12 col-md-3 d-flex justify-content-center">
                                        <button type="submit" class="btn btn-success w-100">Guardar</button>
                                    </div>
                                    <div class="col-12 mt-2 mt-md-0 col-md-3 d-flex justify-content-center">
                                        <button type="reset" class="btn btn-danger w-100">Limpiar</button>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>