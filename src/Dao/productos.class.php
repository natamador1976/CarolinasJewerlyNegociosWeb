<?php
    namespace Dao;
    class productos extends Table{
        public static function getAllProductos(){
            $query="SELECT * FROM productos;";
            return self::obtenerRegistros($query, array());
        }
        public static function getTipo(){
            $query="SELECT * FROM tipo_producto;";
            return self::obtenerRegistros($query, array());
        }

        public static function getProductId($id){
                return self::obtenerUnRegistro("SELECT * FROM productos where codigo_producto=:id", $id);
        }

       public static function AddProduct($nombre_producto, $descripcion_producto, $precio, $cantidad_stock, $codigo_tipo_producto, $codigo_categorias, $uri_img){
            $query="INSERT INTO `carolina_jewerly_db`.`productos`
            (
            `nombre_producto`,
            `descripcion_producto`,
            `precio`,
            `cantidad_stock`,
            `codigo_tipo_producto`,
            `codigo_categoria`,
            `uri_img`)
            VALUES
            (
            :nombre_producto,
            :descripcion_producto,
            :precio,
            :cantidad_stock,
            :codigo_tipo_producto,
            :codigo_categoria,
            :uri_img);";
            $parameters=array(
                "nombre_producto"=>$nombre_producto,
                "descripcion_producto"=>$descripcion_producto,
                "precio"=>$precio, 
                "cantidad_stock"=>$cantidad_stock,
                "codigo_tipo_producto"=>$codigo_tipo_producto,
                "codigo_categorias"=>$codigo_categorias,
                "uri_img"=>$uri_img
            );
            return self::executeNonQuery($query, $parameters);
       }
       public static function UpdateProduct($nombre_producto, $descripcion_producto, $precio, $cantidad_stock, $codigo_tipo_producto, $codigo_categorias, $uri_img, $codigo_producto){
        $query="UPDATE `carolina_jewerly_db`.`productos`
        SET
        `codigo_producto` = :codigo_producto,
        `nombre_producto` = :nombre_producto,
        `descripcion_producto` = :descripcion_producto,
        `precio` = :precio,
        `cantidad_stock` = :cantidad_stock,
        `codigo_tipo_producto` = :codigo_tipo_producto,
        `codigo_categoria` = :codigo_categoria,
        `uri_img` = :uri_img
        WHERE `codigo_producto` = :codigo_producto;";
        $parameters=array(
            "nombre_producto"=>$nombre_producto,
            "descripcion_producto"=>$descripcion_producto,
            "precio"=>$precio, 
            "cantidad_stock"=>$cantidad_stock,
            "codigo_tipo_producto"=>$codigo_tipo_producto,
            "codigo_categorias"=>$codigo_categorias,
            "uri_img"=>$uri_img,
            "codigo_producto"=>$codigo_producto
        );
        return self::executeNonQuery($query, $parameters);
       }

       public static function DeleteProduct ($id){
           $query="DELETE FROM productos where codigo_producto=:id";
           $parameters=array("id"=>$id);
           self::executeNonQuery($query, $parameters);
       }
    }


?>