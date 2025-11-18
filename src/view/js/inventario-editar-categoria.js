// Añadir esta sección al final de tu archivo JS principal.

// -------------------------------------------------------------
// LÓGICA DE VALIDACIÓN DEL FORMULARIO DE EDICIÓN
// -------------------------------------------------------------

document.addEventListener("DOMContentLoaded", () => {
    // 1. Obtener elementos del formulario de Edición
    const formEditar = document.getElementById('form_editar_categoria');
    const nombreEditar = document.getElementById('nombre_categoria_editar');
    const descripcionEditar = document.getElementById('descripcion_categoria_editar');
    const btnGuardarEditar = document.getElementById('btn_guardar_editar');

    // Inicializar Tooltips de Bootstrap (si no lo hiciste al inicio del archivo)
    // Se recomienda inicializarlos una sola vez
    /*
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    */

    // 2. Definición de Expresiones Regulares (RegExp)
    const regex = {
        // Permite letras (con tildes, ñ), números, espacios y guiones. Mínimo 2, Máximo 100.
        nombre: /^[A-Za-zñÑáéíóúÁÉÍÓÚ0-9\s-]{2,100}$/,

        // Permite casi cualquier carácter, incluyendo saltos de línea. Mínimo 0 (opcional), Máximo 255.
        descripcion: /^[\s\S]{0,255}$/,
    };

    // 3. Objeto para guardar el estado de validación
    let validacionEstadoEditar = {
        nombre: true, // Asumimos true al inicio, ya que los campos se cargarán con datos válidos
        descripcion: true
    };

    // Se deshabilita el botón al inicio hasta que la validación inicial se complete (después del relleno)
    btnGuardarEditar.disabled = true;

    // 4. Función de Validación Genérica para Edición (Asíncrona)
    const validarCampoEditar = async (input, regExp, key) => {
        const valor = input.value.trim();
        const tooltip = bootstrap.Tooltip.getInstance(input);
        const tooltipId = document.getElementById(`tooltip_${key}_editar`);

        if (regExp.test(valor)) {
            // Validación REGEX exitosa
            input.classList.remove('is-invalid');
            input.classList.add('is-valid');

            // Ocultar Tooltip/Invalid-Tooltip
            if (tooltip) tooltip.hide();
            tooltipId.textContent = '';

            validacionEstadoEditar[key] = true;
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
                // La descripción solo fallaría si excede el límite (maxlength lo maneja HTML)
                if (valor.length > 255) {
                    mensaje = 'La descripción no puede exceder los 255 caracteres.';
                } else {
                    // Si la descripción está vacía, no es una falla (es opcional)
                    input.classList.remove('is-invalid');
                    input.classList.remove('is-valid');
                    validacionEstadoEditar[key] = true;
                    return;
                }
            }

            // Mostrar mensaje de error en el tooltip
            tooltipId.textContent = mensaje;

            // Mostrar Tooltip
            if (tooltip) {
                tooltip.dispose();
                new bootstrap.Tooltip(input, {
                    title: mensaje,
                    placement: 'right',
                    trigger: 'manual'
                }).show();
            }

            validacionEstadoEditar[key] = false;
        }

        // Comprobar si el botón debe estar activo/inactivo
        verificarFormularioEditarCompleto();
    };

    // 5. Función para verificar si todos los campos de edición son válidos
    const verificarFormularioEditarCompleto = () => {
        const esValido = Object.values(validacionEstadoEditar).every(val => val === true);
        btnGuardarEditar.disabled = !esValido;
        return esValido;
    };


    // 6. Event Listeners para validación asíncrona

    // Validar Nombre al soltar la tecla
    nombreEditar.addEventListener('keyup', () => {
        validarCampoEditar(nombreEditar, regex.nombre, 'nombre');
    });

    // Validar Descripción al soltar la tecla
    descripcionEditar.addEventListener('keyup', () => {
        validarCampoEditar(descripcionEditar, regex.descripcion, 'descripcion');
    });

    // Validar Nombre al salir del campo (blur)
    nombreEditar.addEventListener('blur', () => {
        validarCampoEditar(nombreEditar, regex.nombre, 'nombre');
    });

    // 7. Event Listener para el envío del formulario
    formEditar.addEventListener('submit', function (event) {
        // Forzar la validación de todos los campos antes de enviar
        validarCampoEditar(nombreEditar, regex.nombre, 'nombre');
        validarCampoEditar(descripcionEditar, regex.descripcion, 'descripcion');

        if (!formEditar.checkValidity() || !verificarFormularioEditarCompleto()) {
            event.preventDefault();
            event.stopPropagation();
            // Mostrar un mensaje de error general
            // alert("Por favor, corrige los errores en el formulario de edición."); 
        }

        // Aplica estilos de validación de Bootstrap
        formEditar.classList.add('was-validated');
    }, false);

    // NOTA IMPORTANTE: Para que el botón se habilite correctamente DESPUÉS de rellenar el formulario
    // con datos válidos de la API, necesitas llamar a `verificarFormularioEditarCompleto()` 
    // al final de la función de carga de datos (`api({ accion: "obtener_categoria_por_id", ...})`)

});