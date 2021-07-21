<?php
    namespace Controllers\Mnt;

    class Suscripcion extends \Controllers\PublicController{
        public function run():void
        {
            $viewData = array();
            $ModalTitles = array(
                "INS" => "Nueva Suscripcion",
                "UPD" => "Actualiza %s %s",
                "DSP" => "Detalle de %s %s",
                "DEL" => "Eliminado %s %s"
            );

            $viewData["ModalTitle"] = "";
            $viewData["codigo_suscripcion"] = 0;
            $viewData["codigo_usuario"] = 0;
            $viewData["estado"] = 'ACT';
            $viewData["readonly"] = '';
            $viewData["showCommitBtn"] = true;
            $viewData["estado_act"] = true;
            $viewData["estado_ina"] = false;

            if ($this->isPostBack()){
                $viewData["mode"]= $_POST["mode"];
                $viewData["codigo_suscripcion"] = $_POST["codigo_suscripcion"];
                $viewData["token"] = $_POST["token"];

                $this->verificarToken();
                if ($viewData["token"] != $_SESSION["suscripciones_xss_token"]){
                    $time = time();
                    $token = md5("suscripciones". $time);
                    $_SESSION["suscripciones_xss_token"] = $token;
                    $_SESSION["suscripciones_xss_token_tts"] = $time;
                    \Utilities\Site::redirectToWithMsg("index.php?page=mnt_suscripciones", "algo sucedio mal intente de nuevo");
                }

                if ($viewData["mode"] != "DEL"){
                    $viewData["codigo_usuario"] = $_POST["codigo_usuario"];
                    $viewData["estado"] = $_POST["estado"];
                }

                switch($viewData["mode"]){
                    case 'INS':
                        $ok = \Dao\Suscripcion::addSuscripcion(
                            $viewData["codigo_usuario"],
                            $viewData["estado"]
                        );

                        if ($ok){
                            \Utilities\Site::redirectToWithMsg("index.php?page=mnt_suscripciones", "Registro Agregado Exitosamente!!");
                        }

                        break;

                    case 'UPD':
                        $ok = \Dao\Suscripcion::updateSuscripcion(
                            $viewData["codigo_usuario"],
                            $viewData["estado"],
                            $viewData["codigo_suscripcion"]
                        );
                        
                        if ($ok){
                            \Utilities\Site::redirectToWithMsg("index.php?page=mnt_suscripciones", "Registro Actualizado Exitosamente");
                        }
                        break;

                    case 'DEL':
                        $ok = \Dao\Suscripcion::deleteSuscripcion(
                            $viewData["codigo_suscripcion"]
                        );

                        if ($ok){
                            \Utilities\Site::redirectToWithMsg("index.php?page=mnt_suscripciones", "Registro Eliminado Exitosamente!!");
                        }
                        break;
                }
            } else{
                $viewData["mode"]= $_GET["mode"];
                $viewData["codigo_suscripcion"]= isset($_GET["id"])? $_GET["id"] : 0;
                $this->verificarToken();
            }

            if ($viewData["mode"] == "INS"){
                $viewData["ModalTitles"] = "Agregando nuevo registro";
            } else {
                $susid = \Dao\Suscripcion::getSuscripcionById($viewData["codigo_suscripcion"]);

                error_log(json_encode($susid));
                if (!$susid){
                    \Utilities\Site::redirectToWithMsg("index.php?page=mnt_suscripciones", "No existe el registro");
                }

                \Utilities\ArrUtils::mergeFullArrayTo($susid, $viewData);
             
                $viewData["estado_act"] = $viewData["estado"]=='ACT';
                $viewData["estado_ina"] = $viewData["estado"]=='INA';

                if ($viewData["mode"] == "DEL" || $viewData["mode"] == "DSP"){
                    $viewData["readonly"] = "readonly";
                    $viewData["showCommitBtn"] = $viewData["mode"] == "DEL";
                }
            }
            \Views\Renderer::render("mnt/Suscripcion", $viewData);
        }

        private function verificarToken(){
            if (!isset($_SESSION["suscripciones_xss_token"])){
                \Utilities\Site::redirectToWithMsg("index.php?page=mnt_suscripciones", "algo sucedio mal intente de nuevo");
            } else {
                $time = time();
                if ($time - $_SESSION["suscripciones_xss_token_tts"] > 86400){
                    \Utilities\Site::redirectToWithMsg("index.php?page=mnt_suscripciones", "algo sucedio mal intente de nuevo");
                }
            }
        }
    }
?>