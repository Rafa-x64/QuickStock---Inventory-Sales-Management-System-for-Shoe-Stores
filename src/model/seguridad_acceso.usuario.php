<?php
class usuario extends mainModel
{

    private $nombre;
    private $apellido;
    private $cedula;
    private $telefono;
    private $id_rol;
    private $email;
    private $contraseña;
    private $direccion;
    private $id_sucursal;
    private $fecha_registro;

    public function __construct($nombre, $apellido, $cedula, $telefono, $id_rol, $email, $contraseña, $direccion, $id_sucursal, $fecha_registro)
    {
        $this->nombre = $nombre;
        $this->apellido = $apellido;
        $this->cedula = $cedula;
        $this->telefono = $telefono;
        $this->id_rol = $id_rol;
        $this->email = $email;
        $this->contraseña = $contraseña;
        $this->direccion = $direccion;
        $this->id_sucursal = $id_sucursal;
        $this->fecha_registro = $fecha_registro;
    }

    public static function crearGerente($nombre, $apellido, $cedula, $email, $contraseña, $telefono)
    {
        $conn = parent::conectar_base_datos();
        //para realizar la sentnecia ("la_conexion", "nombre_unico_query", "la sentencia sql")
        pg_prepare($conn, "agregar_gerente", "insert into seguridad_acceso.usuario (id_usuario, id_rol, nombre, apellido, cedula, email, contraseña, activo, id_sucursal, telefono) values (1, 1, $1, $2, $3, $4, $5, true, 1, $6)");
        //guardar en variable... se ejecutas la sentencia("conexion", "nombre_unico_query", "array_con_variables")
        $resultado = pg_execute($conn, "agregar_gerente", [$nombre, $apellido, $cedula, $email, $contraseña, $telefono]);
        //validas si se realizo la conssulta
        if (!$resultado) {
            return false;
        }
        return true;
    }

    public function crearEmpleado()
    {
        $conn = parent::conectar_base_datos();
        pg_prepare(
            $conn,
            "agregar_empleado",
            "INSERT INTO seguridad_acceso.usuario
        (
            id_rol,
            nombre,
            apellido,
            cedula,
            email,
            contraseña,
            activo,
            id_sucursal,
            telefono,
            direccion,
            fecha_registro
        )
        VALUES
        (
            $1, $2, $3, $4, $5, $6, true, $7, $8, $9, $10
        )"
        );

        $params = [
            $this->id_rol,
            $this->nombre,
            $this->apellido,
            $this->cedula,
            $this->email,
            $this->contraseña,
            $this->id_sucursal,
            $this->telefono,
            $this->direccion,
            $this->fecha_registro
        ];

        $res = pg_execute($conn, "agregar_empleado", $params);

        return $res ? true : false;
    }

    //editar

    //eliminar
}
