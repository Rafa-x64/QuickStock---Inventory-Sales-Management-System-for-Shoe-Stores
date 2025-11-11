document.addEventListener("DOMContentLoaded", () => {
    const fecha_actual = new Date();
    const year = fecha_actual.getFullYear();
    const month = String(fecha_actual.getMonth() + 1).padStart(2, '0');
    const day = String(fecha_actual.getDate()).padStart(2, '0');
    const formattedDate = `${year}-${month}-${day}`;
    const fechaInput = document.getElementById("fecha_registro");
    fechaInput.value = formattedDate;
    fechaInput.setAttribute('readonly', true);

    // Reglas de validación
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
            regex: /^[Vv]-\d{1,3}(\.\d{3}){2}$/,
            msg: "Formato indicado: V-12.345.678"
        },
        telefono_empleado: {
            regex: /^(0(412|414|424|416|426|417|427)-\d{3}-\d{2}-\d{2}|\+58\s(412|414|424|416|426|417|427)-\d{3}-\d{2}-\d{2})$/,
            msg: "Formato: 0412-555-10-41 o +58 412-555-10-41"
        },
        email_empleado: {
            regex: /^[^@\s]+@[^@\s]+\.com$/,
            msg: "Debe incluir @ y terminar en .com"
        },
        contrasena_empleado: {
            regex: /^(?=.*[A-Za-z]).{8,255}$/,
            msg: "Debe contener al menos una letra y mínimo 8 caracteres."
        },
        direccion_empleado: {
            regex: /^.{10,255}$/,
            msg: "Debe contener al menos 10 caracteres."
        }
    };

    const validarCampo = (input, regla) => {
        const tooltip = input.nextElementSibling;

        if (input.value.trim() === "") {
            input.classList.add("is-invalid");
            tooltip.textContent = "Este campo no puede estar vacío.";
            return false;
        }

        if (!regla.regex.test(input.value)) {
            input.classList.add("is-invalid");
            tooltip.textContent = regla.msg;
            return false;
        }

        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        tooltip.textContent = "";
        return true;
    };

    const form = document.querySelector("form");

    form.addEventListener("submit", e => {
        let valido = true;

        for (let id in reglas) {
            const input = document.getElementById(id);
            if (!validarCampo(input, reglas[id])) {
                valido = false;
            }
        }

        if (!valido) {
            e.preventDefault();
            form.classList.add("was-validated");
        }
    });

    // Validación en tiempo real
    for (let id in reglas) {
        const input = document.getElementById(id);
        const regla = reglas[id];

        input.addEventListener("input", () => validarCampo(input, regla));
    }

});