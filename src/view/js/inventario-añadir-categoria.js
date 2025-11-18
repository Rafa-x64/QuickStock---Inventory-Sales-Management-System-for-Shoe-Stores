document.addEventListener("DOMContentLoaded", () => {
    // Inicializar Tooltips de Bootstrap (necesario para que funcionen)
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))

    // 1. Obtener elementos del formulario de Añadir
    const form = document.getElementById('form_añadir_categoria');
    const nombreInput = document.getElementById('nombre_categoria_añadir');
    const descripcionInput = document.getElementById('descripcion_categoria_añadir');
    const btnGuardar = document.getElementById('btn_guardar_añadir');

    // 2. Definición de Expresiones Regulares (RegExp)
    const regex = {
        // Permite letras (con tildes, ñ), números, espacios y guiones. Mínimo 2 caracteres, Máximo 100.
        nombre: /^[A-Za-zñÑáéíóúÁÉÍÓÚ0-9\s-]{2,100}$/,

        // Permite casi cualquier carácter, incluyendo saltos de línea. Mínimo 0 (opcional), Máximo 255.
        descripcion: /^[\s\S]{0,255}$/,
    };

    // 3. Objeto para guardar el estado de validación
    let validacionEstado = {
        nombre: false,
        descripcion: true // Es opcional, asumimos true por defecto
    };

    // 4. Función de Validación Genérica (Asíncrona)
    const validarCampo = async (input, regExp, key) => {
        const valor = input.value.trim();
        const tooltip = bootstrap.Tooltip.getInstance(input);
        const tooltipId = document.getElementById(`tooltip_${key}_añadir`);

        if (regExp.test(valor)) {
            // Validación REGEX exitosa
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');

            // Ocultar Tooltip/Invalid-Tooltip
            if (tooltip) tooltip.hide();
            tooltipId.textContent = '';

            validacionEstado[key] = true;
        } else {
            // Validación REGEX fallida
            input.classList.remove('is-valid');
            input.classList.add('is-invalid');

            let mensaje = '';

            if (key === 'nombre') {
                if (valor.length < 2 || valor.length > 100) {
                    mensaje = 'El nombre debe tener entre 2 y 100 caracteres.';
                } else {
                    mensaje = 'El nombre solo puede contener letras, números, espacios y guiones.';
                }
            } else if (key === 'descripcion') {
                // La descripción solo fallaría si excede el límite (maxlength lo maneja HTML, pero por seguridad)
                if (valor.length > 255) {
                    mensaje = 'La descripción no puede exceder los 255 caracteres.';
                } else {
                    // Si la descripción está vacía, no es una falla de validación (es opcional)
                    input.classList.remove('is-invalid');
                    input.classList.remove('is-valid');
                    validacionEstado[key] = true;
                    return;
                }
            }

            // Mostrar mensaje de error en el tooltip
            tooltipId.textContent = mensaje;

            // Mostrar Tooltip
            if (tooltip) {
                tooltip.dispose(); // Desechar el anterior para forzar el update
                new bootstrap.Tooltip(input, {
                    title: mensaje,
                    placement: 'right',
                    trigger: 'manual'
                }).show();
            }

            validacionEstado[key] = false;
        }

        // Comprobar si el botón debe estar activo/inactivo
        verificarFormularioCompleto();
    };

    // 5. Función para verificar si todos los campos son válidos
    const verificarFormularioCompleto = () => {
        const esValido = Object.values(validacionEstado).every(val => val === true);
        btnGuardar.disabled = !esValido;
        return esValido;
    };


    // 6. Event Listeners para validación asíncrona

    // Validar Nombre al soltar la tecla
    nombreInput.addEventListener('keyup', () => {
        validarCampo(nombreInput, regex.nombre, 'nombre');
    });

    // Validar Descripción al soltar la tecla
    descripcionInput.addEventListener('keyup', () => {
        validarCampo(descripcionInput, regex.descripcion, 'descripcion');
    });

    // También se puede validar al salir del campo (blur)
    nombreInput.addEventListener('blur', () => {
        validarCampo(nombreInput, regex.nombre, 'nombre');
    });

    // 7. Event Listener para el envío del formulario
    form.addEventListener('submit', function (event) {
        // Forzar la validación de todos los campos antes de enviar
        validarCampo(nombreInput, regex.nombre, 'nombre');
        validarCampo(descripcionInput, regex.descripcion, 'descripcion');

        if (!form.checkValidity() || !verificarFormularioCompleto()) {
            event.preventDefault();
            event.stopPropagation();
            alert("Por favor, corrige los errores en el formulario.");
        }

        // La clase 'was-validated' de Bootstrap ayuda con la UX.
        form.classList.add('was-validated');
    }, false);

    // Inicializar el botón en estado deshabilitado
    btnGuardar.disabled = true;
});