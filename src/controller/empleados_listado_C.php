<?php
include_once "model/seguridad_acceso.usuario.php";
class empleados_listado_C extends mainModel{

    public static function eliminarEmpleado($email){
        if(!isset($email)){
            return "Correo no eviado";
        }

        if(!usuario::eliminar($email)){
            return "Error al eliminar el empleado";
        }

        return "sisa mano";
    }
        
}
?>