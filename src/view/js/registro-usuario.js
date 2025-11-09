document.addEventListener("DOMContentLoaded", function () {

    // --- 1. SELECCIÓN DE ELEMENTOS ---
    const form = document.getElementById('multiStepForm').querySelector('form');

    // 🔥 CAMBIO CLAVE: Usamos 'steps' para obtener los 5 divs, pero limitamos la lógica a 4.
    const allSteps = document.querySelectorAll('.form-step');
    const steps = Array.from(allSteps).slice(0, 4); // <--- SOLO TOMAMOS LOS PRIMEROS 4 PASOS

    // Lo mismo para los indicadores de progreso (si existen 5, solo controlaremos los primeros 4)
    const allIndicators = document.querySelectorAll('.progress-step-custom');
    const indicators = Array.from(allIndicators).slice(0, 4); // <--- SOLO TOMAMOS LOS PRIMEROS 4 INDICADORES

    let currentStep = 1;
    const totalSteps = steps.length; // totalSteps ahora es 4

    const prevButton = document.getElementById('prevButton');
    const nextButton = document.getElementById('nextButton');
    const submitButton = document.getElementById('submitButton');

    // --- 2. REGLAS DE VALIDACIÓN (Se mantienen las reglas) ---
    const validationRules = {
        'sucursal_nombre': {
            regex: /.{3,255}/,
            error: 'El nombre debe tener al menos 3 caracteres.'
        },
        'sucursal_rif': {
            regex: /^[JVGECjvgec]-\d{8}-\d{1}$/,
            error: 'Formato de RIF inválido (ej: J-12345678-9).'
        },
        'sucursal_direccion': {
            regex: /.{10,255}/,
            error: 'La dirección debe tener al menos 10 caracteres.'
        },
        'sucursal_telefono': {
            regex: /^\+?[\d\s\(\)-]{7,20}$/,
            error: 'Teléfono inválido (mín. 7 dígitos).'
        },
        'gerente_cedula': {
            regex: /^[VEve]-\d{7,9}$/,
            error: 'Cédula inválida (ej: V-12345678).'
        },
        'gerente_telefono': {
            regex: /^\+?[\d\s\(\)-]{7,20}$/,
            error: 'Teléfono personal inválido (mín. 7 dígitos).'
        },
        'gerente_nombre': {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{2,100}$/,
            error: 'Nombre inválido (solo letras).'
        },
        'gerente_apellido': {
            regex: /^[a-zA-ZáéíóúÁÉÍÓÚñÑ\s]{2,100}$/,
            error: 'Apellido inválido (solo letras).'
        },
        'gerente_email': {
            regex: /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/,
            error: 'Formato de email de cuenta inválido.'
        },
        'gerente_contraseña': {
            regex: /^(?=.*[a-zA-Z]).{6,}$/,
            error: 'La contraseña debe tener al menos 6 caracteres e incluir un mínimo de una letra.'
        }
    };

    // --- 3. FUNCIONES DE NAVEGACIÓN (Se mantienen) ---
    window.nextStep = function () {
        if (validateStep(currentStep)) {
            // Se usa 'totalSteps' que es 4
            if (currentStep < totalSteps) {
                currentStep++;
                updateFormState();
            }
        } else {
            console.log(`Error de validación en el paso ${currentStep}`);
        }
    }

    window.prevStep = function () {
        if (currentStep > 1) {
            currentStep--;
            updateFormState();
        }
    }

    // --- 4. FUNCIÓN PARA ACTUALIZAR LA VISTA (Se mantiene) ---
    function updateFormState() {
        // ... (Tu función updateFormState se mantiene igual) ...

        // Usamos la propiedad `transform` para deslizar el contenedor, no `display: none`.
        const container = document.querySelector('.form-steps-container');
        const offset = (currentStep - 1) * 25; // 0% para paso 1, 25% para paso 2, etc. (ajustar si es necesario)
        // Nota: Asegúrate que la lógica de animación CSS funciona correctamente con el `display: none` que tienes arriba.
        // Si usas animación, se recomienda usar 'transform' para mover el `.form-steps-container`.

        // Si usas el enfoque de desplazamiento (sliding) de los pasos:
        // const offset = (currentStep - 1) * (100 / totalSteps);
        // container.style.transform = `translateX(-${offset}%)`;

        // Si usas el enfoque de ocultar/mostrar (lo que tienes actualmente):
        steps.forEach((step, index) => {
            if (index + 1 === currentStep) {
                step.style.display = 'block'; // Usar 'block' o ''
            } else {
                step.style.display = 'none';
            }
        });

        // Activar/Desactivar los 4 indicadores relevantes
        indicators.forEach((indicator, index) => {
            if (index < currentStep) {
                indicator.classList.add('active');
            } else {
                indicator.classList.remove('active');
            }
        });

        // --- MANEJO DE BOTONES DE NAVEGACIÓN ---
        if (prevButton) {
            prevButton.style.display = currentStep > 1 ? '' : 'none';
        }

        if (nextButton) {
            // El botón Siguiente se oculta solo en el ÚLTIMO paso (Paso 4)
            nextButton.style.display = currentStep < totalSteps ? '' : 'none';
        }

        if (submitButton) {
            // El botón Enviar se muestra solo en el ÚLTIMO paso (Paso 4)
            submitButton.style.display = currentStep === totalSteps ? '' : 'none';
        }

        // 🔥 IMPORTANTE: Ocultar tooltips al cambiar de paso
        hideAllTooltips();
    }

    // --- 5. LÓGICA DE VALIDACIÓN (Modificada para usar Tooltips) ---

    function hideAllTooltips() {
        // Ocultar todos los tooltips activos en la página antes de cambiar de paso
        document.querySelectorAll('.is-invalid').forEach(input => {
            const tooltipInstance = bootstrap.Tooltip.getInstance(input);
            if (tooltipInstance) {
                tooltipInstance.hide();
            }
        });
    }

    function validateStep(stepNumber) {
        let isValid = true;
        // Ocultar los tooltips antes de revalidar para evitar duplicados
        hideAllTooltips();

        const currentStepFields = steps[stepNumber - 1].querySelectorAll('input[name][required], textarea[name][required]');

        currentStepFields.forEach(input => {
            if (!validateInput(input)) {
                isValid = false;
            }
        });
        return isValid;
    }

    // 🔥 FUNCIÓN CLAVE MODIFICADA PARA USAR BOOTSTRAP TOOLTIPS
    function validateInput(input) {
        const rule = validationRules[input.name];
        if (!rule) return true;

        let errorMessage = '';

        // 1. Validación de campo requerido vacío
        if (input.hasAttribute('required') && input.value.trim() === '') {
            errorMessage = 'Este campo es obligatorio.';
        }
        // 2. Validación de Regex
        else if (rule.regex && !rule.regex.test(input.value)) {
            errorMessage = rule.error;
        }

        // --- Manejo del Tooltip ---
        let tooltipInstance = bootstrap.Tooltip.getInstance(input);

        if (errorMessage) {
            // Error: Mostrar Tooltip
            input.classList.add('is-invalid');
            input.classList.remove('is-valid');

            // Si no existe, crear la instancia
            if (!tooltipInstance) {
                tooltipInstance = new bootstrap.Tooltip(input, {
                    trigger: 'manual', // Solo manual para controlarlo por JS
                    placement: 'bottom', // Posición del tooltip
                    customClass: 'validation-tooltip', // Clase para darle estilo (opcional)
                    title: errorMessage // El mensaje de error
                });
            } else {
                // Si ya existe, actualizar el título
                input.setAttribute('data-bs-original-title', errorMessage);
            }

            // Mostrar el tooltip después de un pequeño retraso (para asegurar la inicialización)
            setTimeout(() => {
                tooltipInstance.show();
            }, 50);

            return false;

        } else {
            // Éxito: Ocultar Tooltip
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');

            if (tooltipInstance) {
                tooltipInstance.hide();
            }

            return true;
        }
    }

    // --- 6. MANEJO DEL ENVÍO DEL FORMULARIO ---
    form.addEventListener('submit', function (e) {

        // Validar el último paso
        if (!validateStep(currentStep)) {
            e.preventDefault();
            console.log("Errores en el último paso");
            return;
        }

        hideAllTooltips(); // opcional

        // ✅ Envío NORMAL (POST)
        // No hacemos e.preventDefault()
        console.log("Formulario enviado por POST");
    });

    // --- 7. INICIALIZACIÓN ---
    updateFormState();

    // 🔥 EVENTO ADICIONAL: Ocultar tooltip al teclear (mejor UX)
    form.querySelectorAll('input, textarea').forEach(input => {
        input.addEventListener('input', function () {
            // Revalidar el campo al teclear
            validateInput(this);
        });
    });
});