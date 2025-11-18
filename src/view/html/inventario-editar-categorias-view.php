<?php
$accion = $_POST["accion"] ?? null;
$id_categoria = $_POST["id_categoria"] ?? null;
?>
<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 col-md-6 p-3 Quick-title">
                    <h1 class="m-0">Gestión de Categorías</h1>
                </div>

                <div class="col-12 col-md-6 p-3 d-flex flex-row justify-content-end align-items-center">
                    <input type="search" placeholder="Buscar Categoría..." class="Quick-input me-2" id="categoria_input">
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
                                <th>Activo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_categorias">
                            <!-- Se llenará dinámicamente desde la base de datos -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Formulario de registro -->
            <div class="d-none" id="formulario_registro">
                <div class="col-12 col-md-6 p-3 mt-3 mt-md-3 Quick-title">
                    <h1 class="m-0">Añadir una nueva categoria</h1>
                </div>
                <div class="row d-flex flex-column justify-content-center align-items-center">
                    <div class="col-12 col-md-8 p-0 mt-md-0 p-2 Quick-widget">
                        <div class="col-12 Quick-form px-5 rounded-2">
                            <form action="" method="POST" class="form">
                                <div class="row d-flex flex-row justify-content-center align-items-center">

                                    <div class="col-12 col-md-6 d-flex flex-column py-3">
                                        <label for="nombre_categoria_añadir" class="form-label Quick-title">Nombre de la Categoría</label>
                                        <input type="text" id="nombre_categoria_añadir" name="nombre_categoria_añadir" class="Quick-form-input" required>
                                    </div>

                                    <div class="col-12 col-md-6 d-flex flex-column py-3">
                                        <label for="categoria_padre_editar_añadir" class="form-label Quick-title">Categoría Padre (opcional)</label>
                                        <select name="categoria_padre_añadir" id="categoria_padre_añadir" class="Quick-select">
                                            <option value="">Ninguna</option>
                                        </select>
                                    </div>

                                    <div class="col-12 d-flex flex-column py-3">
                                        <label for="descripcion_categoria_añadir" class="form-label Quick-title">Descripción</label>
                                        <textarea id="descripcion_categoria_añadir" name="descripcion_categoria_añadir" class="Quick-form-input" rows="3" maxlength="255"></textarea>
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

            <div class="d-block" id="formulario_edicion">
                <div class="col-12 col-md-6 p-3 mt-3 mt-md-3 Quick-title">
                    <h1 class="m-0">Editar categoria</h1>
                </div>
                <div class="row d-flex flex-column justify-content-center align-items-center">
                    <div class="col-12 col-md-8 p-0 mt-md-0 p-2 Quick-widget">
                        <div class="col-12 Quick-form px-5 rounded-2">
                            <form action="" method="POST" class="form needs-validation" id="form_editar_categoria" novalidate>
                                <div class="row d-flex flex-row justify-content-start align-items-center">

                                    <input type="hidden" name="accion" value="__editar">
                                    <input type="hidden" name="id_categoria_editar" id="id_categoria_editar" value="<?php echo $id_categoria; ?>">

                                    <div class="col-12 col-md-6 d-flex flex-column py-3">
                                        <label for="nombre_categoria_editar" class="form-label Quick-title">Nombre de la Categoría</label>
                                        <div class="position-relative">
                                            <input
                                                type="text"
                                                id="nombre_categoria_editar"
                                                name="nombre_categoria_editar"
                                                class="Quick-form-input form-control"
                                                required
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                title=""
                                                data-bs-trigger="manual"
                                                autocomplete="off"
                                                maxlength="100">
                                            <div class="invalid-tooltip" id="tooltip_nombre_editar"></div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 d-flex flex-column py-3">
                                        <label for="categoria_padre_editar" class="form-label Quick-title">Categoría Padre (opcional)</label>
                                        <select name="categoria_padre_editar" id="categoria_padre_editar" class="Quick-select form-select">
                                            <option value="">Ninguna</option>
                                        </select>
                                    </div>

                                    <div class="col-12 d-flex flex-column py-3">
                                        <label for="descripcion_categoria_editar" class="form-label Quick-title">Descripción</label>
                                        <div class="position-relative">
                                            <textarea
                                                id="descripcion_categoria_editar"
                                                name="descripcion_categoria_editar"
                                                class="Quick-form-input form-control"
                                                rows="3"
                                                maxlength="255"
                                                data-bs-toggle="tooltip"
                                                data-bs-placement="right"
                                                title=""
                                                data-bs-trigger="manual"></textarea>
                                            <div class="invalid-tooltip" id="tooltip_descripcion_editar"></div>
                                        </div>
                                    </div>

                                    <div class="col-12 col-md-6 d-flex flex-column py-3">
                                        <label for="activo_editar" class="form-label Quick-title">Estado</label>
                                        <select id="activo_editar" name="activo_editar" class="Quick-select form-select">
                                            <option value="activo">Activo</option>
                                            <option value="inactivo">Inactivo</option>
                                        </select>
                                    </div>

                                    <div class="col-12 d-flex flex-column py-3">
                                        <div class="row p-0 m-0 d-flex flex-column flex-md-row justify-content-center align-items-center justify-content-md-around align-items-md-center">
                                            <div class="col-12 col-md-3 d-flex justify-content-center">
                                                <button type="submit" class="btn btn-success w-100" id="btn_guardar_editar">Guardar</button>
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
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST["accion"] ?? null) == "__editar") {
                include_once "controller/inventario_gestionar_categorias_C.php";
                $resultado = gestionar_categorias_C::editarCategoria($_POST);

                if (isset($resultado["success"])) {
                    echo '<script>alert(' . $resultado["mensaje"] . ')</script>';
                    echo '<script>window.location.href = "inventario-gestionar-categorias"</script>';
                } elseif (isset($resultado["error"])) {
                    echo '<script>alert(' . $resultado["mensaje"] . ')</script>';
                    echo '<script>window.location.href = "inventario-gestionar-categorias"</script>';
                }
            } elseif ($_SERVER["REQUEST_METHOD"] == "POST" && ($_POST["accion"] ?? null) == "eliminar") {
                // Lógica para ELIMINAR Categoría
                include_once "controller/inventario_gestionar_categorias_C.php";
                $resultado = gestionar_categorias_C::eliminarCategoria($_POST);

                if (isset($resultado["success"])) {
                    echo '<script>alert(' . $resultado["mensaje"] . ')</script>';
                    echo '<script>window.location.href = "inventario-gestionar-categorias"</script>';
                } elseif (isset($resultado["error"])) {
                    echo '<script>alert(' . $resultado["mensaje"] . ')</script>';
                    echo '<script>window.location.href = "inventario-gestionar-categorias"</script>';
                }
            }
            ?>
        </div>
    </div>
</div>


<script type="module" src="api/client/inventario-gestionar-categorias.js"></script>
<script src="view/js/inventario-editar-categoria.js"></script>