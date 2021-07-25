<?php
    namespace Dao;

    class Categorias extends Table {

        public static function getAllCategorias(){
            $registros = array();
            $registros = self::obtenerRegistros(
                "SELECT * FROM categorias;",
                array()
            );
            return $registros;
        }

        public static function getCategoriaById($id){
            $query = "SELECT * FROM categorias WHERE codigo_categoria=:$id;";
            $parameters = array("id" => $id);
            $registro = self::obtenerUnRegistro($query,$parameters);
            return $registro;
        }

        public static function addCategoria($nombre_categoria, $descripcion_categoria){
            $queryIns = "INSERT INTO categorias (nombre_categoria, descripcion_categoria) VALUES (:nombre_categoria, :descripcion_categoria);";
            $parameters = array(
                "nombre_categoria" => $nombre_categoria,
                "descripcion_categoria" => $descripcion_categoria
            );

            return self::executeNonQuery($queryIns,$parameters);
        }

        public static function updateCategoria($nombre_categoria, $descripcion_categoria, $codigo_categoria){
            $queryUpd = "UPDATE categorias SET nombre_categoria=:nombre_categoria, descripcion_categoria=:descripcion_categoria WHERE codigo_categoria=:codigo_categoria;";
            $parameters = array(
                "nombre_categoria" => $nombre_categoria,
                "descripcion_categoria" => $descripcion_categoria,
                "codigo_categoria" => $codigo_categoria
            );

            return self::executeNonQuery($queryUpd,$parameters);
        }

        public static function deleteCategoria($codigo_categoria){
            $queryDel = "DELETE FROM categorias WHERE codigo_categoria=:codigo_categoria;";
            $parameters = array(
                "codigo_categoria" => $codigo_categoria
            );

            return self::executeNonQuery($queryDel,$parameters);
        }
    }
?>