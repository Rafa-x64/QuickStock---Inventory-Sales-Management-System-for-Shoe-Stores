<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">

                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Registrar Nuevo Producto</h1>
                </div>

                <div class="Quick-widget col-12 col-md-8 p-0 p-2">
                    <div class="col-12 Quick-form px-4 rounded-2">

                        <form id="formProducto" action="" method="POST" class="form py-3 needs-validation" novalidate>
                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <!-- CÓDIGO DE BARRA -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="codigo_barra" class="form-label Quick-title">Código de Barras / SKU</label>
                                    <input type="text" id="codigo_barra" name="codigo_barra" class="Quick-form-input" maxlength="255" required>
                                    <div class="invalid-tooltip">
                                        Código de barras obligatorio (solo letras, números y guiones).
                                    </div>
                                </div>

                                <!-- NOMBRE -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
                                    <label for="nombre" class="form-label Quick-title">Nombre del Producto</label>
                                    <input type="text" id="nombre" name="nombre" class="Quick-form-input" maxlength="150" required>
                                    <div class="invalid-tooltip">
                                        El nombre es obligatorio y solo puede contener letras, números y espacios.
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
                                    <input type="text" name="nombre_categoria" id="nombre_categoria" placeholder="Añadir nueva categoría" class="Quick-form-input">
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
                                    <input type="text" name="nombre_color" id="nombre_color" placeholder="Añadir color" class="Quick-form-input">
                                    <select id="id_color" name="id_color" class="Quick-select" required>
                                        <option value="">Seleccione color</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Debe seleccionar o agregar un color válido.
                                    </div>
                                </div>

                                <!-- TALLA -->
                                <div class="col-md-4 d-flex flex-column py-3 position-relative">
                                    <label for="id_talla" class="form-label Quick-title">Talla</label>
                                    <input type="text" name="rango_talla" id="rango_talla" placeholder="39 - 41" class="Quick-form-input">
                                    <select id="id_talla" name="id_talla" class="Quick-select" required>
                                        <option value="">Seleccione talla</option>
                                    </select>
                                    <div class="invalid-tooltip">
                                        Debe seleccionar o agregar una talla válida.
                                    </div>
                                </div>

                                <!-- PRECIO -->
                                <div class="col-md-4 d-flex flex-column py-3 position-relative">
                                    <label for="precio" class="form-label Quick-title">Precio (Bs.)</label>
                                    <input type="number" id="precio" name="precio" class="Quick-form-input" step="0.01" min="0.01" required>
                                    <div class="invalid-tooltip">
                                        El precio debe ser mayor que 0.
                                    </div>
                                </div>

                                <!-- SUCURSAL -->
                                <div class="col-md-6 d-flex flex-column py-3 position-relative">
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
                                            <button type="submit" class="btn btn-success w-100">Registrar</button>
                                        </div>
                                        <div class="col-5 col-md-3 d-flex justify-content-center">
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
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include_once "controller/inventario_añadir_producto_C.php";

        $mensaje = inventario_añadir_producto_C::agregarProducto($_POST);

        // Mostramos alerta usando JavaScript
        echo "<script>
        if ('{$mensaje}' === 'Producto agregado correctamente') {
            alert('{$mensaje}');
            // Opcional: limpiar el formulario automáticamente
            document.getElementById('formProducto').reset();
        } else {
            alert('Error: {$mensaje}');
        }
    </script>";
    }
    ?>
</div>

<script type="module" src="api/client/inventario-añadir-producto.js"></script>
<script src="view/js/inventario-añadir-producto.js"></script>