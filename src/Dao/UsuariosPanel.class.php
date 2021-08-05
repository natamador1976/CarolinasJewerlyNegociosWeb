<?php 
namespace Dao;

class UsuariosPanel extends Table{

   

    public static function listarUsarios()
    {
        $registros = array();
        $registros = self::obtenerRegistros(
            "SELECT * from usuarios;",
            array()
        );
        return $registros;
    }

    public static function buscarUsuario($id)
    {
        $sqlstr = "SELECT * from usuarios where codigo_usuario =:id;";

        $parameters = array("id" => $id);
       
        $registro = self::obtenerUnRegistro($sqlstr, $parameters);
        
        return $registro;

    }

    public static function agregarUsuario($usuario, $correo, $usuariocod,$passwordd,$estado,$passEstado,
    $passExpira,$tipoUsuario )
    {
        $val = 2;
        $insSQL = "INSERT INTO `usuarios` 
        (`nombre_usuario`, `correo_electronico`, `usuarioactcod`, `password`,`fecha_creacion`,`estado`,
        `password_estado`,`password_fexpirar`,`tipo_usuario`,`password_lastchange`) 
        
        VALUES ( :usuario, :correo, :usuariocod, :passwordd, NOW() , :estado,:passEstado,:passExpira,:tipoUsuario, NOW() );";
        $parameters = array(
            "usuario" => $usuario,
            "correo" => $correo,
            "usuariocod" => $usuariocod,
            "passwordd" => $passwordd,
            "estado" => $estado,
            "passEstado" => $passEstado,
            "passExpira" => $passExpira,
            "tipoUsuario" => $tipoUsuario
            
        );

        return self::executeNonQuery($insSQL, $parameters);
    }

    public static function editarUsuario($usuario, $correo, $usuariocod,$passwordd,$estado,$passEstado,
    $passExpira,$tipoUsuario,$codigoUsuario)
    {
        $updSQL = "UPDATE `usuarios` set `nombre_usuario`=:usuario, `correo_electronico`=:correo,
         `usuarioactcod`=:usuariocod, `password`=:passwordd, `estado`=:estado,
         `password_estado`=:passEstado, `password_fexpirar`=:passExpira, `tipo_usuario`=:tipoUsuario,
         `password_lastchange`= NOW()  
         where `codigo_usuario` =:codigoUsuario;";
        $parameters = array(
            "usuario" => $usuario,
            "correo" => $correo,
            "usuariocod" => $usuariocod,
            "passwordd" => $passwordd,
            "estado" => $estado,
            "passEstado" => $passEstado,
            "passExpira" => $passExpira,
            "tipoUsuario" => $tipoUsuario,
            "codigoUsuario" => $codigoUsuario
        );

        return self::executeNonQuery($updSQL, $parameters);
    }

    public static function eliminarUusario($id)
    {
        $delSQL = "DELETE FROM `usuarios`  where `codigo_usuario`=:id;";
        $parameters = array(
            "id" => $id
        );

        return self::executeNonQuery($delSQL, $parameters);
    }

}



?>