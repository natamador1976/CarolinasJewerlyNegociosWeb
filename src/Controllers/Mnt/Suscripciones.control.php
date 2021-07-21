<?php
    namespace Controllers\Mnt;

    class Suscripciones extends \Controllers\PublicController{
        public function run():void
        {
            $viewData = array();
            $tmpSuscripciones = \Dao\Suscripcion::getAllSuscripcion();
            $viewData["suscripciones"] = array();
            $counter = 0;

            foreach($tmpSuscripciones as $suscripciones){
                $counter ++;
                $suscripciones["rownum"] = $counter;
                $suscripciones["codigo_usuario"] = str_replace(array("<",">"), array("&lt;","&gt"), $suscripciones["codigo_usuario"]);
                $viewData["suscripciones"][]=$suscripciones;
            }

            $time = time();
            $token = md5("suscripciones". $time);
            $_SESSION["suscripciones_xss_token"] = $token;
            $_SESSION["suscripciones_xss_token_tts"] = $time;
            \Views\Renderer::render("mnt/Suscripciones", $viewData);
        }
    }

?>