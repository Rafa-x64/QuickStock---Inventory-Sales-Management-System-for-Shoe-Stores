document.addEventListener("DOMContentLoaded", () => {

    // Reglas de validación específicas para EDITAR empleado
    const reglas = {
        nombre_empleado: {
            regex: /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]{2,100}$/,
            msg: "Solo letras. Mínimo 2 caracteres."
        },
        apellido_empleado: {
            regex: /^[A-Za-zÁÉÍÓÚÑáéíóúñ\s]{2,100}$/,
            msg: "Solo letras. Mínimo 2 caracteres."
        },
        cedula_empleado: {
            // V-12.345.678
            regex: /^[Vv]-\d{1,3}(\.\d{3}){2}$/,
            msg: "Formato válido: V-12.345.678"
        },
        telefono_empleado: {
            // 0412-555-12-12 o +58 412-555-12-12
            regex: /^(0(412|414|424|416|426|417|427)-\d{3}-\d{2}-\d{2}|\+58\s(412|414|424|416|426|417|427)-\d{3}-\d{2}-\d{2})$/,
            msg: "Formato: 0412-555-12-12 o +58 412-555-12-12"
        },
        email_empleado: {
            regex: /^[^@\s]+@[^@\s]+\.(com|gmail\.com|outlook\.com|yahoo\.com)$/,
            msg: "Debe ser un correo válido (ej: usuario@dominio.com)"
        },
        direccion_empleado: {
            regex: /^.{10,255}$/,
            msg: "Debe contener mínimo 10 caracteres."
        }
        // id_rol y id_sucursal se validan por required en el select
    };


    // Función validadora
    const validarCampo = (input, regla) => {
        const tooltip = input.nextElementSibling;

        if (!input) return true;

        const valor = input.value.trim();

        // Vacío
        if (valor === "") {
            input.classList.add("is-invalid");
            tooltip.textContent = "Este campo no puede estar vacío.";
            return false;
        }

        // Coincidencia regex
        if (!regla.regex.test(valor)) {
            input.classList.add("is-invalid");
            tooltip.textContent = regla.msg;
            return false;
        }

        // OK
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        tooltip.textContent = "";
        return true;
    };


    // Formulario
    const form = document.querySelector("form");

    form.addEventListener("submit", e => {
        let valido = true;

        // Validar todos los inputs definidos en reglas
        for (let id in reglas) {
            const input = document.getElementById(id);
            if (!validarCampo(input, reglas[id])) {
                valido = false;
            }
        }

        // Validación nativa Bootstrap
        if (!valido) {
            e.preventDefault();
            form.classList.add("was-validated");
        }
    });


    // Validación en tiempo real
    for (let id in reglas) {
        const input = document.getElementById(id);
        if (!input) continue;

        const regla = reglas[id];

        input.addEventListener("input", () => validarCampo(input, regla));
    }

});
