<?php
function obtenerNombreApellido()
{
    $nombre_completo = $_SESSION["sesion_usuario"]["usuario"]["nombre"];
    $apellido_completo = $_SESSION["sesion_usuario"]["usuario"]["apellido"];

    $nombre = explode(" ", $nombre_completo);
    $apellido = explode(" ", $apellido_completo);

    if (!$nombre || !$apellido) {
        return ["error" => "Error al filtrar el nombre y apellido"];
    }

    return ["nombre" => $nombre[0], "apellido" => $apellido[0]];
}

function obtenerEmpleados($sucursal, $rol, $estado)
{
    // Normalizar sucursal
    $sucursal = ($sucursal === "" || $sucursal === null) ? null : (int)$sucursal;

    // Normalizar rol
    $rol      = ($rol === "" || $rol === null) ? null : (int)$rol;

    // Normalizar estado
    if ($estado === null || $estado === "" || $estado === "todos") {
        $estado = null;               // sin filtro
    } elseif (strtolower($estado) === "activo") {
        $estado = true;               // BOOLEAN true
    } elseif (strtolower($estado) === "inactivo") {
        $estado = false;              // BOOLEAN false
    } else {
        $estado = null;               // valor inesperado
    }

    $conn = conectar_base_datos();

    $sql = "
        SELECT 
            U.id_usuario,
            U.nombre,
            U.apellido,
            U.cedula,
            U.email,
            U.activo,
            U.telefono,
            U.fecha_registro,
            U.direccion,
            R.id_rol,
            R.nombre_rol,
            S.id_sucursal,
            S.nombre AS sucursal_nombre,
            S.direccion AS sucursal_direccion,
            S.telefono AS sucursal_telefono,
            S.rif AS sucursal_rif
        FROM seguridad_acceso.usuario U
        INNER JOIN seguridad_acceso.rol R 
            ON U.id_rol = R.id_rol
        LEFT JOIN core.sucursal S
            ON U.id_sucursal = S.id_sucursal
        WHERE 
            ($1::INT IS NULL OR U.id_sucursal = $1)
            AND ($2::INT IS NULL OR U.id_rol = $2)
            AND ($3::BOOLEAN IS NULL OR U.activo = $3)
        ORDER BY U.id_usuario ASC
    ";

    $res = pg_query_params($conn, $sql, [$sucursal, $rol, $estado]);

    if (!$res) {
        return ["error" => "Error ejecutando consulta"];
    }

    $filas = pg_fetch_all($res) ?: [];
    return ["filas" => $filas];
}

function obtenerUnUsuario($email)
{
    if (!$email || trim($email) === "") {
        return ["error" => "Email no proporcionado"];
    }

    $conn = conectar_base_datos();

    $sql = "
        SELECT 
            U.id_usuario,
            U.nombre,
            U.apellido,
            U.cedula,
            U.email,
            U.activo,
            U.telefono,
            U.fecha_registro,
            U.direccion,
            R.id_rol,
            R.nombre_rol,
            S.id_sucursal,
            S.nombre AS sucursal_nombre,
            S.direccion AS sucursal_direccion,
            S.telefono AS sucursal_telefono,
            S.rif AS sucursal_rif
        FROM seguridad_acceso.usuario U
        INNER JOIN seguridad_acceso.rol R 
            ON U.id_rol = R.id_rol
        LEFT JOIN core.sucursal S
            ON U.id_sucursal = S.id_sucursal
        WHERE U.email = $1
        LIMIT 1
    ";

    $res = pg_query_params($conn, $sql, [$email]);

    if (!$res) {
        return ["error" => "Error ejecutando consulta"];
    }

    $fila = pg_fetch_assoc($res);

    if (!$fila) {
        return ["error" => "No se encontró ningún empleado con ese email"];
    }

    return ["empleado" => $fila];
}
