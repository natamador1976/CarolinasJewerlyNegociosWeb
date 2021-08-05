<?php 
namespace Dao;

class EmpleadosPanel extends Table{

   

    public static function listarEmpleados()
    {
        $registros = array();
        $registros = self::obtenerRegistros(
            "SELECT * from empleados;",
            array()
        );
        return $registros;
    }

    public static function buscarEmpleado($id)
    {
        $sqlstr = "SELECT * from empleados where codigo_empleado =:id;";

        $parameters = array("id" => $id);
       
        $registro = self::obtenerUnRegistro($sqlstr, $parameters);
        
        return $registro;

    }

    public static function agregarEmpleado($identidad, $nombre, $nacimiento,$genero,$foto,
    $puesto,$estado,$codUsuario )
    {
       
        $insSQL = "INSERT INTO `empleados` 
        (`num_identidad`, `nombre_empleado`, `fecha_nacimiento`, `genero`,`fecha_contrato`,`foto_empleado`,
        `puesto`,`estado`,`cod_usuario`) 
        
        VALUES ( :identidad, :nombre, :nacimiento, :genero, NOW() , :foto,:puesto,:estado,:codUsuario );";
        $parameters = array(
            "identidad" => $identidad,
            "nombre" => $nombre,
            "nacimiento" => $nacimiento,
            "genero" => $genero,
            "foto" => $foto,
            "puesto" => $puesto,
            "estado" => $estado,
            "codUsuario" => $codUsuario
            
        );

        return self::executeNonQuery($insSQL, $parameters);
    }

    public static function editarEmpleado($identidad, $nombre, $nacimiento,$genero,$contrato,$foto,
    $puesto,$estado,$codUsuario,$empCod )
    {
        $updSQL = "UPDATE `empleados` set `num_identidad`=:identidad, `nombre_empleado`=:nombre,
         `fecha_nacimiento`=:nacimiento, `genero`=:genero, `fecha_contrato`=:contrato,
         `foto_empleado`=:foto, `puesto`=:puesto, `estado`=:estado,
         `cod_usuario`= :codUsuario  
         where `codigo_empleado` =:empCod; ";
        $parameters = array(
            "identidad" => $identidad,
            "nombre" => $nombre,
            "nacimiento" => $nacimiento,
            "genero" => $genero,
            "contrato" => $contrato,
            "foto" => $foto,
            "puesto" => $puesto,
            "estado" => $estado,
            "codUsuario" => $codUsuario,
            "empCod" => $empCod
        );

        return self::executeNonQuery($updSQL, $parameters);
    }

    public static function eliminarEmpleado($id)
    {
        $delSQL = "DELETE FROM `empleados`  where `codigo_empleado`=:id;";
        $parameters = array(
            "id" => $id
        );

        return self::executeNonQuery($delSQL, $parameters);
    }

}



?>