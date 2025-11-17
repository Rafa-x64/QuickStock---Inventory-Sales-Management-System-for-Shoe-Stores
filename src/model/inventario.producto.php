<?php
class producto extends mainModel
{
    public $id_producto;
    public $nombre;
    public $descripcion;
    public $id_categoria;
    public $id_color;
    public $id_talla;
    public $precio;
    public $id_proveedor;
    public $activo;
    public $codigo_barra;

    public function __construct($id_producto, $nombre, $descripcion, $id_categoria, $id_color, $id_talla, $precio, $id_proveedor, $activo, $codigo_barra)
    {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->id_categoria = $id_categoria;
        $this->id_color = $id_color;
        $this->id_talla = $id_talla;
        $this->precio = $precio;
        $this->id_proveedor = $id_proveedor;
        $this->activo = $activo;
        $this->codigo_barra = $codigo_barra;
    }

    public function crear(): ?int
    {
        $conn = parent::conectar_base_datos();

        $stmt = pg_prepare(
            $conn,
            "insertar_producto",
            "INSERT INTO inventario.producto
            (nombre, descripcion, id_categoria, id_color, id_talla, precio, id_proveedor, activo, codigo_barra)
            VALUES ($1,$2,$3,$4,$5,$6,$7,$8,$9)
            RETURNING id_producto"
        );

        $result = pg_execute($conn, "insertar_producto", [
            $this->nombre,
            $this->descripcion,
            $this->id_categoria,
            $this->id_color,
            $this->id_talla,
            $this->precio,
            $this->id_proveedor ?: null,  // <-- NULL si no hay proveedor
            $this->activo,
            $this->codigo_barra
        ]);

        if (!$result) {
            throw new Exception("Error al insertar producto: " . pg_last_error($conn));
        }

        $row = pg_fetch_assoc($result);
        return $row ? intval($row['id_producto']) : null;
    }

    // Agrega inventario inicial
    public function agregarInventario($id_producto, $id_sucursal, $cantidad, $minimo)
    {
        $conn = parent::conectar_base_datos();

        $stmt = pg_prepare(
            $conn,
            "insertar_inventario",
            "INSERT INTO inventario.inventario (id_producto, id_sucursal, cantidad, minimo, activo)
            VALUES ($1,$2,$3,$4,true)"
        );

        pg_execute($conn, "insertar_inventario", [$id_producto, $id_sucursal, $cantidad, $minimo]);
    }

    // Busca producto por nombre o código
    public static function buscarPorNombreOCodigo($nombre, $codigo): ?array
    {
        $conn = parent::conectar_base_datos();

        $stmt = pg_prepare($conn, "buscar_producto", "SELECT id_producto FROM inventario.producto WHERE nombre=$1 OR codigo_barra=$2 LIMIT 1");
        $result = pg_execute($conn, "buscar_producto", [$nombre, $codigo]);

        if ($row = pg_fetch_assoc($result)) return $row;
        return null;
    }

    public static function editar($data): array
    {
        $conn = parent::conectar_base_datos();

        $id_producto = $data["id_producto"];
        $id_sucursal = $data["id_sucursal"];
        $precio_compra = $data["precio_compra"]; // <--- OBTENIDO DEL ARREGLO $data

        // 1. Iniciar Transacción
        pg_query($conn, "BEGIN");

        try {
            // A. Actualizar Producto (Tabla inventario.producto)
            $sql_producto = "
                UPDATE inventario.producto
                SET
                    codigo_barra = $1,
                    nombre = $2,
                    descripcion = $3,
                    id_categoria = $4,
                    id_color = $5,
                    id_talla = $6,
                    precio_venta = $7, 
                    id_proveedor = $8,
                    precio_compra = $10 
                WHERE id_producto = $9
            ";

            $params_producto = [
                $data["codigo_barra"],
                $data["nombre"],
                $data["descripcion"], // Vendra como NULL o string desde el controlador
                $data["id_categoria"],
                $data["id_color"],
                $data["id_talla"],
                $data["precio"],
                $data["id_proveedor"], // Vendra como NULL o int desde el controlador
                $id_producto,
                $precio_compra // <--- AÑADIDO COMO PARÁMETRO $10
            ];

            $res_producto = pg_query_params($conn, $sql_producto, $params_producto);

            if (!$res_producto) {
                throw new Exception("Error al actualizar producto: " . pg_last_error($conn));
            }

            // B. Actualizar o Insertar Inventario
            // NOTA: Se asume que precio_compra NO se actualiza aquí (va en la tabla de producto).
            // Si la tabla inventario.inventario tiene un campo para precio_compra, debes agregarlo a la SQL.
            $sql_inventario = "
                UPDATE inventario.inventario
                SET
                    cantidad = $1,
                    minimo = $2
                    -- AÑADIR: precio_compra = $5, SI aplica a tu tabla de inventario
                WHERE id_producto = $3 AND id_sucursal = $4
            ";

            $params_inventario = [
                $data["cantidad"],
                $data["minimo"],
                $id_producto,
                $id_sucursal
                // AÑADIR: $precio_compra SI aplica
            ];

            $res_inventario = pg_query_params($conn, $sql_inventario, $params_inventario);

            if (!$res_inventario) {
                throw new Exception("Error al actualizar inventario: " . pg_last_error($conn));
            }

            if (pg_affected_rows($res_inventario) === 0) {
                // Si no actualizó el inventario (no existe), lo insertamos
                // Si el método agregarInventario necesitara precio_compra, pasalo aquí.
                self::agregarInventario($id_producto, $id_sucursal, $data["cantidad"], $data["minimo"]);
            }

            // 2. Commit 
            pg_query($conn, "COMMIT");

            return ["success" => true];
        } catch (Exception $e) {
            // 3. Rollback 
            pg_query($conn, "ROLLBACK");
            return ["error" => $e->getMessage()];
        }
    }
}
