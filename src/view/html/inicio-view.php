
<?php
echo $_SERVER['SERVER_PORT'];

$con = new PDO("mysql:host=localhost;dbname=mydb", "root", "");

if (!$con) {
    echo "Error de conexion";
} else {
    echo "Conexion exitosa";
}
