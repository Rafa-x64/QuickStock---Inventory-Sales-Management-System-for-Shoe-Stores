<?php
$accion = $_POST["accion"] ?? null;
$id_producto  = $_POST["id_producto"]  ?? ($_POST["id_producto"] ?? null);
?>
<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">

                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Editar Producto</h1>
                </div>

                <div class="Quick-widget col-12 col-md-8 p-0 p-2">
                    <div class="col-12 Quick-form px-4 rounded-2">

                        <form id="formProducto" action="" method="POST" class="form py-3 needs-validation" novalidate>
                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <!-- ID y accion -->
                                <input type="hidden" name="accion" id="accion" value="<?php echo $accion . "_producto" ?>">
                                <input type="hidden" name="id_producto" id="id_producto" value="<?php echo $id_producto ?>">

                                <!-- CÓDIGO DE BARRA -->
                                <div class="col-md-4 d-flex flex-column py-3 position-relative">
                                    <label for="codigo_barra" class="form-label Quick-title">Código de Barras / SKU</label>
                                    <input type="text" id="codigo_barra" name="codigo_barra" class="Quick-form-input" maxlength="255" required>
                                    <div class="invalid-tooltip">
                                        Código de barras obligatorio (solo letras, números y guiones).
                                    </div>
                                </div>

                                <!-- NOMBRE -->
                                <div class="col-md-4 d-flex flex-column py-3 position-relative">
                                    <label for="nombre" class="form-label Quick-title">Nombre del Producto</label>
                                    <input type="text" id="nombre" name="nombre" class="Quick-form-input" maxlength="150" required>
                                    <div class="invalid-tooltip">
                                        El nombre es obligatorio y solo puede contener letras, números y espacios.
                                    </div>
                                </div>

                                <!-- ACTIVO  -->
                                <div class="col-md-4 d-flex flex-column py-3 position-relative">
                                    <label for="activo" class="form-label Quick-title">Estado</label>
                                    <select id="activo" name="activo" class="Quick-select" required>
                                        <option value="true">Activo</option>
                                        <option value="false">Inactivo</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Debe seleccionar un estado (Activo o Inactivo).
                                    </div>
                                </div>

                                <!-- DESCRIPCIÓN -->
                                <div class="col-12 d-flex flex-column py-3 position-relative">
                                    <label for="descripcion" class="form-label Quick-title">Descripción</label>
                                    <textarea id="descripcion" name="descripcion" class="Quick-form-input" rows="3" required></textarea>
                                    <div class="invalid-tooltip">
                                        Debe escribir una descripción válida.
                                    </div>
                                </div>

                                <!-- CATEGORÍA -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="id_categoria" class="form-label Quick-title">Categoría</label>
                                    <select id="id_categoria" name="id_categoria" class="Quick-select" required>
                                        <option value="">Seleccione categoría</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Debe seleccionar o agregar una categoría válida.
                                    </div>
                                </div>

                                <!-- PROVEEDOR -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="id_proveedor" class="form-label Quick-title">Proveedor</label>
                                    <select id="id_proveedor" name="id_proveedor" class="Quick-select" required>
                                        <option value="">Seleccione proveedor</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Debe seleccionar un proveedor válido.
                                    </div>
                                </div>

                                <!-- COLOR -->
                                <div class="col-md-4 d-flex flex-column py-3 position-relative">
                                    <label for="id_color" class="form-label Quick-title">Color</label>

                                    <div id="color-input-container">
                                        <input type="text" name="nombre_color" id="nombre_color" placeholder="Añadir color" class="Quick-form-input">
                                        <button type="button" class="btn btn-link btn-sm p-0 mt-1" data-toggle="color" data-mode="select">
                                            Seleccionar color existente
                                        </button>
                                    </div>

                                    <div id="color-select-container" style="display: none;">
                                        <select id="id_color" name="id_color" class="Quick-select" required>
                                            <option value="">Seleccione color</option>
                                        </select>
                                        <button type="button" class="btn btn-link btn-sm p-0 mt-1" data-toggle="color" data-mode="new">
                                            ¿Nuevo Color?
                                        </button>
                                    </div>

                                    <div class="invalid-tooltip">
                                        Debe seleccionar o agregar un color válido.
                                    </div>
                                </div>


                                <!-- TALLA -->
                                <div class="col-md-4 d-flex flex-column py-3 position-relative">
                                    <label for="id_talla" class="form-label Quick-title">Talla</label>

                                    <div id="talla-select-container">
                                        <select id="id_talla" name="id_talla" class="Quick-select" required>
                                            <option value="">Seleccione talla</option>
                                        </select>
                                        <button type="button" class="btn btn-link btn-sm p-0 mt-1" data-toggle="talla" data-mode="new">
                                            ¿Nueva Talla?
                                        </button>
                                    </div>

                                    <div id="talla-input-container" style="display: none;">
                                        <input type="text" name="rango_talla" id="rango_talla" placeholder="39 - 41" class="Quick-form-input">
                                        <button type="button" class="btn btn-link btn-sm p-0 mt-1" data-toggle="talla" data-mode="select">
                                            Seleccionar existente
                                        </button>
                                    </div>

                                    <div class="invalid-tooltip">
                                        Debe seleccionar o agregar una talla válida.
                                    </div>
                                </div>

                                <!-- PRECIO COMPRA -->
                                <div class="col-md-4 d-flex flex-column py-3 position-relative">
                                    <label for="precio_compra" class="form-label Quick-title">Precio Compra (Bs.)</label>
                                    <input type="number" id="precio_compra" name="precio_compra" class="Quick-form-input" step="0.01" min="1.00" required>
                                    <div class="invalid-tooltip">
                                        El precio de compra es obligatorio y debe ser mayor o igual a 1.00.
                                    </div>
                                </div>

                                <!-- PRECIO VENTA-->
                                <div class="col-md-3 d-flex flex-column py-3 position-relative">
                                    <label for="precio" class="form-label Quick-title">Precio Venta (Bs.)</label>
                                    <input type="number" id="precio" name="precio" class="Quick-form-input" step="0.01" min="0.01" required>
                                    <div class="invalid-tooltip">
                                        El precio de venta debe ser mayor que 0.
                                    </div>
                                </div>

                                <!-- SUCURSAL -->
                                <div class="col-md-3 d-flex flex-column py-3 position-relative">
                                    <label for="id_sucursal" class="form-label Quick-title">Sucursal</label>
                                    <select id="id_sucursal" name="id_sucursal" class="Quick-select" required>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Debe seleccionar una sucursal.
                                    </div>
                                </div>

                                <!-- CANTIDAD (STOCK) -->
                                <div class="col-md-3 d-flex flex-column py-3 position-relative">
                                    <label for="cantidad" class="form-label Quick-title">Stock Inicial</label>
                                    <input type="number" id="cantidad" name="cantidad" class="Quick-form-input" min="0" required>
                                    <div class="invalid-tooltip">
                                        Stock inicial obligatorio y no puede ser negativo.
                                    </div>
                                </div>

                                <!-- MINIMO -->
                                <div class="col-md-3 d-flex flex-column py-3 position-relative">
                                    <label for="minimo" class="form-label Quick-title">Stock Mínimo</label>
                                    <input type="number" id="minimo" name="minimo" class="Quick-form-input" min="1" required>
                                    <div class="invalid-tooltip">
                                        Stock mínimo obligatorio y debe ser mayor o igual a 1.
                                    </div>
                                </div>

                                <!-- BOTONES -->
                                <div class="col-12 d-flex flex-row justify-content-center align-items-center py-3">
                                    <div class="row w-100 d-flex justify-content-around">
                                        <div class="col-5 col-md-3 d-flex justify-content-center">
                                            <button type="submit" class="btn btn-success w-100">Editar</button>
                                        </div>
                                        <div class="col-5 col-md-3 d-flex justify-content-center">
                                            <button type="button" class="btn btn-danger w-100" id="btnReset">Reestablecer</button>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["accion"] == "editar_producto") {
                include_once "controller/inventario_editar_producto_C.php";

                // Llamar al método estático del controlador
                $resp = inventario_editar_producto_C::editarProducto($_POST);

                // Manejar la respuesta
                if (isset($resp["success"])) {
                    echo "<script>alert('Producto editado correctamente');</script>";
                    echo "<script>window.location.href = 'inventario-ver-productos';</script>";
                } else {
                    $msg = $resp["error"] ?? "Error desconocido al editar el producto.";
                    echo "<script>alert('Error: " . htmlspecialchars($msg) . "');</script>";
                }
            }
            ?>
        </div>
    </div>

    <script type="module" src="api/client/inventario-editar-producto.js"></script>
    <script src="view/js/inventario-editar-producto.js"></script>