document.addEventListener("DOMContentLoaded", function () {

    // ========== 1. SELECCIÓN DE ELEMENTOS ==========
    const form = document.getElementById('multiStepForm').querySelector('form');

    const allSteps = document.querySelectorAll('.form-step');
    const steps = Array.from(allSteps).slice(0, 4);

    const allIndicators = document.querySelectorAll('.progress-step-custom');
    const indicators = Array.from(allIndicators).slice(0, 4);

    let currentStep = 1;
    const totalSteps = steps.length;

    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const submitButton = document.getElementById('submitButton');


    // ========== 2. REGLAS DE VALIDACIÓN ==========
    const validationRules = {

        // --- Sucursal ---
        sucursal_nombre: {
            regex: /.{3,255}/,
            error: "El nombre debe tener al menos 3 caracteres."
        },
        sucursal_rif: {
            regex: /^[JVGECjvgec]-\d{8}-\d{1}$/,
            error: "Formato de RIF inválido (ej: J-12345678-9)."
        },
        sucursal_direccion: {
            regex: /.{10,255}/,
            error: "La dirección debe tener al menos 10 caracteres."
        },
        sucursal_telefono: {
            regex: /^\+?[\d\s\(\)-]{7,20}$/,
            error: "Teléfono inválido (mín. 7 dígitos)."
        },

        // --- Gerente (MODIFICADAS) ---
        gerente_cedula: {
            regex: /^[Vv]-\d{1,3}(\.\d{3}){2}$/, // NUEVO formato V-12.345.678
            error: "Formato indicado: V-12.345.678"
        },
        gerente_telefono: {
            regex: /^(0(412|414|424|416|426|417|427)-\d{3}-\d{2}-\d{2}|\+58\s(412|414|424|416|426|417|427)-\d{3}-\d{2}-\d{2})$/,
            error: "Formato: 0412-555-10-41 o +58 412-555-10-41"
        },

        gerente_nombre: {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{2,100}$/,
            error: "Nombre inválido (solo letras)."
        },
        gerente_apellido: {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{2,100}$/,
            error: "Apellido inválido (solo letras)."
        },
        gerente_email: {
            regex: /^[^@\s]+@[^@\s]+\.[a-zA-Z]{2,4}$/,
            error: "Formato de email inválido."
        },
        gerente_contraseña: {
            regex: /^(?=.*[A-Za-z]).{6,}$/,
            error: "Debe tener al menos 6 caracteres e incluir una letra."
        }
    };


    // ========== 3. NAVEGACIÓN ==========
    window.nextStep = function () {
        if (validateStep(currentStep)) {
            if (currentStep < totalSteps) {
                currentStep++;
                updateFormState();
            }
        }
    };

    window.prevStep = function () {
        if (currentStep > 1) {
            currentStep--;
            updateFormState();
        }
    };


    // ========== 4. ACTUALIZAR VISTA ==========
    function updateFormState() {

        steps.forEach((step, index) => {
            step.style.display = (index + 1 === currentStep) ? 'block' : 'none';
        });

        indicators.forEach((indicator, index) => {
            if (index < currentStep) indicator.classList.add('active');
            else indicator.classList.remove('active');
        });

        prevButton.style.display = currentStep > 1 ? '' : 'none';
        nextButton.style.display = currentStep < totalSteps ? '' : 'none';
        submitButton.style.display = currentStep === totalSteps ? '' : 'none';

        hideAllTooltips();
    }


    // ========== 5. VALIDACIÓN ==========
    function hideAllTooltips() {
        document.querySelectorAll('.is-invalid').forEach(input => {
            const tooltip = bootstrap.Tooltip.getInstance(input);
            if (tooltip) tooltip.hide();
        });
    }

    function validateStep(stepNumber) {
        let isValid = true;

        hideAllTooltips();

        const currentFields = steps[stepNumber - 1].querySelectorAll("input[name][required], textarea[name][required]");

        currentFields.forEach(input => {
            if (!validateInput(input)) {
                isValid = false;
            }
        });

        return isValid;
    }

    function validateInput(input) {
        const rule = validationRules[input.name];
        if (!rule) return true;

        let message = "";

        if (input.hasAttribute("required") && input.value.trim() === "") {
            message = "Este campo es obligatorio.";
        } else if (rule.regex && !rule.regex.test(input.value)) {
            message = rule.error;
        }

        let tooltip = bootstrap.Tooltip.getInstance(input);

        if (message) {
            input.classList.add("is-invalid");
            input.classList.remove("is-valid");

            if (!tooltip) {
                tooltip = new bootstrap.Tooltip(input, {
                    trigger: "manual",
                    placement: "bottom",
                    title: message
                });
            } else {
                input.setAttribute("data-bs-original-title", message);
            }

            setTimeout(() => tooltip.show(), 50);

            return false;

        } else {
            input.classList.remove("is-invalid");
            input.classList.add("is-valid");

            if (tooltip) tooltip.hide();

            return true;
        }
    }


    // ========== 6. ENVÍO ==========
    form.addEventListener("submit", function (e) {
        if (!validateStep(currentStep)) {
            e.preventDefault();
            return;
        }

        hideAllTooltips();
    });


    // ========== 7. VALIDACIÓN EN TIEMPO REAL ==========
    form.querySelectorAll("input, textarea").forEach(input => {
        input.addEventListener("input", function () {
            validateInput(this);
        });
    });


    // ========== 8. INICIALIZAR ==========
    updateFormState();

});
