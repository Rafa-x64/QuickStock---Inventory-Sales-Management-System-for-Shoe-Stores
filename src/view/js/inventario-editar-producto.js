document.addEventListener("DOMContentLoaded", () => {

    const btnReset = document.getElementById("btnReset");

    const form = document.getElementById("formProducto");

    // Reglas iguales que registrar, solo que aplican en editar también
    const reglas = {
        codigo_barra: { regex: /^[A-Za-z0-9\-]+$/, mensaje: "Código solo letras, números y guiones" },
        nombre: { regex: /^[A-Za-z0-9ÁÉÍÓÚáéíóúÑñ\s]+$/, mensaje: "Nombre solo letras, números y espacios" },
        descripcion: { regex: /.*/, mensaje: "" },

        // Inputs opcionales según alternancia, pero igual se validan cuando estén activos
        nombre_categoria: { regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{4,}$/, mensaje: "Categoría mínimo 4 letras" },
        nombre_color: { regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/, mensaje: "Color mínimo 3 letras" },
        rango_talla: { regex: /^(\d+)(\s?-\s?\d+)+$/, mensaje: 'Formato válido: "número - número - ..."' },

        precio_compra: { min: 1, mensaje: "Precio de compra mínimo 1.00" }, // <--- AGREGAR ESTA LÍNEA

        precio: { min: 1, mensaje: "Precio mínimo 1" },
        cantidad: { min: 0, mensaje: "Stock no puede ser negativo" },
        minimo: { min: 1, mensaje: "Stock mínimo ≥ 1" },

        id_sucursal: { min: 1, mensaje: "Debe seleccionar una sucursal" }
    };

    // --- VALIDACIÓN GENÉRICA ---
    const validar = (campo, regla) => {

        // si está disabled por alternancia, no valida nada
        if (campo.disabled) {
            campo.classList.remove("is-invalid", "is-valid");
            return true;
        }

        const valor = campo.value.trim();

        const valido =
            (regla.regex ? regla.regex.test(valor) : true) &&
            (regla.min != null ? parseFloat(valor) >= regla.min : true);

        campo.classList.toggle("is-invalid", !valido);
        campo.classList.toggle("is-valid", valido);

        return valido;
    };

    // --- VALIDACIÓN EN TIEMPO REAL ---
    Object.keys(reglas).forEach(id => {
        const campo = document.getElementById(id);
        if (!campo) return; // si no existe (por alternancia), lo ignora
        campo.addEventListener("input", () => validar(campo, reglas[id]));
    });

    // --- VALIDACIÓN FINAL EN SUBMIT ---
    form.addEventListener("submit", e => {
        const resultado = Object.keys(reglas).map(id => {
            const campo = document.getElementById(id);
            if (!campo) return true; // si no existe, ignorar
            return validar(campo, reglas[id]);
        });

        const todoValido = resultado.every(v => v);

        if (!todoValido) {
            e.preventDefault();
            e.stopPropagation();
        }
    });
});

btnReset.addEventListener("click", () =>{
    window.location.reload();
});