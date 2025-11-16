<?php
class categoria extends mainModel
{
    public int $id_categoria;
    public string $nombre;
    public bool $activo;

    public function __construct(int $id_categoria, string $nombre, bool $activo = true)
    {
        $this->id_categoria = $id_categoria;
        // La validación simple se realiza aquí, en el constructor
        if (empty($nombre) || strlen($nombre) > 100) { // Límite asumido
            throw new InvalidArgumentException("El nombre no puede estar vacío o exceder 100 caracteres.");
        }
        $this->nombre = $nombre;
        $this->activo = $activo;
    }

    public function crear()
    {
        $conn = parent::conectar_base_datos();

        // Buscar categoría existente
        $stmt = pg_prepare($conn, "buscar_categoria", "SELECT id_categoria FROM core.categoria WHERE nombre = $1 LIMIT 1");
        $result = pg_execute($conn, "buscar_categoria", [$this->nombre]);

        if ($row = pg_fetch_assoc($result)) {
            return intval($row['id_categoria']);
        }

        // Insertar nueva categoría
        $stmt = pg_prepare($conn, "insertar_categoria", "INSERT INTO core.categoria (nombre, activo) VALUES ($1, $2) RETURNING id_categoria");
        $result = pg_execute($conn, "insertar_categoria", [$this->nombre, $this->activo]);

        $row = pg_fetch_assoc($result);
        return intval($row['id_categoria']);
    }
}
