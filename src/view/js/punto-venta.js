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
    const detalleVentaTable = document.querySelector("#detalleVentaTable tbody");

    const totalVentaDisplay = document.getElementById("totalVentaDisplay");
    const resumenTotal = document.getElementById("resumenTotal");
    const resumenCambio = document.getElementById("resumenCambio");
    const montoPagado = document.getElementById("montoPagado");

    let currentStep = 0;     // Paso 0: Registrar Cliente
    let totalVenta = 0;

    // --------------------------------------
    // MOSTRAR PASO
    // --------------------------------------
    const showStep = (step) => {
        wizardSteps.forEach((s, i) => {
            s.style.display = (i === step) ? "block" : "none";
        });

        navLinks.forEach((link, i) => {
            link.classList.toggle("active", i === step);
            link.classList.toggle("disabled", i > step);
        });

        progressBar.style.width = `${((step + 1) / wizardSteps.length) * 100}%`;

        prevBtn.style.display = step === 0 ? "none" : "inline-block";
        nextBtn.style.display = step === wizardSteps.length - 1 ? "none" : "inline-block";
        submitBtn.style.display = step === wizardSteps.length - 1 ? "inline-block" : "none";
    };

    // --------------------------------------
    // VALIDAR PASO ACTUAL (Bootstrap)
    // --------------------------------------
    const validateStep = (step) => {
        let isValid = true;

        const fields = wizardSteps[step].querySelectorAll("input, select, textarea");

        fields.forEach(field => {
            if (!field.checkValidity()) {
                field.classList.add("is-invalid");
                isValid = false;
            } else {
                field.classList.remove("is-invalid");
            }
        });

        // Paso 2 requiere productos
        if (step === 2 && detalleVentaTable.children.length === 0) {
            alert("Debe agregar al menos un producto.");
            return false;
        }

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

    showStep(currentStep);

    // --------------------------------------
    // AGREGAR FILAS DEL DETALLE
    // --------------------------------------
    const agregarFila = () => {
        const fila = document.createElement("tr");

        fila.innerHTML = `
            <td>
                <input type="text" class="form-control variante-input" placeholder="ID Variante / SKU" required>
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
                <button type="button" class="btn btn-danger btn-sm eliminarFilaBtn">
                    <i class="bi bi-x-lg"></i>
                </button>
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

    // --------------------------------------
    // CALCULAR TOTAL Y SUBTOTALES
    // --------------------------------------
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

    detalleVentaTable.addEventListener("input", recalcularTotales);

    // --------------------------------------
    // CAMBIO POR MONTO PAGADO
    // --------------------------------------
    const recalcularCambio = () => {
        const pago = parseFloat(montoPagado.value) || 0;
        const cambio = pago - totalVenta;
        resumenCambio.textContent = cambio >= 0 ? `$ ${cambio.toFixed(2)}` : "$ 0.00";
    };

    montoPagado.addEventListener("input", recalcularCambio);

    // --------------------------------------
    // SUBMIT FINAL
    // --------------------------------------
    form.addEventListener("submit", (e) => {
        e.preventDefault();

        if (!validateStep(3)) {
            alert("Complete los campos requeridos.");
            return;
        }

        if (detalleVentaTable.children.length === 0) {
            alert("Agregue al menos un producto.");
            currentStep = 2;
            showStep(currentStep);
            return;
        }

        // DATOS CLIENTE
        const cliente = {
            cedula: document.getElementById("cliente_cedula").value,
            nombre: document.getElementById("cliente_nombre").value,
            apellido: document.getElementById("cliente_apellido").value,
            email: document.getElementById("cliente_email").value,
            telefono: document.getElementById("cliente_telefono").value,
            direccion: document.getElementById("cliente_direccion").value
        };

        // DATOS VENTA
        const venta = {
            sucursal: document.getElementById("idSucursal").value,
            id_usuario: document.getElementById("idUsuario").value,
            id_caja_turno: document.getElementById("idCajaTurno").value,
            fecha: document.getElementById("fechaHora").value,
            id_moneda: document.getElementById("idMoneda").value
        };

        // DETALLE
        const detalle = [];

        detalleVentaTable.querySelectorAll("tr").forEach(row => {
            detalle.push({
                variante: row.querySelector(".variante-input").value,
                cantidad: row.querySelector(".cantidad-input").value,
                precio: row.querySelector(".precio-input").value,
                descuento: row.querySelector(".descuento-input").value
            });
        });

        // PAGO
        const pago = {
            id_metodo_pago: document.getElementById("idMetodoPago").value,
            monto_pagado: document.getElementById("montoPagado").value,
            moneda_pago: document.getElementById("idMonedaPago").value,
            referencia: document.getElementById("referenciaPago").value,
            tasa_conversion: document.getElementById("tasaConversion").value,
            comentario: document.getElementById("pagoComentario").value
        };

        // OBJETO FINAL
        const FINAL = { cliente, venta, detalle, pago };

        console.log("JSON FINAL:", FINAL);
        alert("✅ Venta registrada correctamente (ver consola).");

        form.reset();
        detalleVentaTable.innerHTML = "";
        totalVentaDisplay.textContent = "$ 0.00";
        resumenTotal.textContent = "$ 0.00";
        resumenCambio.textContent = "$ 0.00";

        currentStep = 0;
        showStep(currentStep);
    });

});
