<?php
    namespace Dao;
    class carrito extends Table{
        public static function AddCart(){
            $query="INSERT INTO `carolina_jewerly_db`.`carrito`
            (
            `codigo_usuario`,
            `fechaCreado`,
            `fechaExpira`,
            `estado`)
            VALUES
            (
            :codigo_usuario,
            now() ,
            :fechaExpira, 'ACT');";
            $parameters=array(
                "codigo_usuario"=> \Utilities\Security::getUserId(),
                "fechaExpira"=> date('Y-m-d', time()+7776000)
            );

            return self::executeNonQuery($query, $parameters);
        }
        
        public static function AddCartDetail($codigo_producto, $cantidad, $precio){
      
            $query="INSERT INTO `carolina_jewerly_db`.`carrito_detalle`
            (
            `codigo_carrito`,
            `codigo_producto_c`,
            `cantidad`,
            `precio`)
            VALUES
            (
            (select max(codigo_carrito) from carrito),
            :codigo_producto_c,
            :cantidad,
            :precio);";
            $parameters=array(
                "codigo_producto_c"=>$codigo_producto,
                "cantidad"=>$cantidad,
                "precio"=>$precio
            );
            return self::executeNonQuery($query, $parameters);
        }

        public static function UpdateCartDetail($cantidad, $precio, $codigo_carrito, $codigo_producto){
                $query="UPDATE `carolina_jewerly_db`.`carrito_detalle`
                SET
                `cantidad` = :cantidad,
                `precio` = :precio
                WHERE `codigo_cartito` = :codigo_carrito and `codigo_producto`= :codigo_producto;";
                $parameters=array(
                    "cantidad"=>$cantidad,
                    "precio"=>$precio,
                    "codigo_carrito"=>$codigo_carrito,
                    "codigo_producto"=>$codigo_producto
                );
                return self::executeNonQuery($query, $parameters);
        }

        public static function Deleteproducto($codigo_producto, $codigo_carrito){
            $query="DELETE from carrito_detalle where codigo_producto=:codigo_producto and codigo_carrito=:codigo_carrito";
            $parameters=array(
                "codigo_producto"=>$codigo_producto,
                "codigo_carrito">=$codigo_carrito
            );

            return self::executeNonQuery($query, $parameters);
        }

        public static function getAllShopChart(){
            $query="SELECT * FROM carrito as A
            join carrito_detalle as B
            join productos as C on B.codigo_producto_c= C.codigo_producto ";
                    return self::obtenerRegistros($query, array());
        }

        public static function getCarritoId(){
            $query="SELECT max(codigo_carrito) as codigo_carrito from carrito where estado='ACT';";
            return self::obtenerRegistros($query, array());
        }

        public static function StockProduct($codigo_producto){
            $query="SELECT cantidad_stock from productos where codigo_producto=:codigo_producto;";
            $parameters=array(
                "codigo_producto"=>$codigo_producto
            );
            self::obtenerUnRegistro($query, $parameters);
        }

        public static function StockProductoReduce($codigo_producto, $cantidad){
            $query="UPDATE productos set cantidad_stock= cantidad_stock - :cantidad_stock where codigo_producto=:codigo_producto; ";
            $parameters=array(
                "cantidad_stock"=>$cantidad,
                "codigo_producto"=>$codigo_producto
            ); 
            self::executeNonQuery($query, $parameters);
        }


    }
?>