document.addEventListener('DOMContentLoaded', function () {
    const container = document.getElementById('detalle-compra-container');
    const addButton = document.getElementById('agregar-articulo');
    const subtotalGeneral = document.getElementById('subtotal_general');
    const ivaGeneral = document.getElementById('iva_general');
    const totalGeneral = document.getElementById('total_general');

    // Agregar nueva fila
    addButton.addEventListener('click', () => {
        const lastRow = container.querySelector('.detalle-fila:last-child');
        const newRow = lastRow.cloneNode(true);
        newRow.querySelectorAll('input').forEach(el => {
            el.value = '';
        });
        container.appendChild(newRow);
        actualizarEventos();
    });

    // Eliminar fila
    window.eliminarFila = (btn) => {
        const filas = container.querySelectorAll('.detalle-fila');
        if (filas.length > 1) {
            btn.closest('.detalle-fila').remove();
            calcularTotales();
        } else {
            alert("Debe haber al menos un artículo.");
        }
    };

    // Calcular subtotales y total general
    function calcularTotales() {
        let subtotal = 0;
        container.querySelectorAll('.detalle-fila').forEach(fila => {
            const cantidad = parseFloat(fila.querySelector('.cantidad').value) || 0;
            const precio = parseFloat(fila.querySelector('.precio').value) || 0;
            const subtotalFila = cantidad * precio;
            fila.querySelector('.subtotal').value = `$${subtotalFila.toFixed(2)}`;
            subtotal += subtotalFila;
        });
        const iva = subtotal * 0.16;
        const total = subtotal + iva;

        subtotalGeneral.value = `$${subtotal.toFixed(2)}`;
        ivaGeneral.value = `$${iva.toFixed(2)}`;
        totalGeneral.value = `$${total.toFixed(2)}`;
    }

    // Vincular eventos dinámicos
    function actualizarEventos() {
        container.querySelectorAll('.cantidad, .precio').forEach(input => {
            input.removeEventListener('input', calcularTotales);
            input.addEventListener('input', calcularTotales);
        });
    }

    actualizarEventos();
});