<?php
namespace Controllers\Sec; 

class funcionesroles extends \Controllers\PrivateController{
    public function run():void{
        $data = array();
        $ModalTitles = array(
            "INS" => "Nueva Categoria Panel",
            "UPD" => "Actualizando %s - %s",
            "DSP" => "Detalle de %s - %s",
            "DEL" => "Eliminando %s - %s"
        );
        $data["ModalTitle"] = "";
            $data["codigorol"] = "";
            $data["nombre_funcion"] = "";
            $data["funcion_rol_estado"] = "";
            $data["funcion_rol_estado_act"] = true;
            $data["funcion_rol_estado_ina"] = false;
            $data["fecha_exp"] = "";
            $data["readonly"] = "";
            $data["showCommitBtn"] = true;

            if($this->isPostBack()){
                $data["mode"]=$_POST["mode"];
                $data["codigorol"]=$_POST["codigorol"];
                $data["codigo_funcion"]=$_POST["codigo_funcion"];
                $data["token"] = $_POST["token"];
                //$this->verificarToken();
                if($data["token"]!=$_SESSION["permisos_xss_token"]){
                    $time = time();
                    $token = md5("permisos". $time);
                    $_SESSION["permisos_xss_token"] = $token;
                    $_SESSION["permisos_xss_token_tts"] = $time;
                    \Utilities\Site::redirectToWithMsg(
                        "index.php?page=sec_permisos",
                        "Algo sucedió mal intente de nuevo :("
                    );
                }
                if($data["mode"]!='DEL'){

                }
            }
    }
}

?>