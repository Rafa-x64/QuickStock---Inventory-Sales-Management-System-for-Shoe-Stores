document.addEventListener("DOMContentLoaded", () => {

    const form = document.getElementById("formProducto");

    // Configuración de validaciones: selector → {regex, mensaje, min}
    const reglas = {
        codigo_barra: { regex: /^[A-Za-z0-9\-]+$/, mensaje: "Código solo letras, números y guiones" },
        nombre: { regex: /^[A-Za-z0-9ÁÉÍÓÚáéíóúÑñ\s]+$/, mensaje: "Nombre solo letras, números y espacios" },
        descripcion: { regex: /.+/, mensaje: "Descripción obligatoria" },
        nombre_categoria: { regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{4,}$/, mensaje: "Categoría mínimo 4 letras" },
        nombre_color: { regex: /^[A-Za-zÁÉÍÓÚáéíóúÑñ\s]{3,}$/, mensaje: "Color mínimo 3 letras" },
        rango_talla: { regex: /^(\d+)(\s?-\s?\d+)+$/, mensaje: 'Formato válido: "número - número - ..."' },
        precio: { min: 1, mensaje: "Precio mínimo 1" },
        cantidad: { min: 0, mensaje: "Stock no puede ser negativo" },
        minimo: { min: 1, mensaje: "Stock mínimo ≥ 1" },
        id_sucursal: { min: 1, mensaje: "Debe seleccionar una sucursal" }
    };

    // Función de validación genérica
    const validar = (campo, regla) => {
        const valor = campo.value.trim();
        const valido = (regla.regex ? regla.regex.test(valor) : true) && (regla.min != null ? parseFloat(valor) >= regla.min : true);
        campo.classList.toggle("is-invalid", !valido);
        campo.classList.toggle("is-valid", valido);
        return valido;
    };

    // Validación en tiempo real
    Object.keys(reglas).forEach(id => {
        const campo = document.getElementById(id);
        campo.addEventListener("input", () => validar(campo, reglas[id]));
    });

    // Validación final al enviar
    form.addEventListener("submit", e => {
        const todoValido = Object.keys(reglas)
            .map(id => validar(document.getElementById(id), reglas[id]))
            .every(v => v);
        if (!todoValido) e.preventDefault();
    });

});
