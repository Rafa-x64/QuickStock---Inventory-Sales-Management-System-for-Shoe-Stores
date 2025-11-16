<?php
class talla extends mainModel
{
    public int $id_talla;
    public string $rango_talla;
    public bool $activo;

    public function __construct(int $id_talla, string $rango_talla, bool $activo = true)
    {
        $this->id_talla = $id_talla;
        // La validación simple se realiza aquí, en el constructor
        if (empty($rango_talla) || strlen($rango_talla) > 20) {
            throw new InvalidArgumentException("El rango de talla no puede estar vacío o exceder 20 caracteres.");
        }
        $this->rango_talla = $rango_talla;
        $this->activo = $activo;
    }

    public function crear()
    {
        $conn = parent::conectar_base_datos();

        $stmt = pg_prepare($conn, "buscar_talla", "SELECT id_talla FROM core.talla WHERE rango_talla = $1 LIMIT 1");
        $result = pg_execute($conn, "buscar_talla", [$this->rango_talla]);

        if ($row = pg_fetch_assoc($result)) return intval($row['id_talla']);

        $stmt = pg_prepare($conn, "insertar_talla", "INSERT INTO core.talla (rango_talla, activo) VALUES ($1, $2) RETURNING id_talla");
        $result = pg_execute($conn, "insertar_talla", [$this->rango_talla, $this->activo]);

        $row = pg_fetch_assoc($result);
        return intval($row['id_talla']);
    }
}
