// Datos simulados
const mockArticulos = {
    'A001': {
        nombre: 'Laptop Gamer',
        precio: 1250.00
    },
    'A002': {
        nombre: 'Monitor 27"',
        precio: 300.50
    },
    'A003': {
        nombre: 'Teclado Mecánico',
        precio: 80.00
    }
};

/**
 * Muestra el paso actual y oculta todos los demás.
 * @param {number} step - El número de paso a mostrar (1, 2, o 3).
 */
function showStep(step) {
    // Obtenemos los elementos del DOM.
    const steps = document.querySelectorAll('.wizard-step');
    const navLinks = document.querySelectorAll('#wizard-steps .nav-link');
    const progressBar = document.querySelector('.progress-bar');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const submitBtn = document.getElementById('submitBtn');

    // SOLUCIÓN AL PARPADEO: Iteramos para mostrar solo el paso actual.
    // El CSS ya asegura que el Paso 1 esté visible al inicio, esto maneja las transiciones posteriores.
    steps.forEach(s => {
        const stepNum = parseInt(s.getAttribute('data-step'));
        if (stepNum === step) {
            s.style.display = 'block'; // Muestra el paso actual
        } else {
            s.style.display = 'none'; // Oculta los demás
        }
    });

    // Actualiza los botones de navegación
    prevBtn.style.display = (step > 1) ? 'block' : 'none';
    nextBtn.style.display = (step < totalSteps) ? 'block' : 'none';
    submitBtn.style.display = (step === totalSteps) ? 'block' : 'none';

    // Actualiza la barra de progreso
    const progress = (step / totalSteps) * 100;
    progressBar.style.width = `${progress}%`;
    progressBar.setAttribute('aria-valuenow', progress);

    // Actualiza los enlaces de navegación del wizard
    navLinks.forEach(link => {
        const linkStep = parseInt(link.getAttribute('data-step'));
        link.classList.remove('active', 'disabled');
        if (linkStep === step) {
            link.classList.add('active');
        } else if (linkStep < step) {
            link.classList.remove('disabled'); // Habilita pasos anteriores
        } else {
            link.classList.add('disabled');
        }
    });
}

/**
 * Valida los campos requeridos del paso actual.
 * @param {number} step - El número de paso a validar.
 * @returns {boolean} - true si es válido, false en caso contrario.
 */
function validateStep(step) {
    let isValid = true;
    const currentStepEl = document.querySelector(`[data-step="${step}"]`);
    const requiredFields = currentStepEl.querySelectorAll('[required]');
    const detalleVentaTableBody = document.querySelector('#detalleVentaTable tbody');
    const detalleVacioAlert = document.getElementById('detalleVacioAlert');

    // 1. Validación de campos básicos
    requiredFields.forEach(field => {
        if (!field.value) {
            field.classList.add('is-invalid');
            isValid = false;
        } else {
            field.classList.remove('is-invalid');
        }
    });

    // 2. Validación específica para el Paso 2 (Detalles de Venta)
    if (step === 2) {
        if (detalleVentaTableBody.children.length === 0) {
            detalleVacioAlert.style.display = 'block';
            isValid = false;
        } else {
            detalleVacioAlert.style.display = 'none';
            // Validación para los campos requeridos dentro de la tabla (selects, inputs)
            document.querySelectorAll('#detalleVentaTable input[required], #detalleVentaTable select[required]').forEach(input => {
                if (!input.value) {
                    input.classList.add('is-invalid');
                    isValid = false;
                } else {
                    input.classList.remove('is-invalid');
                }
            });
        }
    }

    // 3. Validación específica para el Paso 3 (Pago)
    if (step === 3) {
        const total = parseFloat(document.getElementById('totalVentaDisplay').textContent.replace('$', '').trim());
        const montoPago = parseFloat(document.getElementById('montoPago').value);

        if (isNaN(montoPago) || montoPago < total) {
            document.getElementById('montoPago').classList.add('is-invalid');
            isValid = false;
        } else {
            document.getElementById('montoPago').classList.remove('is-invalid');
        }
    }

    return isValid;
}

function nextStep() {
    if (validateStep(currentStep)) {
        if (currentStep < totalSteps) {
            currentStep++;
            if (currentStep === totalSteps) {
                updateSummary();
            }
            showStep(currentStep);
        }
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        showStep(currentStep);
    }
}

// ----------------------------------------------------------------------
// --- Lógica de Detalle de Venta (Artículos y Totales) ---
// ----------------------------------------------------------------------

function calculateRowTotal(row) {
    const idArticulo = row.querySelector('.id-articulo-input').value;
    const cantidad = parseFloat(row.querySelector('.cantidad-input').value) || 0;
    const descuento = parseFloat(row.querySelector('.descuento-input').value) || 0;
    let precioBase = 0;

    if (mockArticulos[idArticulo]) {
        precioBase = mockArticulos[idArticulo].precio;
    } else {
        // En caso de error o artículo no mockeado, usa el valor del display.
        precioBase = parseFloat(row.querySelector('.precio-base-display').textContent.replace('$', '').trim()) || 0;
    }

    row.querySelector('.precio-base-display').textContent = `$ ${precioBase.toFixed(2)}`;

    const subtotalSinDto = precioBase * cantidad;
    // Cálculo con descuento aplicado
    const subtotalConDto = subtotalSinDto * (1 - descuento / 100);

    row.querySelector('.subtotal-display').textContent = `$ ${subtotalConDto.toFixed(2)}`;
    calculateTotalVenta();
}

function calculateTotalVenta() {
    let total = 0;
    document.querySelectorAll('#detalleVentaTable tbody tr').forEach(row => {
        const subtotalText = row.querySelector('.subtotal-display').textContent;
        // Suma solo si es un número válido.
        total += parseFloat(subtotalText.replace('$', '').trim()) || 0;
    });
    document.getElementById('totalVentaDisplay').textContent = `$ ${total.toFixed(2)}`;
    document.getElementById('resumenTotal').textContent = `$ ${total.toFixed(2)}`;
    calculateChange();
}

function addArticuloRow() {
    const detalleVentaTableBody = document.querySelector('#detalleVentaTable tbody');
    const row = detalleVentaTableBody.insertRow();
    // Genera las opciones del select dinámicamente
    const articuloOptions = Object.keys(mockArticulos).map(id => `<option value="${id}">${mockArticulos[id].nombre} (${id})</option>`).join('');

    row.innerHTML = `
        <td>
            <select class="form-select form-select-sm id-articulo-input" required>
                <option value="" disabled selected>Seleccione Artículo</option>
                ${articuloOptions}
            </select>
            <input type="hidden" class="nombre-articulo-display">
        </td>
        <td><input type="number" class="form-control form-control-sm cantidad-input" min="1" value="1" required></td>
        <td><span class="precio-base-display">$ 0.00</span></td>
        <td><input type="number" class="form-control form-control-sm descuento-input" min="0" max="100" step="0.01" value="0" required></td>
        <td><span class="subtotal-display fw-bold">$ 0.00</span></td>
        <td>
            <button type="button" class="btn btn-danger btn-sm remove-row-btn">
                <i class="bi bi-x"></i>
            </button>
        </td>
    `;

    // Añadir listeners para recalcular al cambiar cantidad/descuento
    const inputs = row.querySelectorAll('.id-articulo-input, .cantidad-input, .descuento-input');
    inputs.forEach(input => {
        input.addEventListener('change', () => calculateRowTotal(row));
        input.addEventListener('input', () => calculateRowTotal(row));
    });

    // Listener para eliminar fila
    row.querySelector('.remove-row-btn').addEventListener('click', () => {
        row.remove();
        calculateTotalVenta();
    });

    // Listener para actualizar el precio base al seleccionar artículo
    row.querySelector('.id-articulo-input').addEventListener('change', (e) => {
        const id = e.target.value;
        if (mockArticulos[id]) {
            row.querySelector('.precio-base-display').textContent = `$ ${mockArticulos[id].precio.toFixed(2)}`;
            row.querySelector('.nombre-articulo-display').value = mockArticulos[id].nombre;
        }
        calculateRowTotal(row);
    });

    // Calcular el total inicial para la nueva fila
    calculateRowTotal(row);
}

// ----------------------------------------------------------------------
// --- Lógica de Pago y Resumen ---
// ----------------------------------------------------------------------

function calculateChange() {
    const total = parseFloat(document.getElementById('totalVentaDisplay').textContent.replace('$', '').trim()) || 0;
    const montoPago = parseFloat(document.getElementById('montoPago').value) || 0;
    const cambio = montoPago - total;
    document.getElementById('resumenCambio').textContent = `$ ${cambio.toFixed(2)}`;

    // Resaltar en rojo si el cambio es negativo (falta dinero)
    if (cambio < 0) {
        document.getElementById('resumenCambio').classList.add('text-danger');
    } else {
        document.getElementById('resumenCambio').classList.remove('text-danger');
    }
}

function updateSummary() {
    const sucursalSelect = document.getElementById('idSucursal');
    const detalleVentaTableBody = document.querySelector('#detalleVentaTable tbody');

    // Mueve los datos del paso 1 y 2 al resumen del paso 3
    document.getElementById('resumenCliente').textContent = document.getElementById('idCliente').value || 'N/A';
    document.getElementById('resumenSucursal').textContent = sucursalSelect.options[sucursalSelect.selectedIndex].textContent || 'N/A';
    document.getElementById('resumenCantArticulos').textContent = detalleVentaTableBody.children.length;

    calculateChange(); // Asegura que el cambio se calcule con el total final.
}

// ----------------------------------------------------------------------
// --- Inicialización y Listeners (Asegurar que el DOM esté cargado) ---
// ----------------------------------------------------------------------

document.addEventListener('DOMContentLoaded', () => {
    // Asignación de variables de elementos del DOM (ahora seguro)
    const form = document.getElementById('ventaWizardForm');
    const prevBtn = document.getElementById('prevBtn');
    const nextBtn = document.getElementById('nextBtn');
    const addArticuloBtn = document.getElementById('addArticuloBtn');
    const navLinks = document.querySelectorAll('#wizard-steps .nav-link');
    const detalleVentaTableBody = document.querySelector('#detalleVentaTable tbody');

    // Inicialización: Llama a showStep(1). El CSS ya hizo el trabajo de ocultar,
    // esta llamada solo finaliza la configuración de botones y enlaces.
    showStep(currentStep);

    // 1. Event Listeners para navegación
    nextBtn.addEventListener('click', nextStep);
    prevBtn.addEventListener('click', prevStep);

    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const step = parseInt(link.getAttribute('data-step'));
            // Permite ir a pasos anteriores si no está deshabilitado
            if (!link.classList.contains('disabled')) {
                currentStep = step;
                // Si el usuario salta al paso 3, actualizamos el resumen
                if (currentStep === totalSteps) {
                    updateSummary();
                }
                showStep(currentStep);
            }
        });
    });

    // 2. Event Listeners para detalle de venta y pago
    addArticuloBtn.addEventListener('click', addArticuloRow);

    const montoPagoInput = document.getElementById('montoPago');
    if (montoPagoInput) {
        montoPagoInput.addEventListener('input', calculateChange);
        montoPagoInput.addEventListener('change', calculateChange);
    }

    // 3. Agregar la fila inicial de artículo
    if (detalleVentaTableBody.children.length === 0) {
        addArticuloRow();
    }

    // 4. Listener para el envío final del formulario
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        if (validateStep(currentStep)) {
            // Recopilación de todos los datos del formulario
            const ventaData = {
                id_cliente: document.getElementById('idCliente').value,
                id_sucursal: document.getElementById('idSucursal').value,
                id_empleado: document.getElementById('idEmpleado').value,
                fecha_venta: document.getElementById('fechaVenta').value,
                detalles: Array.from(detalleVentaTableBody.children).map(row => ({
                    id_articulo: row.querySelector('.id-articulo-input').value,
                    cantidad: row.querySelector('.cantidad-input').value,
                    descuento: row.querySelector('.descuento-input').value,
                    // Se podría añadir el subtotal final aquí para la API
                })),
                tipo_pago: document.getElementById('tipoPago').value,
                monto_pago: document.getElementById('montoPago').value,
            };

            console.log('Datos de Venta a Enviar:', ventaData);
            alert('Venta Finalizada con éxito! (Ver consola para datos simulados)');
        }
    });
});