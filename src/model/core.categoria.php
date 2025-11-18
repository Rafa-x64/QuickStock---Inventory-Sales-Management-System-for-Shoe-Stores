<?php
class categoria extends mainModel
{
    public int $id_categoria;
    public string $nombre;
    public ?string $descripcion;
    public bool $activo;
    public ?int $id_categoria_padre;

    public function __construct(int $id_categoria, string $nombre, ?string $descripcion = null, bool $activo = true, ?int $id_categoria_padre = null)
    {
        $this->id_categoria = $id_categoria;

        // 1. Validación y Asignación de Nombre
        if (empty($nombre) || strlen($nombre) > 100) {
            throw new InvalidArgumentException("El nombre no puede estar vacío o exceder 100 caracteres.");
        }
        $this->nombre = $nombre;

        // 2. Validación y Asignación de Descripción
        if ($descripcion !== null && strlen($descripcion) > 255) {
            throw new InvalidArgumentException("La descripción no puede exceder 255 caracteres.");
        }
        $this->descripcion = $descripcion;

        // 3. Validación y Asignación de Categoría Padre
        if ($id_categoria_padre !== null && $id_categoria_padre < 0) {
            throw new InvalidArgumentException("ID de categoría padre inválido.");
        }
        // Si el valor es 0 (usualmente "Ninguna" en un SELECT), se convierte a NULL para la BD.
        $this->id_categoria_padre = ($id_categoria_padre === 0) ? null : $id_categoria_padre;

        // 4. Asignación de Activo
        $this->activo = $activo;
    }

    public function crear(): int
    {
        $conn = parent::conectar_base_datos();

        // 1. Buscar categoría existente (Solo por nombre para evitar duplicados)
        $stmt_buscar = pg_prepare($conn, "buscar_categoria_crear_" . time(), "SELECT id_categoria FROM core.categoria WHERE nombre = $1 LIMIT 1");
        $result_buscar = pg_execute($conn, "buscar_categoria_crear_" . time(), [$this->nombre]);

        if ($row = pg_fetch_assoc($result_buscar)) {
            // Categoría ya existe, devuelve su ID
            return intval($row['id_categoria']);
        }

        // 2. Insertar nueva categoría (incluyendo los campos opcionales)
        $sql = "INSERT INTO core.categoria (nombre, descripcion, id_categoria_padre, activo) 
                VALUES ($1, $2, $3, $4) 
                RETURNING id_categoria";

        $params = [
            $this->nombre,
            $this->descripcion,         // Parámetro $2 (NULL o string)
            $this->id_categoria_padre,  // Parámetro $3 (NULL o int)
            $this->activo
        ];

        // Se usa un nombre de statement único
        $stmt_insertar = pg_prepare($conn, "insertar_categoria_" . time(), $sql);
        $result_insertar = pg_execute($conn, "insertar_categoria_" . time(), $params);

        if (!$result_insertar) {
            throw new Exception("Fallo al insertar la categoría en la base de datos.");
        }

        $row = pg_fetch_assoc($result_insertar);
        return intval($row['id_categoria']);
    }

    public function editar(): bool
    {
        $conn = parent::conectar_base_datos();

        $sql = "UPDATE core.categoria 
                SET nombre = $1, 
                    descripcion = $2, 
                    id_categoria_padre = $3, 
                    activo = $4
                WHERE id_categoria = $5";

        $params = [
            $this->nombre,
            $this->descripcion, // Puede ser NULL
            $this->id_categoria_padre,          // Puede ser NULL
            $this->activo,
            $this->id_categoria
        ];

        // Usamos pg_prepare y pg_execute para ejecutar la consulta con seguridad
        $stmt = pg_prepare($conn, "actualizar_categoria_" . time(), $sql); // Nombre único para la sentencia
        $result = pg_execute($conn, "actualizar_categoria_" . time(), $params);

        // Devolvemos true si la consulta se ejecutó sin errores y se actualizó al menos una fila
        return $result !== false && pg_affected_rows($result) > 0;
    }

    public static function eliminar(int $id_categoria): bool
    {
        $conn = parent::conectar_base_datos();

        if ($id_categoria <= 0) {
            return false;
        }

        $sql = "UPDATE core.categoria 
                SET activo = 'f' 
                WHERE id_categoria = $1";

        $params = [$id_categoria];

        // Usamos pg_prepare y pg_execute para ejecutar la consulta con seguridad
        $stmt = pg_prepare($conn, "desactivar_categoria_" . time(), $sql);
        $result = pg_execute($conn, "desactivar_categoria_" . time(), $params);

        // Devolvemos true si la consulta se ejecutó sin errores y se actualizó al menos una fila
        return $result !== false && pg_affected_rows($result) > 0;
    }
}
