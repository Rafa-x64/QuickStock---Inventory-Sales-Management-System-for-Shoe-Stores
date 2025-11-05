<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Añadir Monedas</h1>
                </div>
                <!-- Formulario para añadir monedas -->
                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center">
                    <div class="col-12 form-container">
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="codigo-iso" class="form-label">Código ISO 4217</label>
                                    <input type="text" class="form-control" id="codigo-iso" name="codigo-iso" maxlength="3" placeholder="Ej: USD, EUR, GBP" required>
                                    <div class="form-text">Código de 3 letras según estándar ISO 4217</div>
                                </div>
                                <div class="col-md-6">
                                    <label for="simbolo" class="form-label">Símbolo</label>
                                    <input type="text" class="form-control" id="simbolo" name="simbolo" placeholder="Ej: $, €, £" required>
                                    <div class="form-text">Símbolo monetario utilizado</div>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="nombre-oficial" class="form-label">Nombre oficial</label>
                                    <input type="text" class="form-control" id="nombre-oficial" name="nombre-oficial" placeholder="Ej: Dólar Estadounidense" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="pais-origen" class="form-label">País de origen</label>
                                    <input type="text" class="form-control" id="pais-origen" name="pais-origen" placeholder="Ej: Estados Unidos" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="decimales" class="form-label">Decimales permitidos</label>
                                    <select class="form-select" id="decimales" name="decimales" required>
                                        <option value="0">0 decimales (Ej: 1.000)</option>
                                        <option value="1">1 decimal (Ej: 1.000,0)</option>
                                        <option value="2" selected>2 decimales (Ej: 1.000,00)</option>
                                        <option value="3">3 decimales (Ej: 1.000,000)</option>
                                        <option value="4">4 decimales (Ej: 1.000,0000)</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="estado-moneda" class="form-label">Estado</label>
                                    <div class="mt-2">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="estado-moneda" id="estado-activa" value="activa" checked>
                                            <label class="form-check-label" for="estado-activa">
                                                <span class="badge bg-success">Activa</span>
                                            </label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="estado-moneda" id="estado-inactiva" value="inactiva">
                                            <label class="form-check-label" for="estado-inactiva">
                                                <span class="badge bg-secondary">Inactiva</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-text">Las monedas inactivas no estarán disponibles para nuevas transacciones</div>
                                </div>
                            </div>
                            <div class="preview-container">
                                <h5 class="preview-label">Previsualización de formato:</h5>
                                <div class="preview-example" id="preview-format"></div>
                                <div class="form-text">Esta es una vista previa de cómo se mostrarán los valores con esta moneda</div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-3">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-submit">Guardar Moneda</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>