
<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-3 p-md-5">
            <div class="row justify-content-center align-items-center">
                <div class="col-12 text-center p-2 p-md-5 Quick-title">
                    <h1 class="Quick-title">Registrar Nueva Compra</h1>
                </div>

                <div class="Quick-widget col-12 col-lg-10 p-2 p-md-4 mt-3">
                    <div class="col-12 Quick-form p-3 p-md-5 rounded-2">
                        <form action="" class="form py-2" id="form-compra">

                            <!-- INFORMACIÓN PRINCIPAL -->
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="Quick-title">1. Información Principal</h4>
                                    <hr class="my-2 my-md-3">
                                </div>

                                <div class="col-12 col-md-6 d-flex flex-column py-2">
                                    <label for="compra_fecha" class="form-label Quick-title">Fecha de Compra</label>
                                    <input type="date" id="compra_fecha" name="compra_fecha" class="Quick-form-input" required>
                                </div>

                                <div class="col-12 col-md-6 d-flex flex-column py-2">
                                    <label for="compra_proveedor" class="form-label Quick-title">Proveedor</label>
                                    <select id="compra_proveedor" name="compra_proveedor" class="Quick-form-input" required>
                                        <option value="">Seleccione un Proveedor...</option>
                                        <option value="1">Distribuidora Alpha</option>
                                        <option value="2">Fábrica Gamma</option>
                                        <option value="3">Suministros Beta</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6 d-flex flex-column py-2">
                                    <label for="compra_sucursal" class="form-label Quick-title">Sucursal</label>
                                    <select id="compra_sucursal" name="compra_sucursal" class="Quick-form-input" required>
                                        <option value="">Seleccione una Sucursal...</option>
                                        <option value="1">QuickStock Central</option>
                                        <option value="2">Sucursal Norte</option>
                                        <option value="3">Sucursal Este</option>
                                    </select>
                                </div>

                                <div class="col-12 col-md-6 d-flex flex-column py-2">
                                    <label for="compra_empleado" class="form-label Quick-title">Empleado Responsable</label>
                                    <input type="text" id="compra_empleado" name="compra_empleado" class="Quick-form-input" placeholder="Ej. Juan Pérez" required>
                                </div>
                            </div>

                            <!-- DETALLE DE ARTÍCULOS -->
                            <div class="row mt-3">
                                <div class="col-12">
                                    <h4 class="Quick-title">2. Detalle de Artículos</h4>
                                    <hr class="my-2 my-md-3">
                                </div>

                                <div id="detalle-compra-container" class="col-12">
                                    <div class="row detalle-fila align-items-end mb-2 p-2">
                                        <div class="col-12 col-md-5 d-flex flex-column">
                                            <label class="form-label Quick-title">Artículo</label>
                                            <input type="text" name="articulo[]" class="Quick-form-input" placeholder="Nombre del artículo" required>
                                        </div>

                                        <div class="col-6 col-md-2 d-flex flex-column mt-2 mt-md-0">
                                            <label class="form-label Quick-title">Cantidad</label>
                                            <input type="number" name="cantidad[]" class="Quick-form-input cantidad" min="1" required>
                                        </div>

                                        <div class="col-6 col-md-2 d-flex flex-column mt-2 mt-md-0">
                                            <label class="form-label Quick-title">Precio Unitario</label>
                                            <input type="number" name="precio_unitario[]" class="Quick-form-input precio" min="0.01" step="0.01" required>
                                        </div>

                                        <div class="col-6 col-md-2 d-flex flex-column mt-2 mt-md-0">
                                            <label class="form-label Quick-title">Subtotal</label>
                                            <input type="text" class="Quick-form-input subtotal" readonly value="$0.00">
                                        </div>

                                        <div class="col-6 col-md-1 d-flex justify-content-center mt-3 mt-md-4">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)" title="Eliminar Artículo">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-12 mt-2 text-start">
                                    <button type="button" class="btn btn-primary btn-sm" id="agregar-articulo">
                                        <i class="bi bi-plus-circle"></i> Agregar Artículo
                                    </button>
                                </div>
                            </div>

                            <!-- TOTALES -->
                            <div class="row mt-4">
                                <div class="col-12 col-md-4 d-flex flex-column py-2">
                                    <label class="Quick-title">Subtotal:</label>
                                    <input type="text" id="subtotal_general" class="Quick-form-input" readonly value="$0.00">
                                </div>
                                <div class="col-12 col-md-4 d-flex flex-column py-2">
                                    <label class="Quick-title">IVA (16%):</label>
                                    <input type="text" id="iva_general" class="Quick-form-input" readonly value="$0.00">
                                </div>
                                <div class="col-12 col-md-4 d-flex flex-column py-2">
                                    <label class="Quick-title">Total:</label>
                                    <input type="text" id="total_general" class="Quick-form-input" readonly value="$0.00">
                                </div>
                            </div>

                            <!-- BOTONES -->
                            <div class="row mt-4">
                                <div class="col-12 d-flex flex-column flex-md-row justify-content-around gap-2">
                                    <button type="submit" class="btn btn-success w-100 w-md-auto">Guardar Compra</button>
                                    <button type="reset" class="btn btn-danger w-100 w-md-auto">Limpiar Formulario</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="view/js/compras-añadir.js"></script>