<?php
    namespace Dao;
    use Dao\Table;
    class Suscripcion extends Table {
        public static function getActiveSuscripcion(){
            $registros = array();
            $registros = self::obtenerRegistros("SELECT * FROM suscripcion WHERE estado='ACT';", array());
            return $registros;
        }

        public static function getAllSuscripcion(){
            $registros = array();
            $registros = self::obtenerRegistros("SELECT * FROM suscripcion;", array());
            return $registros;
        }

        public static function getSuscripcionById($id){
            $sqlstr = "SELECT * FROM suscripcion WHERE codigo_suscripcion=:codigo_suscripcion;";
            $parameters = array("codigo_suscripcion" => $id);
            $registros = self::obtenerUnRegistro($sqlstr, $parameters);
            return $registros;
        }

        public static function addSuscripcion($codigo_usuario, $estado){
            $insSQL = "INSERT INTO `suscripcion` (`codigo_usuario`, `estado`) VALUES (:codigo_usuario, :estado);";
            $parameters = array(
                "codigo_usuario" => $codigo_usuario,
                "estado" => $estado
            );
            return self::executeNonQuery($insSQL, $parameters);
        }

        public static function updateSuscripcion($codigo_usuario, $estado, $codigo_suscripcion){
            $updSQL = "UPDATE `suscripcion` SET `codigo_usuario`=:codigo_usuario, `estado`=:estado WHERE `codigo_suscripcion`=:codigo_suscripcion;";
            $parameters = array (
                "codigo_usuario" => $codigo_usuario,
                "estado" => $estado,
                "codigo_suscripcion" => $codigo_suscripcion
            );

            return self::executeNonQuery($updSQL, $parameters);
        }

        public static function deleteSuscripcion($codigo_suscripcion){
            $delSQL = "DELETE FROM `suscripcion` WHERE `codigo_suscripcion`=:codigo_suscripcion;";
            $parameters = array(
                "codigo_suscripcion" => $codigo_suscripcion
            );

            return self::executeNonQuery($delSQL, $parameters);
        }


    }
?>