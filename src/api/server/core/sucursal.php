<?php
function obtenerSucursales()
{
    $con = conectar_base_datos();
    pg_prepare($con, "obtener_sucursales", "SELECT * FROM core.sucursal ORDER BY id_sucursal ASC");
    $res = pg_execute($con, "obtener_sucursales", []);

    if (!$res) {
        return ["error" => "Error al obtener las sucursales"];
    }

    $filas = pg_fetch_all($res);

    if (!$filas) {
        return [];
    }

    return ["filas" => $filas ?: []];
}

function obtenerUnaSucursalPorId($id_sucursal)
{
    // Asegúrate de que esta función esté definida para conectar a tu DB
    $conn = conectar_base_datos();

    // Normalizar y validar el ID
    $id_sucursal = (int)$id_sucursal;
    if ($id_sucursal <= 0) {
        return ["error" => "ID de sucursal inválido"];
    }

    $query = "
        SELECT 
            id_sucursal,
            nombre,
            rif,
            direccion,
            telefono,
            fecha_registro,
            activo
        FROM core.sucursal
        WHERE id_sucursal = $1
        LIMIT 1
    ";

    $stmtName = "obtener_una_sucursal_" . uniqid();

    // Preparar y ejecutar la consulta
    if (!pg_prepare($conn, $stmtName, $query)) {
        return ["error" => "Error al preparar la consulta", "detalle" => pg_last_error($conn)];
    }
    $result = pg_execute($conn, $stmtName, [$id_sucursal]);

    if (!$result) {
        return ["error" => "Error al ejecutar la consulta", "detalle" => pg_last_error($conn)];
    }

    $sucursal = pg_fetch_assoc($result);

    if (!$sucursal) {
        return ["error" => "Sucursal no encontrada"];
    }

    // ⭐⭐⭐ PUNTO CLAVE DE CORRECCIÓN (PHP) ⭐⭐⭐
    if (isset($sucursal['activo'])) {
        // En PHP, el valor 't' de PostgreSQL es tratado como true (booleano)
        // La comparación directa con 't' es la más segura.
        // Forzamos que el valor sea el string literal "true" o "false".
        $valorDB = strtolower(trim($sucursal['activo']));

        if ($valorDB === 't' || $valorDB === 'true' || $valorDB === '1') {
            $sucursal['activo'] = 'true';
        } else {
            $sucursal['activo'] = 'false';
        }
    }

    // Formatear la fecha para el input type="date"
    if (isset($sucursal['fecha_registro'])) {
        $sucursal['fecha_registro'] = date('Y-m-d', strtotime($sucursal['fecha_registro']));
    }

    return ["sucursal" => $sucursal];
}
