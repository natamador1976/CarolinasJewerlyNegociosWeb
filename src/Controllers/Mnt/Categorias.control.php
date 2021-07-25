<?php
    namespace Controllers\Mnt;

    class Categorias extends \Controllers\PrivateController{

        public function run():void{
            $viewData = array();
            $tmpCategorias = \Dao\Categorias::getAllCategorias();
            $viewData["categorias"] = array();
            
            foreach ($tmpCategorias as $categorias){
                $viewData["categorias"][] = $categorias;
            }

            $time = time();
            $token = md5("categorias" . $time);
            $_SESSION["categorias_xss_token"] = $token;
            $_SESSION["categorias_xss_token_tts"] = $time;
            \Views\Renderer::render("mnt/categorias", $viewData);
        }
    }
?>