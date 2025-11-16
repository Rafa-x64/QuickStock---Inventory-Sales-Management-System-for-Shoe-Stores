<?php
class color extends mainModel
{
    public int $id_color;
    public string $nombre;
    public bool $activo;

    public function __construct(int $id_color, string $nombre, bool $activo = true)
    {
        $this->id_color = $id_color;
        if (empty($nombre) || strlen($nombre) > 50) {
            throw new InvalidArgumentException("El nombre no puede estar vacío o exceder 50 caracteres.");
        }
        $this->nombre = $nombre;
        $this->activo = $activo;
    }

    public function crear()
    {
        $conn = parent::conectar_base_datos();

        $stmt = pg_prepare($conn, "buscar_color", "SELECT id_color FROM core.color WHERE nombre = $1 LIMIT 1");
        $result = pg_execute($conn, "buscar_color", [$this->nombre]);

        if ($row = pg_fetch_assoc($result)) return intval($row['id_color']);

        $stmt = pg_prepare($conn, "insertar_color", "INSERT INTO core.color (nombre, activo) VALUES ($1, $2) RETURNING id_color");
        $result = pg_execute($conn, "insertar_color", [$this->nombre, $this->activo]);

        $row = pg_fetch_assoc($result);
        return intval($row['id_color']);
    }
}
