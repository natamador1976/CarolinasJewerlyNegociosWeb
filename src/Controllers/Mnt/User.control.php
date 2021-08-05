<?php

namespace Controllers\Mnt;

use Utilities\ArrUtils;

class User extends \Controllers\PublicController
{
    public function run():void
    {
        $viewData = array();
        $ModalTitles = array(
            "INS" => "Nuevo usuario",
            "UPD" => "Actualizando %s - %s",
            "DSP" => "Detalle de %s - %s",
            "DEL" => "Eliminado %s - %s"
        );

        $viewData["ModalTitle"] = "";
        $viewData["codigo_usuario"] ="" ;
        $viewData["nombre_usuario"] = "";
        $viewData["correo_electronico"] = "";
        $viewData["usuarioactcod"] = "";
        $viewData["password"] = "";
        $viewData["fecha_creacion"] = "";
        $viewData["estado"] = "";
        $viewData["password_estado"] = "";
        $viewData["password_fexpirar"] = "";
        $viewData["tipo_usuario"] = "";
        $viewData["password_lastchange"] = "";
        $viewData["showCommitBtn"] = true;

        if (isset($_POST["btnConfirmar"])){
        // if ($this->isPostBack()) {
            $viewData["mode"] = $_POST["mode"];
            $viewData["codigo_usuario"] =$_POST["codigo_usuario"]; 
            $viewData["nombre_usuario"] = $_POST["nombre_usuario"];
            $viewData["correo_electronico"] = $_POST["correo_electronico"];
            $viewData["usuarioactcod"] = $_POST["usuarioactcod"];
            $viewData["password"] = $_POST["password"];;
            $viewData["fecha_creacion"] = $_POST["fecha_creacion"];
            $viewData["estado"] = $_POST["estado"];;
            $viewData["password_estado"] = $_POST["password_estado"];
            $viewData["password_fexpirar"] = $_POST["password_fexpirar"];
            $viewData["tipo_usuario"] = $_POST["tipo_usuario"];
            $viewData["password_lastchange"] = $_POST["password_lastchange"];

            switch($viewData["mode"]) {
            case "INS":
                $ok = \Dao\UsuariosPanel::agregarUsuario(
                    $viewData["nombre_usuario"],
                    $viewData["correo_electronico"],
                    $viewData["usuarioactcod"],
                    $viewData["password"],
                    $viewData["estado"],
                    $viewData["password_estado"],
                    $viewData["password_fexpirar"],
                    $viewData["tipo_usuario"]
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_users",
                        "Usuario agregado Exitosamente"
                    );
                }
                break;
            case "UPD":
                $ok = \Dao\UsuariosPanel::editarUsuario(
                    $viewData["nombre_usuario"],
                    $viewData["correo_electronico"],
                    $viewData["usuarioactcod"],
                    $viewData["password"],
                    $viewData["estado"],
                    $viewData["password_estado"],
                    $viewData["password_fexpirar"],
                    $viewData["tipo_usuario"],
                    $viewData["codigo_usuario"]
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_users",
                        "Usuario actualizado Exitosamente"
                    );
                }
                break;
            case "DEL":
                $ok = \Dao\UsuariosPanel ::eliminarUusario(
                    $viewData["codigo_usuario"]
                );
                if ($ok) {
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=mnt_users",
                        "Usuario eliminado Exitosamente"
                    );
                }
                break;
            }


        } else {
            $viewData["mode"] = $_GET["mode"];
            $viewData["codigo_usuario"] = isset($_GET["id"])? $_GET["id"] : 0;
            //$this->verificarToken();
            //$token = md5("heroes" . time());
            //$_SESSION["heroes_xss_token"] = $token;
        }

        //Visualizar los Datos
        if ($viewData["mode"] == "INS") {
            $viewData["ModalTitle"] = "Agregando nuevo Usuario";
         
        } else {
            //aqui obtenemos el registro por id.
            $Usuario = \Dao\UsuariosPanel::buscarUsuario($viewData["codigo_usuario"]);
            /* $viewData["heroItemid"] = $heroItem["heroItemid"];
            $viewData["heroname"] = $heroItem["heroname"];
            $viewData["heroimgurl"] = $heroItem["heroimgurl"];
            $viewData["heroaction"] = $heroItem["heroaction"];
            $viewData["heroorder"] = $heroItem["heroorder"];
            $viewData["heroest"] = $heroItem["heroest"];
            */
            
            error_log(json_encode($Usuario));
            if (!$Usuario) {
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_users",
                    "No existe el registro"
                );
            }
            // Mas rapido lazy developers
            \Utilities\ArrUtils::mergeFullArrayTo($Usuario, $viewData);
            $viewData["ModalTitle"] = sprintf(
                $ModalTitles[$viewData["mode"]],
                $viewData["codigo_usuario"],
                $viewData["nombre_usuario"],
                
            );
            

            if ($viewData["mode"] == "DEL" || $viewData["mode"] == "DSP") {
                $viewData["readonly"] = "readonly";
                $viewData["showCommitBtn"]  = $viewData["mode"] == "DEL";
            }

        }

        \Views\Renderer::render("mnt/usuario", $viewData);
    }

    private function verificarToken(){
        if (!isset($_SESSION["heroes_xss_token"])) {
            \Utilities\Site::redirectToWithMsg(
                "index.php?page=mnt_users",
                "Algo sucedio mal intente de nuevo"
            );
        } else {
            $time = time();
            if ($time - $_SESSION["heroes_xss_token_tts"] > 86400) {
                //24 * 60 * 60  horas * minutos * segundo
                \Utilities\Site::redirectToWithMsg(
                    "index.php?page=mnt_users",
                    "Algo sucedio mal intente de nuevo"
                );
            }
        }
    }

}