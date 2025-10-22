<div class="container-fluid" id="mainContent"><!--para hacer la vista responsive y poder meterle el dashboard-->
    <div class="row"><!--importante poner-->
        <div class="col-12 p-5"><!--importante poner-->
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-12 p-5 Quick-title">
                    <h1 class="Quick-title">Añadir Compra</h1>
                </div>
                <div class="Quick-widget col-10 p-0 mt-5 p-2">
                    <div class="col-12 Quick-form px-5 rounded-2">
                        <form action="" class="form py-3">
                            <div class="row">
                                <div class="col-12">
                                    <h4 class="Quick-title">1. Información Principal de la Compra</h4>
                                    <hr class="my-3">
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="compra_fecha" class="form-label Quick-title">Fecha de Compra</label>
                                    <input type="date" id="compra_fecha" name="compra_fecha" class="Quick-form-input" required value="2025-10-21">
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="compra_proveedor" class="form-label Quick-title">Proveedor</label>
                                    <select id="compra_proveedor" name="compra_proveedor" class="Quick-form-input" required>
                                        <option value="">Seleccione un Proveedor...</option>
                                        <option value="1">Distribuidora Alpha</option>
                                        <option value="2">Fábrica Gamma</option>
                                        <option value="3">Suministros Beta</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12">
                                    <h4 class="Quick-title">2. Detalle de Artículos a Comprar</h4>
                                    <hr class="my-3">
                                </div>

                                <div id="detalle-compra-container" class="col-12">
                                    <div class="row detalle-fila align-items-end mb-3 p-2">
                                        <div class="col-5 d-flex flex-column">
                                            <label for="Articulo" class="form-label Quick-title">Articulo</label>
                                            <input type="text" id="Articulo" name="Articulo" class="Quick-form-input" required>
                                        </div>

                                        <div class="col-3 d-flex flex-column">
                                            <label for="cantidad_1" class="form-label Quick-title">Cantidad</label>
                                            <input type="number" id="cantidad_1" name="cantidad[]" class="Quick-form-input" min="1" required>
                                        </div>

                                        <div class="col-3 d-flex flex-column">
                                            <label for="precio_1" class="form-label Quick-title">Precio Unitario</label>
                                            <input type="number" id="precio_1" name="precio_unitario[]" class="Quick-form-input" min="0.01" step="0.01" required>
                                        </div>

                                        <div class="col-1 d-flex flex-column">
                                            <button type="button" class="btn btn-danger btn-sm" onclick="eliminarFila(this)" title="Eliminar Artículo">
                                                <i class="bi bi-x-lg"></i>
                                            </button>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-12 mt-3 text-start">
                                    <button type="button" class="btn btn-primary btn-sm" id="agregar-articulo">
                                        <i class="bi bi-plus-circle"></i> Agregar Artículo
                                    </button>
                                </div>
                            </div>


                            <div class="row mt-5">
                                <div class="col-12 d-flex flex-column py-3">
                                    <div class="row p-0 m-0 d-flex flex-row justify-content-around align-items-center">
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-success">Guardar Compra</button>
                                        </div>
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="reset" class="btn btn-danger">Limpiar Formulario</button>
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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.getElementById('detalle-compra-container');
        const addButton = document.getElementById('agregar-articulo');
        let count = 1; // Contador para ID únicos

        addButton.addEventListener('click', function() {
            count++;

            const lastRow = container.querySelector('.detalle-fila:last-child');
            const newRow = lastRow.cloneNode(true);

            newRow.querySelectorAll('input, select').forEach(element => {
                const oldId = element.id;
                const newId = oldId.replace(/\d+$/, count);

                element.id = newId;
                element.value = ''; // Limpia el valor

                const label = newRow.querySelector(`label[for="${oldId}"]`);
                if (label) {
                    label.setAttribute('for', newId);
                }
            });

            const deleteButton = newRow.querySelector('.btn-danger');
            if (deleteButton) {
                deleteButton.onclick = function() {
                    eliminarFila(this);
                };
            }

            container.appendChild(newRow);
        });

        window.eliminarFila = function(button) {
            const rowToRemove = button.closest('.detalle-fila');
            if (container.querySelectorAll('.detalle-fila').length > 1) {
                rowToRemove.remove();
            } else {
                alert("Debe haber al menos un artículo en la compra.");
                rowToRemove.querySelectorAll('input, select').forEach(element => {
                    element.value = '';
                });
            }
        };

    });
</script>