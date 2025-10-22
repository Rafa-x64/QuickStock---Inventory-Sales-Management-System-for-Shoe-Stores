<!--<style>
    [class^="col"] {
        border: 2px solid blue;
    }

    [class^="row"] {
        border: 2px solid red;
    }

    [class^="container"] {
        border: 2px solid green;
    }
</style>-->
<div class="container-fluid" id="mainContent"><!--para hacer la vista responsive y poder meterle el dashboard-->
    <div class="row d-flex flex-column justify-content-center align-items-center"><!--importante poner-->
        <div class="col-12 p-3 p-lg-5"><!--importante añadir-->
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Añadir un Nuevo Producto</h1>
                </div>
                <div class="Quick-widget col-8 p-0 p-2">
                    <div class="col-12 Quick-form px-5 rounded-2">
                        <form action="" class="form py-3">
                            <div class="row d-flex flex-row justify-content-center align-items-center">
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_id" class="form-label Quick-title">Codigo de Barras del Producto</label>
                                    <input type="text" id="producto_id" name="producto_id" class="Quick-form-input">
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_nombre" class="form-label Quick-title">Nombre</label>
                                    <input type="text" id="producto_nombre" name="producto_nombre" class="Quick-form-input">
                                </div>
                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="producto_descripcion" class="form-label Quick-title">Descripcion</label>
                                    <textarea name="producto_descripcion" id="producto_descripcion" class="Quick-form-input" rows="3"></textarea>
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_categoria" class="form-label Quick-title">Categoria</label>
                                    <select name="producto_categoria" id="producto_categoria" class="Quick-select">
                                        <option value="" selected>Seleccione la categoria</option>
                                        <option value="">Traer de la base de datos</option>
                                    </select>
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_costo_compra" class="form-label Quick-title">Costo de Compra (Bs.)</label>
                                    <input type="number" step="100" min="0" id="producto_costo_compra" name="producto_costo_compra" class="Quick-form-input">
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_precio_venta" class="form-label Quick-title">Precio de Venta (Bs.)</label>
                                    <input type="number" step="100" min="0" id="producto_precio_venta" name="producto_precio_venta" class="Quick-form-input">
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_stock_minimo" class="form-label Quick-title">Stock Minimo</label>
                                    <input type="number" step="4" min="1" id="producto_stock_minimo" name="producto_stock_minimo" class="Quick-form-input">
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_proveedor" class="form-label Quick-title">Proveedor</label>
                                    <input type="text" id="producto_proveedor" name="producto_proveedor" class="Quick-form-input">
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_talla_minima" class="form-label Quick-title">Rango de talla</label>
                                    <div class="row d-flex flex-row justify-content-around align-items-center">
                                        <div class="col-4 p-0 m-0">
                                            <input type="number" step="1" min="1" id="producto_talla_minima" name="producto_talla_minima" class="Quick-form-input w-100">
                                        </div>
                                        <div class="col-2 p-0 m-0 text-center">
                                            <p class="w-100 p-0 m-0">-</p>
                                        </div>
                                        <div class="col-4 p-0 m-0">
                                            <input type="number" step="1" min="1" id="producto_talla_maxima" name="producto_talla_maxima" class="Quick-form-input w-100">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="producto_impuesto" class="form-label Quick-title">Impuesto</label>
                                    <select name="producto_impuesto" id="producto_impuesto" class="Quick-select">
                                        <option value="" selected>Seleccione el impuesto</option>
                                        <option value="">Ninguno</option>
                                        <option value="">Traer de la base de datos</option>
                                    </select>
                                </div>
                                <div class="col-6 d-flex flex-column py-3">
                                    <div class="row p-0 m-0 d-flex flex-row justify-content-around align-items-center">
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-success">Agregar</button>
                                        </div>
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="reset" class="btn btn-danger">Limpiar</button>
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