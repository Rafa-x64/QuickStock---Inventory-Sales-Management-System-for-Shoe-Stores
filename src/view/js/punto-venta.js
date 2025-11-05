document.addEventListener("DOMContentLoaded", () => {
    // Referencias generales
    const wizardSteps = document.querySelectorAll(".wizard-step");
    const navLinks = document.querySelectorAll("#wizard-steps .nav-link");
    const progressBar = document.querySelector(".progress-bar");
    const nextBtn = document.getElementById("nextBtn");
    const prevBtn = document.getElementById("prevBtn");
    const submitBtn = document.getElementById("submitBtn");
    const form = document.getElementById("ventaWizardForm");
    const addArticuloBtn = document.getElementById("addArticuloBtn");
    const detalleVentaTable = document.getElementById("detalleVentaTable").querySelector("tbody");
    const totalVentaDisplay = document.getElementById("totalVentaDisplay");
    const resumenTotal = document.getElementById("resumenTotal");
    const resumenCambio = document.getElementById("resumenCambio");
    const montoPagado = document.getElementById("montoPagado");

    let currentStep = 1;
    let totalVenta = 0;

    // ==============================
    // FUNCIONES DEL WIZARD
    // ==============================

    const showStep = (step) => {
        wizardSteps.forEach((s, i) => {
            s.style.display = (i + 1 === step) ? "block" : "none";
        });
        navLinks.forEach((link, i) => {
            if (i + 1 === step) link.classList.add("active");
            else link.classList.remove("active");
            link.classList.toggle("disabled", i + 1 > step);
        });

        // Actualizar progreso
        progressBar.style.width = `${(step / wizardSteps.length) * 100}%`;

        // Control de botones
        prevBtn.style.display = step === 1 ? "none" : "inline-block";
        nextBtn.style.display = step === wizardSteps.length ? "none" : "inline-block";
        submitBtn.style.display = step === wizardSteps.length ? "inline-block" : "none";
    };

    const validateStep = (step) => {
        let isValid = true;
        const stepFields = wizardSteps[step - 1].querySelectorAll("input, select");
        stepFields.forEach(field => {
            if (!field.checkValidity()) {
                field.classList.add("is-invalid");
                isValid = false;
            } else {
                field.classList.remove("is-invalid");
            }
        });
        return isValid;
    };

    nextBtn.addEventListener("click", () => {
        if (validateStep(currentStep)) {
            currentStep++;
            showStep(currentStep);
        }
    });

    prevBtn.addEventListener("click", () => {
        currentStep--;
        showStep(currentStep);
    });

    showStep(currentStep); // Inicializar

    // ==============================
    // DETALLE DE PRODUCTOS
    // ==============================

    // Función para agregar fila de producto
    const agregarFila = () => {
        const fila = document.createElement("tr");
        fila.innerHTML = `
            <td>
                <input type="text" class="form-control variante-input" 
                       placeholder="Nombre o código de barras / SKU" required>
            </td>
            <td>
                <input type="number" class="form-control cantidad-input" min="1" value="1" required>
            </td>
            <td>
                <input type="number" class="form-control precio-input" min="0.01" step="0.01" value="0.00" required>
            </td>
            <td>
                <input type="number" class="form-control descuento-input" min="0" max="100" value="0">
            </td>
            <td class="fw-bold subtotal">$0.00</td>
            <td>
                <button type="button" class="btn btn-danger btn-sm eliminarFilaBtn"><i class="bi bi-x-lg"></i></button>
            </td>
        `;
        detalleVentaTable.appendChild(fila);

        fila.querySelectorAll("input").forEach(input => {
            input.addEventListener("input", recalcularTotales);
        });

        fila.querySelector(".eliminarFilaBtn").addEventListener("click", () => {
            fila.remove();
            recalcularTotales();
        });
    };

    addArticuloBtn.addEventListener("click", agregarFila);

    // Recalcular totales
    const recalcularTotales = () => {
        totalVenta = 0;
        detalleVentaTable.querySelectorAll("tr").forEach(row => {
            const cantidad = parseFloat(row.querySelector(".cantidad-input").value) || 0;
            const precio = parseFloat(row.querySelector(".precio-input").value) || 0;
            const descuento = parseFloat(row.querySelector(".descuento-input").value) || 0;

            let subtotal = cantidad * precio;
            subtotal -= subtotal * (descuento / 100);

            totalVenta += subtotal;

            row.querySelector(".subtotal").textContent = `$ ${subtotal.toFixed(2)}`;
        });

        totalVentaDisplay.textContent = `$ ${totalVenta.toFixed(2)}`;
        resumenTotal.textContent = `$ ${totalVenta.toFixed(2)}`;
        recalcularCambio();
    };

    // Validar variante/código de barras
    detalleVentaTable.addEventListener("blur", (e) => {
        if (e.target.classList.contains("variante-input")) {
            const value = e.target.value.trim();
            if (!value) {
                e.target.classList.add("is-invalid");
                e.target.setCustomValidity("Debe ingresar un nombre o código de barras");
            } else {
                e.target.classList.remove("is-invalid");
                e.target.setCustomValidity("");
            }
        }
    }, true);

    // ==============================
    // PAGO Y CONFIRMACIÓN
    // ==============================

    const recalcularCambio = () => {
        const pago = parseFloat(montoPagado.value) || 0;
        const cambio = pago - totalVenta;
        resumenCambio.textContent = cambio >= 0 ? `$ ${cambio.toFixed(2)}` : "$ 0.00";
    };

    montoPagado.addEventListener("input", recalcularCambio);

    // ==============================
    // ENVÍO FINAL DEL FORMULARIO
    // ==============================

    form.addEventListener("submit", (e) => {
        e.preventDefault();

        if (!validateStep(3)) {
            alert("Por favor completa todos los campos obligatorios.");
            return;
        }

        if (detalleVentaTable.querySelectorAll("tr").length === 0) {
            alert("Debes agregar al menos un producto antes de finalizar la venta.");
            currentStep = 2;
            showStep(currentStep);
            return;
        }

        // Construir objeto de venta
        const venta = {
            cliente: document.getElementById("idCliente").value.trim(),
            sucursal: document.getElementById("idSucursal").value,
            usuario: document.getElementById("idUsuario").value,
            cajaTurno: document.getElementById("idCajaTurno").value,
            fechaHora: document.getElementById("fechaHora").value,
            moneda: document.getElementById("idMoneda").value,
            metodoPago: document.getElementById("idMetodoPago").value,
            montoPagado: parseFloat(document.getElementById("montoPagado").value) || 0,
            monedaPago: document.getElementById("idMonedaPago").value,
            referenciaPago: document.getElementById("referenciaPago").value.trim(),
            total: totalVenta.toFixed(2),
            detalles: []
        };

        detalleVentaTable.querySelectorAll("tr").forEach(row => {
            const variante = row.querySelector(".variante-input").value.trim();
            const cantidad = parseFloat(row.querySelector(".cantidad-input").value) || 0;
            const precio = parseFloat(row.querySelector(".precio-input").value) || 0;
            const descuento = parseFloat(row.querySelector(".descuento-input").value) || 0;
            const subtotal = cantidad * precio - (cantidad * precio * descuento / 100);

            venta.detalles.push({ variante, cantidad, precio, descuento, subtotal });
        });

        console.log("🧾 Venta registrada:", venta);
        alert("✅ Venta registrada con éxito (ver consola).");

        form.reset();
        detalleVentaTable.innerHTML = "";
        totalVentaDisplay.textContent = "$ 0.00";
        resumenTotal.textContent = "$ 0.00";
        resumenCambio.textContent = "$ 0.00";
        currentStep = 1;
        showStep(currentStep);
    });
});
