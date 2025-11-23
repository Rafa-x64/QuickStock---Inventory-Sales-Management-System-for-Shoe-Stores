<?php
//sieempre heredar de la clase padre
class usuario extends mainModel
{

    //atributos
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

    //constructor
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

    //funciones
    public static function crearGerente($nombre, $apellido, $cedula, $email, $contraseña, $telefono)
    {
        //conecta mediante el metodo de la clase padre
        $conn = parent::conectar_base_datos();
        //para realizar la sentnecia ("la_conexion", "nombre_unico_query", "la sentencia sql")
        pg_prepare($conn, "agregar_gerente", "insert into seguridad_acceso.usuario (id_rol, nombre, apellido, cedula, email, contraseña, activo, telefono) values (1, $1, $2, $3, $4, $5, true, $6)");
        //guardar en variable... se ejecutas la sentencia("conexion", "nombre_unico_query", "array_con_variables")
        $resultado = pg_execute($conn, "agregar_gerente", [$nombre, $apellido, $cedula, $email, $contraseña, $telefono]);
        //validas si se realizo la conssulta
        if (!$resultado) {
            return false;
        }
        //si todo salio 
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
    public static function editar($data)
    {
        $nombre      = $data["nombre"];
        $apellido    = $data["apellido"];
        $cedula      = $data["cedula"];
        $telefono    = $data["telefono"];
        $id_rol      = $data["id_rol"];
        $emailNuevo  = $data["emailNuevo"];
        $direccion   = $data["direccion"];
        $sucursal    = $data["id_sucursal"];
        $estadoTexto = strtolower($data["estado"]);
        $emailViejo  = $data["emailViejo"];

        if ($estadoTexto !== "activo" && $estadoTexto !== "inactivo") {
            $estadoTexto = self::obtenerEstadoActual($emailViejo) ? "activo" : "inactivo";
        }
        $estado = ($estadoTexto === "activo");

        $conn = parent::conectar_base_datos();

        $sql = "
            UPDATE seguridad_acceso.usuario
            SET
                nombre = $1,
                apellido = $2,
                cedula = $3,
                telefono = $4,
                id_rol = $5,
                email = $6,
                direccion = $7,
                id_sucursal = $8,
                activo = $9
            WHERE email = $10
        ";

        $params = [
            $nombre,
            $apellido,
            $cedula,
            $telefono,
            $id_rol,
            $emailNuevo,
            $direccion,
            $sucursal,
            $estado,
            $emailViejo
        ];

        $res = pg_query_params($conn, $sql, $params);

        if (!$res) {
            return ["error" => "Error actualizando usuario"];
        }

        if (pg_affected_rows($res) === 0) {
            return ["error" => "No se encontró el empleado o no hubo cambios"];
        }

        return ["success" => true];
    }

    private static function obtenerEstadoActual($email)
    {
        if (!$email || trim($email) === "") {
            return true;
        }

        $conn = parent::conectar_base_datos();

        $sql = "SELECT activo FROM seguridad_acceso.usuario WHERE email = $1 LIMIT 1";
        $res = pg_query_params($conn, $sql, [$email]);

        if (!$res) {
            return true;
        }

        $fila = pg_fetch_assoc($res);

        return $fila ? filter_var($fila["activo"], FILTER_VALIDATE_BOOLEAN) : true;
    }

    //eliminar
    public static function eliminar($email)
    {
        $conn = parent::conectar_base_datos();
        pg_prepare(
            $conn,
            "eliminar_empleado",
            "update seguridad_acceso.usuario 
                set activo = false 
            where email = $1"
        );

        $res = pg_execute($conn, "eliminar_empleado", [$email]);

        if (!$res) {
            return false;
        }

        return true;
    }
}
