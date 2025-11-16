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
}
