// /DEV/PHP/QuickStock/src/api/client/index.js

export async function api(data = {}) {
    const r = await fetch("api/server/index.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    });

    // 1. Clonar la respuesta para poder leerla dos veces si es necesario
    const rClone = r.clone();

    try {
        // 2. Intentar parsear la respuesta como JSON (el comportamiento esperado)
        const json = await r.json();
        return json;

    } catch (e) {
        // 3. Si r.json() falla, significa que la respuesta no era JSON válido
        // Leemos la respuesta clonada como texto para ver el error de PHP
        const errorText = await rClone.text();

        // 4. Muestra el error de PHP en la consola
        console.error("--- Error de Parseo de JSON del Servidor ---");
        console.error("Respuesta inesperada del servidor (no es JSON válido):", errorText);
        console.error("---------------------------------------------");

        // 5. Devolvemos un objeto de error estructurado para que el código llamante lo maneje
        return {
            status: "error",
            message: "Fallo de comunicación: El servidor devolvió un error de PHP/HTML.",
            detalle: errorText // Incluimos el texto del error
        };
    }
}