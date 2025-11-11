export async function api(data = {}) {
    const r = await fetch("api/server/index.php", {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    });
    return r.json(); // siempre responde JSON
}