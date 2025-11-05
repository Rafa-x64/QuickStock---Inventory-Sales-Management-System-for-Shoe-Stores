<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Registrar Nuevo Producto</h1>
                </div>

                <div class="Quick-widget col-12 col-md-8 p-0 p-2">
                    <div class="col-12 Quick-form px-4 rounded-2">
                        <form action="" method="POST" class="form py-3">

                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <!-- Identificación del producto -->
                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="codigo_barras" class="form-label Quick-title">Código de Barras / SKU</label>
                                    <input type="text" id="codigo_barras" name="codigo_barras" class="Quick-form-input" maxlength="50" required>
                                </div>

                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="nombre_producto" class="form-label Quick-title">Nombre del Producto</label>
                                    <input type="text" id="nombre_producto" name="nombre_producto" class="Quick-form-input" maxlength="255" required>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="descripcion_producto" class="form-label Quick-title">Descripción</label>
                                    <textarea id="descripcion_producto" name="descripcion_producto" class="Quick-form-input" rows="3" maxlength="255"></textarea>
                                </div>

                                <!-- Relacionales -->
                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="categoria_id" class="form-label Quick-title">Categoría</label>
                                    <select id="categoria_id" name="categoria_id" class="Quick-select" required>
                                        <option value="">Seleccione la categoría</option>
                                        <option value="1">Traer de la base de datos</option>
                                    </select>
                                </div>

                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="proveedor_id" class="form-label Quick-title">Proveedor</label>
                                    <select id="proveedor_id" name="proveedor_id" class="Quick-select" required>
                                        <option value="">Seleccione el proveedor</option>
                                        <option value="1">Traer de la base de datos</option>
                                    </select>
                                </div>

                                <!-- Características -->
                                <div class="col-md-4 d-flex flex-column py-3">
                                    <label for="color_producto" class="form-label Quick-title">Color</label>
                                    <input type="text" id="color_producto" name="color_producto" class="Quick-form-input" maxlength="50">
                                </div>

                                <div class="col-md-4 d-flex flex-column py-3">
                                    <label for="talla_producto" class="form-label Quick-title">Talla / Medida</label>
                                    <input type="text" id="talla_producto" name="talla_producto" class="Quick-form-input">
                                </div>

                                <div class="col-md-4 d-flex flex-column py-3">
                                    <label for="unidad_medida" class="form-label Quick-title">Unidad de Medida</label>
                                    <select id="unidad_medida" name="unidad_medida" class="Quick-select">
                                        <option value="">Seleccione unidad</option>
                                        <option value="par">Par</option>
                                        <option value="unidad">Unidad</option>
                                        <option value="docena">Docena</option>
                                    </select>
                                </div>

                                <!-- Precios -->
                                <div class="col-md-4 d-flex flex-column py-3">
                                    <label for="precio_compra" class="form-label Quick-title">Costo de Compra (Bs.)</label>
                                    <input type="number" id="precio_compra" name="precio_compra" class="Quick-form-input" step="0.01" min="0" required>
                                </div>

                                <div class="col-md-4 d-flex flex-column py-3">
                                    <label for="precio_venta" class="form-label Quick-title">Precio de Venta (Bs.)</label>
                                    <input type="number" id="precio_venta" name="precio_venta" class="Quick-form-input" step="0.01" min="0" required>
                                </div>

                                <div class="col-md-4 d-flex flex-column py-3">
                                    <label for="impuesto_id" class="form-label Quick-title">Impuesto</label>
                                    <select id="impuesto_id" name="impuesto_id" class="Quick-select">
                                        <option value="">Seleccione impuesto</option>
                                        <option value="0">Exento</option>
                                        <option value="1">Traer de la base de datos</option>
                                    </select>
                                </div>

                                <!-- Stock y Sucursal -->
                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="stock_inicial" class="form-label Quick-title">Stock Inicial</label>
                                    <input type="number" id="stock_inicial" name="stock_inicial" class="Quick-form-input" min="0" required>
                                </div>

                                <div class="col-md-6 d-flex flex-column py-3">
                                    <label for="stock_minimo" class="form-label Quick-title">Stock Mínimo</label>
                                    <input type="number" id="stock_minimo" name="stock_minimo" class="Quick-form-input" min="1" required>
                                </div>

                                <div class="col-md-12 d-flex flex-column py-3">
                                    <label for="sucursal_id" class="form-label Quick-title">Sucursal</label>
                                    <select id="sucursal_id" name="sucursal_id" class="Quick-select" required>
                                        <option value="">Seleccione la sucursal</option>
                                        <option value="1">QuickStock Central</option>
                                    </select>
                                </div>

                                <!-- Botones -->
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
</div>