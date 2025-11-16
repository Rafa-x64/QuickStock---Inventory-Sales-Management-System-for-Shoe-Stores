<?php
function obtenerTodosLosProductos(
    $nombre = null,
    $codigo = null,
    $categoria = null,
    $proveedor = null,
    $sucursal = null,
    $estado = null
) {
    $conn = conectar_base_datos();

    // Normalización manual
    $nombre    = $nombre !== null ? trim($nombre) : null;
    $codigo    = $codigo !== null ? trim($codigo) : null;
    $categoria = $categoria ? (int)$categoria : null;
    $proveedor = $proveedor ? (int)$proveedor : null;
    $sucursal  = $sucursal ? (int)$sucursal : null;
    $estado    = ($estado !== null && ($estado == 0 || $estado == 1)) ? (bool)$estado : null;

    // Generar WHERE dinámico
    $clauses = [];
    $params = [];
    $i = 1;

    if ($nombre) {
        $clauses[] = "p.nombre ILIKE $" . $i;
        $params[] = "%" . $nombre . "%";
        $i++;
    }

    if ($codigo) {
        $clauses[] = "p.codigo_barra ILIKE $" . $i;
        $params[] = "%" . $codigo . "%";
        $i++;
    }

    if ($categoria) {
        $clauses[] = "p.id_categoria = $" . $i;
        $params[] = $categoria;
        $i++;
    }

    if ($proveedor) {
        $clauses[] = "p.id_proveedor = $" . $i;
        $params[] = $proveedor;
        $i++;
    }

    if ($sucursal) {
        $clauses[] = "i.id_sucursal = $" . $i;
        $params[] = $sucursal;
        $i++;
    }

    if ($estado !== null) {
        $clauses[] = "p.activo = $" . $i;
        $params[] = $estado;
        $i++;
    }

    $where = !empty($clauses) ? "WHERE " . implode(" AND ", $clauses) : "";

    // Consulta principal
    $sql = "
        SELECT 
            p.id_producto,
            p.nombre,
            p.descripcion,
            p.codigo_barra AS codigo,
            p.precio_compra,
            p.precio_venta,
            p.activo AS estado,
            c.nombre AS categoria_nombre,
            col.nombre AS color,
            t.rango_talla AS talla,
            pr.nombre AS proveedor_nombre,
            i.cantidad AS stock,
            i.minimo,
            s.nombre AS sucursal_nombre,
            s.id_sucursal
        FROM inventario.producto p
        LEFT JOIN core.categoria c ON c.id_categoria = p.id_categoria
        LEFT JOIN core.color col ON col.id_color = p.id_color
        LEFT JOIN core.talla t ON t.id_talla = p.id_talla
        LEFT JOIN core.proveedor pr ON pr.id_proveedor = p.id_proveedor
        LEFT JOIN inventario.inventario i ON i.id_producto = p.id_producto
        LEFT JOIN core.sucursal s ON s.id_sucursal = i.id_sucursal
        $where
        ORDER BY p.id_producto ASC
    ";

    // Preparar y ejecutar
    $stmt = "stmt_" . uniqid();
    pg_prepare($conn, $stmt, $sql);
    $result = pg_execute($conn, $stmt, $params);

    if (!$result) {
        return [
            "status" => "error",
            "message" => "Error al ejecutar la consulta",
            "detalle" => pg_last_error($conn)
        ];
    }

    $productos = pg_fetch_all($result) ?: [];

    return [
        "status" => "success",
        "data" => $productos
    ];
}


function traerProductosSucursal() {}

function obtenerProductoPorNombre() {}
