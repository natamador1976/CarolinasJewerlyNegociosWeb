<?php
    namespace Dao; 

    class TipoP extends Table{
       public static function AddTipoP($nombre_tipo_producto, $descripcion_tipo_producto){
           $query="INSERT INTO `carolina_jewerly_db`.`tipo_producto`
           (
           `nombre_tipo_producto`,
           `descripcion_tipo_producto`)
           VALUES
           (
           :nombre_tipo_producto,
           :descripcion_tipo_producto);";
           $parameters=array(
               "nombre_tipo_producto"=>$nombre_tipo_producto,
               "descripcion_tipo_producto"=>$descripcion_tipo_producto
           );
           return self::executeNonQuery($query, $parameters);
       }
       public static function getTipoPbyId($codigo_tipo_producto){
           $query="SELECT * from tipo_producto where codigo_tipo_producto=:codigo_tipo_producto";
           $parameters=array(
               "codigo_tipo_producto"=>$codigo_tipo_producto
           );
           return self::obtenerUnRegistro($query, $parameters);
       }


       public static function UpdateTipoP($nombre_tipo_producto, $descripcion_tipo_producto,$codigo_tipo_producto){
           $query="UPDATE tipo_producto set nombre_tipo_producto=:nombre_tipo_producto, descripcion_tipo_producto=:descripcion_tipo_producto WHERE codigo_tipo_producto=:codigo_tipo_producto";
           $parameters=array(
            "nombre_tipo_producto"=>$nombre_tipo_producto,
            "descripcion_tipo_producto"=>$descripcion_tipo_producto,
            "codigo_tipo_producto"=>$codigo_tipo_producto
           );
           return self::executeNonQuery($query, $parameters);
       }

       public static function DeleteTipoP($codigo_tipo_producto){
           $query="DELETE FROM tipo_producto WHERE codigo_tipo_producto=:codigo_tipo_producto";
           $parameters=array(
               "codigo_tipo_producto"=>$codigo_tipo_producto
           );
           return self::executeNonQuery($query, $parameters);
       }

       public static function getAllTipoP(){
           $query="SELECT * FROM carolina_jewerly_db.tipo_producto;";
           return self::obtenerRegistros($query, array());
       }
    }
?>