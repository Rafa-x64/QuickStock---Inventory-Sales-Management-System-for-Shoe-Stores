<div class="container-fluid" id="mainContent">
    <div class="row d-flex flex-column justify-content-center align-items-center">
        <div class="col-12 p-3 p-lg-5">
            <div class="row d-flex flex-row justify-content-center align-items-center">

                <div class="col-12 p-5 Quick-title">
                    <h1 class="m-0 p-0">Añadir un Nuevo Proveedor</h1>
                </div>

                <div class="Quick-widget col-8 p-0 p-2">
                    <div class="col-12 Quick-form px-5 rounded-2">
                        <form action="" class="form py-3">
                            <div class="row d-flex flex-row justify-content-center align-items-center">

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="proveedor_codigo" class="form-label Quick-title">Código del Proveedor</label>
                                    <input type="text" id="proveedor_codigo" name="proveedor_codigo" class="Quick-form-input" placeholder="Ej: PROV-001" required>
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="proveedor_rif" class="form-label Quick-title">RIF</label>
                                    <input type="text" id="proveedor_rif" name="proveedor_rif" class="Quick-form-input" placeholder="Ej: J-12345678-9" required>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="proveedor_nombre" class="form-label Quick-title">Nombre / Razón Social</label>
                                    <input type="text" id="proveedor_nombre" name="proveedor_nombre" class="Quick-form-input" placeholder="Razón social completa del proveedor" required>
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="proveedor_pais" class="form-label Quick-title">País</label>
                                    <select id="proveedor_pais" name="proveedor_pais" class="Quick-form-input" required>
                                        <option value="">Seleccionar país...</option>
                                        <option value="Venezuela">Venezuela</option>
                                        <option value="Colombia">Colombia</option>
                                        <option value="Brasil">Brasil</option>
                                        <option value="Argentina">Argentina</option>
                                        <option value="Chile">Chile</option>
                                        <option value="Perú">Perú</option>
                                        <option value="Ecuador">Ecuador</option>
                                        <option value="México">México</option>
                                        <option value="Estados Unidos">Estados Unidos</option>
                                        <option value="China">China</option>
                                        <option value="España">España</option>
                                        <option value="Otro">Otro</option>
                                    </select>
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="proveedor_estado" class="form-label Quick-title">Estado</label>
                                    <select id="proveedor_estado" name="proveedor_estado" class="Quick-form-input" required>
                                        <option value="Activo" selected>Activo</option>
                                        <option value="Inactivo">Inactivo</option>
                                        <option value="Pendiente">Pendiente</option>
                                    </select>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="proveedor_direccion" class="form-label Quick-title">Dirección Completa</label>
                                    <textarea name="proveedor_direccion" id="proveedor_direccion" class="Quick-form-input" rows="3" placeholder="Dirección completa incluyendo ciudad, estado y código postal" required></textarea>
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="proveedor_telefono" class="form-label Quick-title">Teléfono</label>
                                    <input type="text" id="proveedor_telefono" name="proveedor_telefono" class="Quick-form-input" placeholder="Ej: 0412-555-1234" required>
                                </div>

                                <div class="col-6 d-flex flex-column py-3">
                                    <label for="proveedor_email" class="form-label Quick-title">Email</label>
                                    <input type="email" id="proveedor_email" name="proveedor_email" class="Quick-form-input" placeholder="proveedor@empresa.com" required>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="proveedor_contacto" class="form-label Quick-title">Persona de Contacto</label>
                                    <input type="text" id="proveedor_contacto" name="proveedor_contacto" class="Quick-form-input" placeholder="Nombre de la persona de contacto">
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <label for="proveedor_observaciones" class="form-label Quick-title">Observaciones</label>
                                    <textarea name="proveedor_observaciones" id="proveedor_observaciones" class="Quick-form-input" rows="2" placeholder="Información adicional sobre el proveedor"></textarea>
                                </div>

                                <div class="col-12 d-flex flex-column py-3">
                                    <div class="row p-0 m-0 d-flex flex-row justify-content-around align-items-center">
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="submit" class="btn btn-success w-100">
                                                <i class="bi bi-check-circle me-2"></i>Guardar Proveedor
                                            </button>
                                        </div>
                                        <div class="col-5 p-0 m-0 d-flex flex-column justify-content-center align-items-center">
                                            <button type="reset" class="btn btn-danger w-100">
                                                <i class="bi bi-x-circle me-2"></i>Limpiar Formulario
                                            </button>
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