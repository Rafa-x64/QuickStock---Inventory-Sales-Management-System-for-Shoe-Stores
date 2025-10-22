const formContainer = document.querySelector('.form-steps-container');
const totalSteps = 3;
let currentStep = 1;

const sucursal_nombre_input = document.getElementById('sucursal_nombre');
const empleado_sucursal_input = document.getElementById('empleado_sucursal');

sucursal_nombre_input.addEventListener("focusin", () => {
    empleado_sucursal_input.value = "";
});

sucursal_nombre_input.addEventListener("focusout", () => {
    const valor_sucursal = sucursal_nombre_input.value.trim();

    if (valor_sucursal) {
        empleado_sucursal_input.value = valor_sucursal;
    } else {
        empleado_sucursal_input.value = "";
    }
});

const usuario_nombre_input = document.getElementById('usuario_nombre');
const empleado_nombre_input = document.getElementById('empleado_usuario');

usuario_nombre_input.addEventListener("focusin", () => {
    empleado_nombre_input.value = "";
});

usuario_nombre_input.addEventListener("focusout", () => {
    const valor_usuario = usuario_nombre_input.value.trim();

    if (valor_usuario) {
        empleado_nombre_input.value = valor_usuario;
    } else {
        empleado_nombre_input.value = "";
    }
});

function validateStep(step) {
    if (step === 1) {
        const nombre = document.getElementById('sucursal_nombre').value.trim();
        const telefono = document.getElementById('sucursal_telefono').value.trim();
        const direccion = document.getElementById('sucursal_direccion').value.trim();

        if (nombre === "" || telefono === "" || direccion === "") {
            return false;
        }

        return true;
    }
    if (step === 2) {
        const nombre = document.getElementById('usuario_nombre').value.trim();
        const contraseña = document.getElementById('usuario_contraseña').value.trim();
        const rol = document.getElementById('usuario_rol').value.trim();
        const estado = document.getElementById('usuario_estado').value.trim();

        if (nombre === "" || contraseña === "" || rol === "" || estado === "") {
            return false;
        }

        return true;
    }
    return true;
}

function nextStep() {
    if (!validateStep(currentStep)) {
        alert("Por favor, rellena todos los campos antes de continuar.");
        return;
    }

    if (currentStep < totalSteps) {
        currentStep++;
        updateFormDisplay();
    }
}

function prevStep() {
    if (currentStep > 1) {
        currentStep--;
        updateFormDisplay();
    }
}

function updateFormDisplay() {
    // Mover el contenedor
    const offset = (currentStep - 1) * 100 / totalSteps;
    formContainer.style.transform = `translateX(-${offset}%)`;

    // Actualizar indicadores
    document.querySelectorAll('.progress-step-custom').forEach((indicator, index) => {
        if (index + 1 <= currentStep) {
            indicator.classList.add('active');
        } else {
            indicator.classList.remove('active');
        }
    });
}

updateFormDisplay();