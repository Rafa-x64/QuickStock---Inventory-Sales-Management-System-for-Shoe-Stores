<?php
class producto extends mainModel
{
    public $id_producto;
    public $nombre;
    public $descripcion;
    public $id_categoria;
    public $id_color;
    public $id_talla;
    public $precio; // Precio Venta
    public $precio_compra; // Precio Compra
    public $id_proveedor;
    public $activo;
    public $codigo_barra;

    public function __construct($id_producto, $nombre, $descripcion, $id_categoria, $id_color, $id_talla, $precio, $id_proveedor, $activo, $codigo_barra, $precio_compra)
    {
        $this->id_producto = $id_producto;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->id_categoria = $id_categoria;
        $this->id_color = $id_color;
        $this->id_talla = $id_talla;
        $this->precio = $precio;
        $this->precio_compra = $precio_compra;
        $this->id_proveedor = $id_proveedor;
        $this->activo = $activo;
        $this->codigo_barra = $codigo_barra;
    }

    public function crear(): ?int
    {
        $conn = parent::conectar_base_datos();

        $sql = "INSERT INTO inventario.producto
            (nombre, descripcion, id_categoria, id_color, id_talla, precio_venta, id_proveedor, activo, codigo_barra, precio_compra) 
            VALUES ($1, $2, $3, $4, $5, $6, $7, $8, $9, $10)
            RETURNING id_producto";

        $result = pg_query_params($conn, $sql, [
            $this->nombre,          // $1
            $this->descripcion,     // $2
            $this->id_categoria,    // $3
            $this->id_color,        // $4
            $this->id_talla,        // $5
            $this->precio,          // $6 (Precio Venta)
            $this->id_proveedor ?: null, // $7 (Usar null si es 0/vacío)
            $this->activo,          // $8
            $this->codigo_barra,    // $9
            $this->precio_compra    // $10 (Precio Compra)
        ]);

        if (!$result) {
            throw new Exception("Error al insertar producto: " . pg_last_error($conn));
        }

        $row = pg_fetch_assoc($result);
        return $row ? intval($row['id_producto']) : null;
    }

    public function agregarInventario($id_producto, $id_sucursal, $cantidad, $minimo)
    {
        $conn = parent::conectar_base_datos();

        $sql = "INSERT INTO inventario.inventario (id_producto, id_sucursal, cantidad, minimo, activo)
            VALUES ($1,$2,$3,$4,true)";

        $result = pg_query_params($conn, $sql, [$id_producto, $id_sucursal, $cantidad, $minimo]);

        if (!$result) {
            throw new Exception("Error al insertar inventario: " . pg_last_error($conn));
        }
    }

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
        $precio_compra = $data["precio_compra"];
        $activo_nuevo = $data["activo"];

        pg_query($conn, "BEGIN");

        try {
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
                    precio_compra = $10,
                    activo = $11          -- AÑADIDO
                WHERE id_producto = $9
            ";

            $params_producto = [
                $data["codigo_barra"],
                $data["nombre"],
                $data["descripcion"], 
                $data["id_categoria"],
                $data["id_color"],
                $data["id_talla"],
                $data["precio"],
                $data["id_proveedor"], 
                $id_producto,
                $precio_compra,
                $activo_nuevo 
            ];

            $res_producto = pg_query_params($conn, $sql_producto, $params_producto);

            if (!$res_producto) {
                throw new Exception("Error al actualizar producto: " . pg_last_error($conn));
            }

            $sql_inventario = "
                UPDATE inventario.inventario
                SET
                    cantidad = $1,
                    minimo = $2
                WHERE id_producto = $3 AND id_sucursal = $4
            ";

            $params_inventario = [
                $data["cantidad"],
                $data["minimo"],
                $id_producto,
                $id_sucursal
            ];

            $res_inventario = pg_query_params($conn, $sql_inventario, $params_inventario);

            if (!$res_inventario) {
                throw new Exception("Error al actualizar inventario: " . pg_last_error($conn));
            }

            if (pg_affected_rows($res_inventario) === 0) {
                self::agregarInventario($id_producto, $id_sucursal, $data["cantidad"], $data["minimo"]);
            }

            pg_query($conn, "COMMIT");

            return ["success" => true];
        } catch (Exception $e) {
            pg_query($conn, "ROLLBACK");
            return ["error" => $e->getMessage()];
        }
    }

    public static function eliminar($id_producto)
    {
        $conn = parent::conectar_base_datos();
        pg_prepare($conn, "eliminar_producto", "UPDATE inventario.producto SET activo = false WHERE id_producto = $1");
        $resultado = pg_execute($conn, "eliminar_producto", [$id_producto]);
        if (!$resultado) {
            return false;
        }

        return true;
    }
}
