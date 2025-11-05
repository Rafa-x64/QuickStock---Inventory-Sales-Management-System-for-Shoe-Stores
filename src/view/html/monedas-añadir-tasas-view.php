<div class="container-fluid" id="mainContent">
    <div class="row">
        <div class="col-12 p-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">
                <div class="col-6 p-5 Quick-title">
                    <h1>Añadir Tasas</h1>
                </div>
                <div class="row p-0 m-0 d-flex flex-row justify-content-center align-items-center">
                    <div class="col-12 form-container">
                        <form>
                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="moneda-select" class="form-label">Moneda</label>
                                    <select class="form-select" id="moneda-select" name="moneda" required>
                                        <option value="">Seleccione una moneda</option>
                                        <option value="USD">USD - Dólar Estadounidense</option>
                                        <option value="EUR">EUR - Euro</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="tasa-cambio" class="form-label">Tasa de cambio</label>
                                    <input type="number" class="form-control" id="tasa-cambio" name="tasa-cambio" step="0.0001" placeholder="Ej: 227.12" required>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="fecha-vigencia" class="form-label">Fecha de vigencia</label>
                                    <input type="date" class="form-control" id="fecha-vigencia" name="fecha-vigencia" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="usuario" class="form-label">Usuario</label>
                                    <input type="text" class="form-control" id="usuario" name="usuario" value="admin" readonly>
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-12">
                                    <label for="motivo-cambio" class="form-label">Motivo del cambio</label>
                                    <textarea class="form-control" id="motivo-cambio" name="motivo-cambio" rows="4" placeholder="Describa el motivo del cambio de tasa..."></textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="button" class="btn btn-secondary me-3">Cancelar</button>
                                    <button type="submit" class="btn btn-primary btn-submit">Guardar Tasa</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>