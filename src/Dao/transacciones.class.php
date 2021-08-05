<?php
    namespace Dao; 

    class transacciones extends Table{
        public static function insertTransaction($payment_order, $codigo_usuario){
            $query="INSERT INTO `carolina_jewerly_db`.`transactions`
            (
            `fecha`,
            `paypal_order`,
            `codigousuario`)
            VALUES
            (
            now(),
            :payment_order,
            :codigousuario);";
            $parameters=array(
                "payment_order"=>$payment_order,
                "codigousuario"=>$codigo_usuario);
                return self::executeNonQuery($query, $parameters);
        }

    }

?>