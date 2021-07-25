<?php
    namespace Dao;

    use Dao\Table;

    class Clientes extends Table {
        public static function getAllClientes(){
            $register = array();
            $register = self::obtenerRegistros( 
                "SELECT * FROM clientes2;", array()
            );
            return $register;
        }

        public static function getClientesById($id){
            $query = "SELECT * FROM clientes2 WHERE codigo_cliente=:id;";
            $parameters = array("id" => $id);
            $register = self::obtenerUnRegistro($query,$parameters);
            return $register;
        }

        public static function addCliente($nombre_ciente, $direccion, $telefono, $genero, $correo_electronico, $codigo_usuario){
            $query = "INSERT INTO `clientes2` (
                `nombre_ciente`, `direccion`, `telefono`,  `genero`, `correo_electronico`, `codigo_usuario`)
                VALUES (
                    :nombre_ciente,
                    :direccion,
                    :telefono,
                    :genero,
                    :correo_electronico,
                    :codigo_usuario
                )";
            $parameters = array(
                "nombre_ciente" => $nombre_ciente,
                "direccion" => $direccion,
                "telefono" => $telefono,
                "genero" => $genero,
                "correo_electronico" => $correo_electronico,
                "codigo_usuario" => $codigo_usuario
            );

            return self::executeNonQuery($query, $parameters);
        }

        public static function updateCliente($nombre_ciente, $direccion, $telefono, $genero, $correo_electronico, $codigo_usuario, $codigo_cliente){
            $query = "UPDATE clientes2 SET nombre_ciente =:nombre_ciente, direccion=:direccion, telefono=:telefono, genero=:genero, correo_electronico=:correo_electronico, codigo_usuario=:codigo_usuario WHERE codigo_cliente=:codigo_cliente";
            $parameters = array(
                "nombre_ciente" => $nombre_ciente,
                "direccion" => $direccion,
                "telefono" => $telefono,
                "genero" => $genero,
                "correo_electronico" => $correo_electronico,
                "codigo_usuario" => $codigo_usuario,
                "codigo_cliente" => $codigo_cliente
            );

            return self::executeNonQuery($query, $parameters);
        }

        public static function DeleteCliente ($id){
            $query = "DELETE FROM clientes2 WHERE codigo_cliente=:codigo_cliente";
            $parameters = array(
                "codigo_cliente" => $id
            );
            return self::executeNonQuery($query, $parameters);
        }
    }
?>