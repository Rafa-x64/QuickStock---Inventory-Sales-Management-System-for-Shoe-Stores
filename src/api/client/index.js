export async function api(url, data = {}) {
    const r = await fetch(url, {
        method: "POST",
        headers: { "Content-Type": "application/json" },
        body: JSON.stringify(data)
    });
    return r.json(); // siempre responde JSON
}